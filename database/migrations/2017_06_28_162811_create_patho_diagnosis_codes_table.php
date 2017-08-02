<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\PathoDiagnosisCode;

class CreatePathoDiagnosisCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patho_diagnosis_codes', function (Blueprint $table) {
            $table->smallInteger('id')->unsigned();
            $table->primary('id');
            $table->string('code', 10);
            $table->string('name');
            $table->string('color_text',30);
            $table->string('color_hex',6);
            $table->tinyInteger('tag_size')->unsigned();
            $table->timestamps();
        });

        PathoDiagnosisCode::loadDataFromCSV();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patho_diagnosis_codes');
    }
}
