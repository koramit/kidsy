<?php

namespace App;

use App\BiopsyCase;
use \Carbon\Carbon;

class PathoreportLoader {
    
    protected $snoList;
    protected $month;
    
    public function __construct($fileName, $month) {
        $this->snoList = loadCSV($fileName);
        $this->month = $month;
    }

    public function loadPathoreports() {
        foreach ($this->snoList as $sno) {
            if ( $sno['HN'] != 0 ) {
                $case = $this->searchMatchCase($sno['HN']);
                if ( $case != NULL ) {
                    $case->surgical_number = $sno['s_number'];
                    $case->save();
                }
            }
        }
    }

    protected function searchMatchCase($hn) {
        $cases = BiopsyCase::where('case_close_status', 1)->whereMonth('date_bx', $this->month)->get();
        if ( $cases != NULL )
            foreach ($cases as $case)
                if ( $case->HN == $hn ) return $case;

        return NULL;
    }
}