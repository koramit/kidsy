<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegacyBiopsyCases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legacy_biopsy_cases', function (Blueprint $table) {
            // $table->increments('id');
            $table->bigInteger('id')->unsigned();
            $table->primary('id');
            // no
            $table->string('no')->nullable();
            // title
            $table->string('title')->nullable();
            // first_name
            $table->string('first_name')->nullable();
            // last_name
            $table->string('last_name')->nullable();
            // diag_code
            $table->string('diag_code')->nullable();
            // year_bx
            $table->string('year_bx')->nullable();
            // run_no
            $table->string('run_no')->nullable();
            // HN
            $table->string('HN')->nullable();
            // folder_type
            $table->string('folder_type')->nullable();
            // date_bx
            $table->date('date_bx')->nullable();
            // remark
            $table->string('remark')->nullable();
            // lab
            $table->string('lab')->nullable();
            // surgical_number
            $table->string('surgical_number')->nullable();
            // diag_name
            $table->string('diag_name')->nullable();
            // new_folder
            $table->string('new_folder')->nullable();
            // status
            $table->string('status')->nullable();
            // unused_HN_1
            $table->string('unused_HN_1')->nullable();
            // unused_HN_2
            $table->string('unused_HN_2')->nullable();
            // unused_HN_3
            $table->string('unused_HN_3')->nullable();
            // unused_HN_4
            $table->string('unused_HN_4')->nullable();
            // unused_HN_5
            $table->string('unused_HN_5')->nullable();
            // scanner
            $table->string('scanner')->nullable();
            // folder_status
            $table->string('folder_status')->nullable();
            // remark_2
            $table->string('remark_2')->nullable();
            // remark_3
            $table->string('remark_3')->nullable();
            // remark_4
            $table->string('remark_4')->nullable();
            // remark_5
            $table->string('remark_5')->nullable();
            $table->timestamps();
        });

        \App\LegacyBiopsyCase::loadDataFromCSV();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('legacy_biopsy_cases');
    }
}
