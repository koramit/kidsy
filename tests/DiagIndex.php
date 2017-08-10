<?php
namespace Tests;

use \App\BiopsyCase;

class DiagIndex {
    public static function queue() {
        $cases = BiopsyCase::orderBy('date_biopsy_expected', 'desc')->get();

        foreach ( $cases as $case ) {
            
            if ( $case->isQueue() ) {
                echo "Case#" . $case->id . " in queue.\n";
                echo $case->HN . "\n";
                echo $case->getPatientData("name") . "\n";
                echo displayDate($case->date_biopsy_expected, 'd-M-Y') . "\n";
                echo $case->getWard() . "\n";
                echo $case->getDayAdmitShortName() . "\n";
            } else {
                echo "Case#" . $case->id . " not queue.\n";    
            }
        }
    }
}