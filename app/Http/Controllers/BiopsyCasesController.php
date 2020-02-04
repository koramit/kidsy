<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BiopsyCase;
use Illuminate\Support\Facades\Auth;
use App\APIs\RegistryAPI;

class BiopsyCasesController extends Controller
{

    // Route Protection. Required authenticated user.
    public function __construct() {
        $this->middleware('auth');
    }

    // API check if HN already in biopsy queue.
    public function checkHnInQueue($hn) { return response(BiopsyCase::checkHnInQueue($hn)); }

    // Show queue of biopsy cases.
    public function queueIndex() {
        $cases = BiopsyCase::orderBy('date_biopsy_expected', 'desc')->get();
        return view('biopsycases.queue', compact('cases'));
    }

    // Show index of biopsy cases.
    public function index() {
        // guard
        if (!Auth::user()->canUseResource('view-biopsy-case-index'))
            return redirect('/not-allow');
        ////////

        $cases = BiopsyCase::where('case_close_status', 1)->orderBy('date_bx', 'desc')->paginate(30);
        // return $cases;
        return view('biopsycases.index', compact('cases'));
    }

    // Show incomplete post biopsy complications list
    public function postComplicationsList() {
        $cases = BiopsyCase::orderBy('date_bx')->get();
        return view('biopsycases.post-complications-list', compact('cases'));   
    }

    public function store(Request $request) {
        $data = $request->all();
        $id = BiopsyCase::count() + 1;
        $data['id'] = $id;
        $case = BiopsyCase::create($data);

        $case = BiopsyCase::find($id); // if no this line creator not save.
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

        // gaud
        // if ( $part == 'post-complications' && $case->post_complication_completed )
        //     return redirect('/not-allow');
        ////////

        $case->part = $part;
        $case->endPoint = '/biopsycases';
        $case->case_id = $case->id;
        if ($part == 'set-biopsy') $case->next_monday = (new \Carbon\Carbon('next monday'))->format('d-m-Y');
        return view('biopsycases.' . $part, compact('case'));
    }

    public function update(Request $request) {
        $inputs = $request->all();
        $case = BiopsyCase::find($inputs['_case_id']);
        
        complementInputs($inputs, $case->getInputsType($inputs['_part']));

        $case->update($inputs);
        
        if ( $inputs['_part'] == 'pre-biopsy-data' ) {
            if ( $case->nurse_id === NULL )
                $case->nurse_id = Auth::user()->id;
        } elseif ( $inputs['_part'] == 'post-complications' ) {
            if ( $case->nurse_id_post_complication === NULL )
                $case->nurse_id_post_complication = Auth::user()->id;
        }
        
        $this->finishUpdate($case);

        if ( $inputs['_part'] == 'post-complications' && $case->post_complication_completed )
            return redirect('/biopsycases/incomplete-post-complications-list');

        return redirect()->back()->with('status', 'Data Saved!');
    }

    public function viewReport($id) {
        $case = BiopsyCase::find($id);

        if ($case->canPrint()) {
            
            if ( $case->case_close_status === NULL ) {
                $case->case_close_status = 1;
                $this->finishUpdate($case);
            }

            if ( $case->is_native && (! $case->registry_synced) ) {
                $api = new RegistryAPI;
                $case->registry_synced = $api->updateRegistry($case->getRegistryData('gncase'), 'gncase') && 
                                        $api->updateRegistry($case->getRegistryData('patient'), 'patient') && 
                                        $api->updateRegistry($case->getRegistryData('lab'), 'lab');
                
                \App\FolderManager::foundOrNewCaseFolder($case);

                $case->save();
            }
            
            return view('biopsycases.print-procedure-note', compact('case'));
        }

        return redirect('/not-allow');
    }

    public function queryFolderNumber() {
        // guard
        if (!Auth::user()->canUseResource('query-folder-number'))
            return redirect('/not-allow');
        ////////

        $schedules = \App\NephroClinicSchedule::select('id','datetime_clinic')->orderBy('datetime_clinic', 'desc')->get();
        return view('biopsycases.query-folder-number', compact('schedules'));
    }

    public function postQueryFolderNumber(Request $request) {
        
        $patients = \App\NephroClinicSchedule::create([
                                'hn_list' => $request->input('hn_list'),
                                'datetime_clinic' => parseDatetimeInput($request->input('datetime_clinic'))
                ]);

        return back();
    }

    public function nephroClinicSchedule($id) {
        $schedule = \App\NephroClinicSchedule::find($id);
        $patients = $schedule->getPatientList();

        usort($patients, function($a, $b) {
            return $a['folder_number'] <=> $b['folder_number'];
        });

        $dateTimeClinic = $schedule->datetime_clinic->format('d-m-Y H:i');

        return view('biopsycases.nephro-clinic-schedule', compact('patients', 'dateTimeClinic'));
    }

    public function finishUpdate(BiopsyCase $case) {
        // set updater
        $case->updater = Auth::user()->id;
        $case->save();
    }
}
