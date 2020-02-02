<?php

namespace App\Services;

use App\BiopsyCase;

class ExportNative
{
    public function getNative($passcode = 0)
    {
        $cases = BiopsyCase::whereNotNull("date_bx")
                           ->whereNotNull("case_folder_id")
                           ->where("is_native", true)
                           ->get();
        if ($passcode != $cases->count()) return [];

        $data = [];

        foreach ($cases as $case) {
            $data[] = [
                "hn" => $case->hn,
                "name" => $case->getPatientData("name"),
                "date_bx" => $case->date_bx,
                "folder_no" => $case->caseFolder()->getFolderNumber(),
                "diagnosis_code" => $case->caseFolder()->diagnosis_code
            ];
        }

        return $data;
    }
}