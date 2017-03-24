<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BiopsyCase;
// use App\Utilities\Helpers;

class BiopsyCasesController extends Controller
{
    public function showSetBiopyForm() {
        return view('biopsy-case.set-biopsy');
    }

    public function edit($part, $id) {
        $case = BiopsyCase::find($id);
        $case->part = $part;
        $case->endPoint = '/biopsycases';
        $case->case_id = $case->id;
        if($part == 'set-biopsy') $case->next_monday = (new \Carbon\Carbon('next monday'))->format('d-m-Y');
        return view('biopsycases.' . $part, compact('case'));
    }

    public function update(Request $request) {
        $inputs = $request->all();
        // return $inputs;
        $case = BiopsyCase::find($inputs['_case_id']);
        // return $case;
        // complementInputs($inputs, $case->getInputsType($inputs['_part']));
        complementInputs($inputs, $case->getInputsType($inputs['_part']));
        // return $inputs;
        $case->update($inputs);
        // return $case;
        return redirect()->back();
    }

    public function showClinicalDataForm() {
        return view('biopsy-case.clinical-data');
    }

    public function showPreBiopsyDataForm() {
        return view('biopsy-case.pre-biopsy-data');
    }

    public function showProcedureNoteForm() {
        return view('biopsy-case.procedure-note');
    }
}
