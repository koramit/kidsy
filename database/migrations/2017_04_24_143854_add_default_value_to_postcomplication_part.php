<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultValueToPostcomplicationPart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biopsy_cases', function (Blueprint $table) {
            // field outcome_resolve datatype boolean
            $table->boolean('outcome_resolve')->default(0)->change();
            // field outcome_arf datatype boolean
            $table->boolean('outcome_arf')->default(0)->change();
            // field outcome_crf_no_dialysis datatype boolean
            $table->boolean('outcome_crf_no_dialysis')->default(0)->change();
            // field outcome_ESRD datatype boolean
            $table->boolean('outcome_ESRD')->default(0)->change();
            // field outcome_dead datatype boolean
            $table->boolean('outcome_dead')->default(0)->change();
            // field post_complication_completeed datatype boolean
            $table->boolean('post_complication_completed')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('biopsy_cases', function (Blueprint $table) {
            //
        });
    }
}
