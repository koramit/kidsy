<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPostComplicationFieldsToBiopsyCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('biopsy_cases', function (Blueprint $table) {
            // field hematoma_size_cm datatype decimal4.2
            $table->decimal('hematoma_size_cm', 4, 2)->after('hematoma')->unsigned()->nullable();
            // field post_Hct datatype decimal4.2
            $table->decimal('post_Hct', 4, 2)->unsigned()->nullable();
            // field post_hematoma datatype tinyInt
            $table->tinyInteger('post_hematoma')->unsigned()->nullable();
            // field datetime_post_hematoma datatype datetime
            $table->dateTime('datetime_post_hematoma')->nullable();
            // field post_hematoma_size_cm datatype decimal4.2
            $table->decimal('post_hematoma_size_cm', 4, 2)->unsigned()->nullable();
            // field post_hematoma_location datatype string
            $table->string('post_hematoma_location')->nullable();
            // field post_gross_hematuria datatype tinyInt
            $table->tinyInteger('post_gross_hematuria')->unsigned()->nullable();
            // field datetime_post_gross_hematuria datatype datetime
            $table->dateTime('datetime_post_gross_hematuria')->nullable();
            // field post_hypotension datatype tinyInt
            $table->tinyInteger('post_hypotension')->unsigned()->nullable();
            // field datetime_post_hypotension datatype datetime
            $table->dateTime('datetime_post_hypotension')->nullable();
            // field post_abdominal_pain datatype tinyInt
            $table->tinyInteger('post_abdominal_pain')->unsigned()->nullable();
            // field datetime_post_abdominal_pain datatype datetime
            $table->dateTime('datetime_post_abdominal_pain')->nullable();
            // field post_fever datatype tinyInt
            $table->tinyInteger('post_fever')->unsigned()->nullable();
            // field datetime_post_fever datatype datetime
            $table->dateTime('datetime_post_fever')->nullable();
            // field post_fever_cause datatype string
            $table->string('post_fever_cause')->nullable();
            // field post_ultrasound datatype tinyInt
            $table->tinyInteger('post_ultrasound')->unsigned()->nullable();
            // field datetime_post_ultrasound datatype datetime
            $table->dateTime('datetime_post_ultrasound')->nullable();
            // field post_rpc_transfusion datatype tinyInt
            $table->tinyInteger('post_rpc_transfusion')->unsigned()->nullable();
            // field post_rpc_transfusion_unit datatype decimal12.2
            $table->decimal('post_rpc_transfusion_unit', 12, 2)->unsigned()->nullable();
            // field post_whole_blood_transfusion datatype tinyInt
            $table->tinyInteger('post_whole_blood_transfusion')->unsigned()->nullable();
            // field post_whole_blood_transfusion_unit datatype decimal12.2
            $table->decimal('post_whole_blood_transfusion_unit', 12, 2)->unsigned()->nullable();
            // field post_cryo_transfusion datatype tinyInt
            $table->tinyInteger('post_cryo_transfusion')->unsigned()->nullable();
            // field post_cryo_transfusion_unit datatype decimal12.2
            $table->decimal('post_cryo_transfusion_unit', 12, 2)->unsigned()->nullable();
            // field post_platlete_transfusion datatype tinyInt
            $table->tinyInteger('post_platlete_transfusion')->unsigned()->nullable();
            // field post_platlete_transfusion_unit datatype decimal12.2
            $table->decimal('post_platlete_transfusion_unit', 12, 2)->unsigned()->nullable();
            // field post_antifibrinolytic datatype tinyInt
            $table->tinyInteger('post_antifibrinolytic')->unsigned()->nullable();
            // field post_antifibrinolytic_detail datatype string
            $table->string('post_antifibrinolytic_detail')->nullable();
            // field post_antibiotic datatype tinyInt
            $table->tinyInteger('post_antibiotic')->unsigned()->nullable();
            // field post_antibiotic_detail datatype string
            $table->string('post_antibiotic_detail')->nullable();
            // field post_angiogram datatype tinyInt
            $table->tinyInteger('post_angiogram')->unsigned()->nullable();
            // field post_embolization datatype tinyInt
            $table->tinyInteger('post_embolization')->unsigned()->nullable();
            // field post_nephrectomy datatype tinyInt
            $table->tinyInteger('post_nephrectomy')->unsigned()->nullable();
            // field outcome_resolve datatype boolean
            $table->boolean('outcome_resolve');
            // field outcome_arf datatype boolean
            $table->boolean('outcome_arf');
            // field outcome_crf_no_dialysis datatype boolean
            $table->boolean('outcome_crf_no_dialysis');
            // field outcome_ESRD datatype boolean
            $table->boolean('outcome_ESRD');
            // field outcome_dead datatype boolean
            $table->boolean('outcome_dead');
            // field post_complication_completeed datatype boolean
            $table->boolean('post_complication_completed');
            // field post_complication_note datatype string
            $table->string('post_complication_note')->nullable();
            // field nurse_id_post_complication datatype bigInt
            $table->bigInteger('nurse_id_post_complication')->unsigned()->nullable();
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
            $table->dropColumn('hematoma_size_cm');
            $table->dropColumn('post_Hct');
            $table->dropColumn('post_hematoma');
            $table->dropColumn('datetime_post_hematoma');
            $table->dropColumn('post_hematoma_size_cm');
            $table->dropColumn('post_hematoma_location');
            $table->dropColumn('post_gross_hematuria');
            $table->dropColumn('datetime_post_gross_hematuria');
            $table->dropColumn('post_hypotension');
            $table->dropColumn('datetime_post_hypotension');
            $table->dropColumn('post_abdominal_pain');
            $table->dropColumn('datetime_post_abdominal_pain');
            $table->dropColumn('post_fever');
            $table->dropColumn('datetime_post_fever');
            $table->dropColumn('post_fever_cause');
            $table->dropColumn('post_ultrasound');
            $table->dropColumn('datetime_post_ultrasound');
            $table->dropColumn('post_rpc_transfusion');
            $table->dropColumn('post_rpc_transfusion_unit');
            $table->dropColumn('post_whole_blood_transfusion');
            $table->dropColumn('post_whole_blood_transfusion_unit');
            $table->dropColumn('post_cryo_transfusion');
            $table->dropColumn('post_cryo_transfusion_unit');
            $table->dropColumn('post_platlete_transfusion');
            $table->dropColumn('post_platlete_transfusion_unit');
            $table->dropColumn('post_antifibrinolytic');
            $table->dropColumn('post_antifibrinolytic_detail');
            $table->dropColumn('post_antibiotic');
            $table->dropColumn('post_antibiotic_detail');
            $table->dropColumn('post_angiogram');
            $table->dropColumn('post_embolization');
            $table->dropColumn('post_nephrectomy');
            $table->dropColumn('outcome_resolve');
            $table->dropColumn('outcome_arf');
            $table->dropColumn('outcome_crf_no_dialysis');
            $table->dropColumn('outcome_ESRD');
            $table->dropColumn('outcome_dead');
            $table->dropColumn('post_complication_completed');
            $table->dropColumn('post_complication_note');
            $table->dropColumn('nurse_id_post_complication');
        });
    }
}
