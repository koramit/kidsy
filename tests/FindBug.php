<?php

namespace Tests;

use App\BiopsyCase;


class FindBug
{
    public static function test()
    {
        $cases = BiopsyCase::where('case_close_status', 1)->orderBy('date_bx', 'desc')->get();
        foreach($cases as $case) {
            echo $case->id . "\n";
            echo $case->diagnosis()->name . "\n";
        }
    }

}
