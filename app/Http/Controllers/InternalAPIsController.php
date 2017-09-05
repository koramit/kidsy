<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\PathoDiagnosisCode;
use App\BiopsyCase;
use App\FolderManager;

class InternalAPIsController extends Controller
{
    
    // Route Protection. Required authenticated user.
    public function __construct() { $this->middleware('auth'); }

    public function getPathoDiagList($search) {
        return response()->json(
                    DB::table('patho_diagnosis_codes')
                          ->select('name')
                          ->where('name', 'like', '%' . $search . '%')
                          ->where('name', 'not like', '%KT%')
                          ->get()
                );
    }

    public function postPathoDiag(Request $request) {
        if ( $request->input('diag') === NULL ) // in case of empty string.
            $diag = PathoDiagnosisCode::find(0);
        else {
            $diag = PathoDiagnosisCode::where('name', $request->input('diag'))->first();

            if ( $diag === NULL )
                $diag = PathoDiagnosisCode::newDiagCode($request->input('diag'));
        }

        $case = BiopsyCase::find($request->input('id'));
        $case->diagnosis_id = $diag->id;
        $case->save();

        if ( $case->caseFolder() === NULL ) {
            $caseFolder = FolderManager::foundOrNewCaseFolder($case);
            $resultText = $caseFolder->getFolderNumber();
        } else {
            $resultText = "OK";
        }

        return response()->json(['resultCode' => 0, 'resultText' => $resultText]);
    }

    public function getFolderNumber($hn) {
        $case = \App\CaseFolder::findByHN($hn);
        
        if ( $case == NULL ) $case = \App\LegacyBiopsyCase::findByHN($hn);
        if ( $case == NULL ) return response()->json(['resultCode' => '0', 'resultText' => 'ไม่พบข้อมูล']);

        $patientAPI = new \App\APIs\PatientAPI;
        return response()->json([
                'resultCode' => 1,
                'resultText' => $case->getFolderNumber() . " - " . $patientAPI->getPatient($hn)['name']
            ]);
    }
}
