<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSurgicalNumberAndDiagnosisIdAndFolderNumberToBiopsyCases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biopsy_cases', function (Blueprint $table) {
            $table->string('surgical_number', 10)->nullable();
            $table->smallInteger('diagnosis_id')->default(0);
            $table->bigInteger('case_folder_id')->unsigned()->nullable();
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
            $table->dropColumn('surgical_number');
            $table->dropColumn('diagnosis_id');
            $table->dropColumn('case_folder_id');
        });
    }
}
