<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_folders', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned();
            $table->primary('id');
            $table->string('hn', 512);
            $table->string('diagnosis')->nullable();
            $table->string('diagnosis_code', 7);
            $table->tinyInteger('year_code')->unsigned();
            $table->tinyInteger('run_number')->unsigned();
            $table->tinyInteger('folder_type')->unsigned()->nullable();
            $table->string('mini_hash', 7);
            $table->string('remark')->nullable();
            $table->timestamps();
        });

        \App\CaseFolder::importLegacyData();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('case_folders');
    }
}
