<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BiopsyCase;
use App\APIs\PatientAPI;
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
        $cases = BiopsyCase::all();
        return view('biopsycases.biopsycases-queue', compact('cases'));
    }

    public function store(Request $request) {
        return $request->all();
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
        complementInputs($inputs, $case->getInputsType($inputs['_part']));
        $case->update($inputs);
        return redirect()->back()->with('status', 'Data Saved!');
    }

    public function finishUpdate(Request $request) {
        // set updater
        // h_hos
        // h_adm
    }

    // public function showClinicalDataForm() {
    //     return view('biopsy-case.clinical-data');
    // }

    // public function showPreBiopsyDataForm() {
    //     return view('biopsy-case.pre-biopsy-data');
    // }

    // public function showProcedureNoteForm() {
    //     return view('biopsy-case.procedure-note');
    // }
}
