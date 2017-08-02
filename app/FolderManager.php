<?php
namespace App;
use App\LegacyBiopsyCase;
use App\PathoDiagnosisCode;
use App\BiopsyCase;
use App\CaseFolder;

class FolderManager {
    public static function searchFolderNumberByHN($hn) {
        
        $case = CaseFolder::where('mini_hash', miniHash($hn))->first();

        if ( $case != NULL ) return $case->getFolderNumber();

        return NULL;
    }

    public static function foundOrNewCaseFolder($caseBx) {
        $caseFolder = CaseFolder::findByHn($caseBx->hn);

        if ( $caseFolder === NULL && $caseBx->case_folder_id === NULL && $caseBx->diagnosis_id != 0 ) {
            $id = CaseFolder::count() + 1;
            $caseFolder = CaseFolder::create([
                            'id' => $id,
                            'hn' => $caseBx->hn,
                            'diagnosis' => $caseBx->diagnosis()->name,
                            'diagnosis_code' => $caseBx->diagnosis()->code,
                            'year_code' => $caseBx->getYearCode(),
                            'run_number' => FolderManager::getCaseRunNO($caseBx->getYearCode(), $caseBx->diagnosis()->code),
                            'folder_type' => 1
                        ]);

            $caseFolder = CaseFolder::find($id);
        }

        if ( $caseFolder !== NULL ) {
            $caseBx->case_folder_id = $caseFolder->id;
            $caseBx->save();
            return $caseFolder;
        }
        
        return NULL;
    }

    protected static function getCaseRunNO($yearCode, $diagCode) {
        $case = CaseFolder::where('year_code', $yearCode)
                            ->where('diagnosis_code', $diagCode)
                            ->orderBy('run_number', 'desc')
                            ->first();

        return $case == NULL ? 1 : $case->run_number + 1;
    }
}