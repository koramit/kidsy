<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaseFolderController extends Controller
{
    // Route Protection. Required authenticated user.
    public function __construct() {
        $this->middleware('auth');
    }

    public function edit($hn) {
        $case = \App\CaseFolder::findByHN($hn);
        
        if ( $case == NULL ) $case = \App\LegacyBiopsyCase::findByHN($hn);

        $patientAPI = new \App\APIs\PatientAPI;

        $data['hn'] = $hn;
        $data['patient'] = $hn . ' ' . $patientAPI->getPatient($hn)['name'];
        $data['remark'] = $case->remark;

        return view('biopsycases.edit-case-folder',compact('data'));
    }

    public function update(Request $request, $hn) {
        $case = \App\CaseFolder::findByHN($hn);
        
        if ( $case == NULL ) $case = \App\LegacyBiopsyCase::findByHN($hn);

        $case->remark = $request->input('remark');

        $case->save();

        return redirect('/query-folder-number');
    } 
}
