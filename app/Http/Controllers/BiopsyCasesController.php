<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BiopsyCase;
// use App\APIs\PatientAPI;
use Illuminate\Support\Facades\Auth;
// use App\Utilities\Helpers;

class BiopsyCasesController extends Controller
{
    
    // Route Protection. Required authenticated user.
    public function __construct() {
        $this->middleware('auth');
    }

    // API check if HN already in biopsy queue.
    public function checkHnInQueue($hn) {
        return response(BiopsyCase::checkHnInQueue($hn));
    }

    // Show queue of biopsy cases.
    public function queueIndex() {
        // $cases = BiopsyCase::all();
        $cases = BiopsyCase::orderBy('date_biopsy_expected', 'desc')->get();
        return view('biopsycases.biopsycases-queue', compact('cases'));
    }

    public function store(Request $request) {
        // return $request->all();

        // $case = BiopsyCase::create(['hn' => $request->input('hn')]);
        // $case = new BiopsyCase;
        // $id = BiopsyCase::count() + 1;
        // $case->id = $id;
        // $case->hn = $request->input('hn');
        // $case->creator = Auth::user()->id;
        // $case->save();
        // $case = BiopsyCase::find($id);
        // $this->finishUpdate($case);


        $data = $request->all();
        $id = BiopsyCase::count() + 1;
        $data['id'] = $id;
        $case = BiopsyCase::create($data);

        $case = BiopsyCase::find($id); // if no this line creator not save.
        // $case->initPatientData();// = $case->PatientAPI->getPatient($this->hn)['tel_no'];
        $case->tel_no = $case->getPatientData('tel_no');
        $case->alternative_contact = $case->getPatientData('alternative_contact');
        $case->creator = Auth::user()->id;
        $case->save();

        return redirect('/biopsycases/set-biopsy/' . $id . '/edit');
    }

    // show edit form by part.
    public function edit($part, $id) {
        
        // guard
        if (!Auth::user()->canUseResource($part))
            return redirect('/not-allow');
        ////////

        $case = BiopsyCase::find($id);
        $case->part = $part;
        $case->endPoint = '/biopsycases';
        $case->case_id = $case->id;
        if ($part == 'set-biopsy') $case->next_monday = (new \Carbon\Carbon('next monday'))->format('d-m-Y');
        return view('biopsycases.' . $part, compact('case'));
    }

    public function update(Request $request) {
        $inputs = $request->all();
        $case = BiopsyCase::find($inputs['_case_id']);
        
        // if ($inputs['_part'] == 'pre-biopsy-data' && !$case->getGender())
        //     complementInputs($inputs, $case->getInputsType($inputs['_part'], 0));
        // else
        complementInputs($inputs, $case->getInputsType($inputs['_part']));

        $case->update($inputs);
        
        if ( $inputs['_part'] == 'pre-biopsy-data' ) {
            if ( $case->nurse_id === NULL )
                $case->nurse_id = Auth::user()->id;
        }
        
        $this->finishUpdate($case);
        return redirect()->back()->with('status', 'Data Saved!');
    }

    public function viewReport($id) {
        $case = BiopsyCase::find($id);

        if ($case->canPrint()) {
            
            if ( $case->case_close_status === NULL ) {
                $case->case_close_status = 1;
                $this->finishUpdate($case);
            }
            
            return view('biopsycases.print-procedure-note', compact('case'));
        }

        return redirect('/not-allow');
    }

    public function finishUpdate(BiopsyCase $case) {
        // set updater
        $case->updater = Auth::user()->id;
        $case->save();
    }
}
