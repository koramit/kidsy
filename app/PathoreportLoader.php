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
                // $case = $this->searchMatchCase($sno);
                $case = $this->searchMatchCase($sno['HN']);
                if ( $case != NULL ) {
                    $case->surgical_number = $sno['s_number'];
                    $case->save();
                }
            }
        }
    }

    // protected function searchMatchCase(array $sno) {
        // $dateBx = Carbon::createFromFormat('d-m-Y H:i', $sno['date_bx']);
        // $cases = BiopsyCase::where('case_close_status', 1)->where('date_bx', $dateBx->format('Y-m-d'))->get();
        // if ( $cases != NULL )
        //     foreach ($cases as $case)
        //         if ( $case->HN == $sno['HN'] ) return $case;

        // return NULL;

    protected function searchMatchCase($hn) {
        // $dateBx = Carbon::createFromFormat('d-m-Y H:i', $sno['date_bx']);
        $cases = BiopsyCase::where('case_close_status', 1)->whereMonth('date_bx', $this->month)->get();
        if ( $cases != NULL )
            foreach ($cases as $case)
                if ( $case->HN == $hn ) return $case;

        return NULL;
    }
}