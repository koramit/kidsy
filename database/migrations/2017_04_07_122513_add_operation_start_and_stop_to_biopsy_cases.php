<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOperationStartAndStopToBiopsyCases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biopsy_cases', function (Blueprint $table) {
            $table->time('operation_start')->after('date_bx')->nullable();
            $table->time('operation_stop')->after('approximated_operation_lasts_minutes')->nullable();
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
            $table->dropColumn('operation_start');
            $table->dropColumn('operation_stop');
        });
    }
}
