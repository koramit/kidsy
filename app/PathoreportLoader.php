<?php

namespace App;

use App\BiopsyCase;
use \Carbon\Carbon;

class PathoreportLoader {
    
    protected $snoList;
    
    public function __construct($fileName) {
        $this->snoList = loadCSV($fileName);
    }

    public function loadPathoreports() {
        foreach ($this->snoList as $sno) {
            if ( $sno['HN'] != 0 ) {
                $case = $this->searchMatchCase($sno);
                if ( $case != NULL ) {
                    $case->surgical_number = $sno['s_number'];
                    $case->save();
                }
            }
        }
    }

    protected function searchMatchCase(array $sno) {
        $dateBx = Carbon::createFromFormat('d-m-Y H:i', $sno['date_bx']);
        $cases = BiopsyCase::where('case_close_status', 1)->where('date_bx', $dateBx->format('Y-m-d'))->get();
        if ( $cases != NULL )
            foreach ($cases as $case)
                if ( $case->HN == $sno['HN'] ) return $case;

        return NULL;
    }
}