<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiopsyCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biopsy_cases', function (Blueprint $table) {
            $table->increments('id');
            // field hn datatype string
            $table->string('hn', 512);
            // field is_black datatype byte
            $table->tinyInteger('is_black')->unsigned()->nullable();
            // field birth_place_id datatype byte
            $table->tinyInteger('birth_place_id')->unsigned()->nullable();
            // field education_id datatype byte
            $table->tinyInteger('education_id')->unsigned()->nullable();
            // field career_id datatype byte
            $table->tinyInteger('career_id')->unsigned()->nullable();
            // field set_biopsy_at datatype byte
            $table->tinyInteger('set_biopsy_at')->unsigned()->nullable();
            // field urgency_case datatype byte
            $table->tinyInteger('urgency_case')->unsigned()->nullable();
            // field datetime_make_appointment datatype date
            $table->dateTime('datetime_make_appointment')->nullable();
            // field date_biopsy_expected datatype date
            $table->date('date_biopsy_expected')->nullable();
            // field case_open_status datatype byte
            $table->tinyInteger('case_open_status')->unsigned()->nullable();
            // field ward_id datatype smallInt
            $table->smallInteger('ward_id')->unsigned()->nullable();
            // field fellow_id datatype smallInt
            $table->string('fellow_id', 15)->nullable();
            // field case_attending_id datatype smallInt
            $table->string('case_attending_id', 15)->nullable();
            // field insurance_id datatype smallInt
            $table->tinyInteger('insurance_id')->unsigned()->nullable();
            // field insurance_title datatype string
            $table->string('insurance_title')->nullable();
            // field tel_no datatype string
            $table->string('tel_no', 512)->nullable();
            // field alternative_contact datatype string
            $table->string('alternative_contact', 1024)->nullable();
            // field date_chest_xray datatype date
            $table->date('date_chest_xray')->nullable();
            // field chest_xray_result datatype byte
            $table->tinyInteger('chest_xray_result')->unsigned()->nullable();
            // field date_HBV datatype date
            $table->date('date_HBV')->nullable();
            // field HBV datatype byte
            $table->tinyInteger('HBV')->unsigned()->nullable();
            // field date_HCV datatype date
            $table->date('date_HCV')->nullable();
            // field HCV datatype byte
            $table->tinyInteger('HCV')->unsigned()->nullable();
            // field date_HIV datatype date
            $table->date('date_HIV')->nullable();
            // field HIV datatype byte
            $table->tinyInteger('HIV')->unsigned()->nullable();
            // field lab_source datatype byte
            $table->tinyInteger('lab_source')->unsigned()->nullable();
            // field date_Cr datatype date
            $table->date('date_Cr')->nullable();
            // field Cr datatype decimal6.3
            $table->decimal('Cr', 6, 3)->unsigned()->nullable();
            // field date_BUN datatype date
            $table->date('date_BUN')->nullable();
            // field BUN datatype decimal6.3
            $table->decimal('BUN', 6, 3)->unsigned()->nullable();
            // field date_Hct datatype date
            $table->date('date_Hct')->nullable();
            // field Hct datatype decimal6.3
            $table->decimal('Hct', 6, 3)->unsigned()->nullable();
            // field date_PT datatype date
            $table->date('date_PT')->nullable();
            // field PT datatype decimal6.3
            $table->decimal('PT', 6, 3)->unsigned()->nullable();
            // field date_PTT datatype date
            $table->date('date_PTT')->nullable();
            // field PTT datatype decimal6.3
            $table->decimal('PTT', 6, 3)->unsigned()->nullable();
            // field date_platelet datatype date
            $table->date('date_platelet')->nullable();
            // field platelet datatype bigInteger
            $table->bigInteger('platelet')->unsigned()->nullable();
            // field an datatype string
            $table->string('an', 512)->nullable();
            // field smoking datatype byte
            $table->tinyInteger('smoking')->unsigned()->nullable();
            // field smoke_per_day datatype decimal3.1
            $table->decimal('smoke_per_day', 3, 1)->unsigned()->nullable();
            // field smoke_years datatype decimal3.1
            $table->decimal('smoke_years', 3, 1)->unsigned()->nullable();
            // field pregnancy datatype byte
            $table->tinyInteger('pregnancy')->unsigned()->nullable();
            // field gravida datatype byte
            $table->tinyInteger('gravida')->unsigned()->nullable();
            // field para datatype byte
            $table->tinyInteger('para')->unsigned()->nullable();
            // field abortus datatype byte
            $table->tinyInteger('abortus')->unsigned()->nullable();
            // field date_last_period datatype string
            $table->string('date_last_period')->nullable();
            // field weight_kg datatype decimal6.3
            $table->decimal('weight_kg', 5, 2)->unsigned()->nullable();
            // field height_cm datatype decimal6.3
            $table->decimal('height_cm', 5, 2)->unsigned()->nullable();
            // field pre_SBP_mmHg datatype byte
            $table->tinyInteger('pre_SBP_mmHg')->unsigned()->nullable();
            // field pre_DBP_mmHg datatype byte
            $table->tinyInteger('pre_DBP_mmHg')->unsigned()->nullable();
            // field pre_HD_performed datatype byte
            $table->tinyInteger('pre_HD_performed')->unsigned()->nullable();
            // field pre_PD_performed datatype byte
            $table->tinyInteger('pre_PD_performed')->unsigned()->nullable();
            // field DDAVP_given datatype byte
            $table->tinyInteger('DDAVP_given')->unsigned()->nullable();
            // field clinical_dx_1 datatype smallInteger
            $table->smallInteger('clinical_dx_1')->unsigned()->nullable();
            // field clinical_dx_2 datatype smallInteger
            $table->smallInteger('clinical_dx_2')->unsigned()->nullable();
            // field clinical_dx_3 datatype smallInteger
            $table->smallInteger('clinical_dx_3')->unsigned()->nullable();
            // field date_bx datatype date
            $table->date('date_bx')->nullable();
            // field is_native datatype byte
            $table->tinyInteger('is_native')->unsigned()->nullable();
            // field kidney_side datatype byte
            $table->tinyInteger('kidney_side')->unsigned()->nullable();
            // field ultrasound_echogenicity datatype byte
            $table->tinyInteger('ultrasound_echogenicity')->unsigned()->nullable();
            // field ultrasound_echogenicity_other datatype string
            $table->string('ultrasound_echogenicity_other')->nullable();
            // field left_kidney_length_cm datatype decimal4.2
            $table->decimal('left_kidney_length_cm', 4, 2)->unsigned()->nullable();
            // field right_kidney_length_cm datatype decimal4.2
            $table->decimal('right_kidney_length_cm', 4, 2)->unsigned()->nullable();
            // field xylocaine_ml datatype smallInt
            $table->smallInteger('xylocaine_ml')->unsigned()->nullable();
            // field needle_type datatype byte
            $table->tinyInteger('needle_type')->unsigned()->nullable();
            // field needle_size datatype byte
            $table->tinyInteger('needle_size')->unsigned()->nullable();
            // field needle_reuse_times datatype byte
            $table->tinyInteger('needle_reuse_times')->unsigned()->nullable();
            // field punctured_times datatype byte
            $table->tinyInteger('punctured_times')->unsigned()->nullable();
            // field no_cores_obtained datatype byte
            $table->tinyInteger('no_cores_obtained')->unsigned()->nullable();
            // field core_1_length_cm datatype decimal4.2
            $table->decimal('core_1_length_cm', 4, 2)->unsigned()->nullable();
            // field core_2_length_cm datatype decimal4.2
            $table->decimal('core_2_length_cm', 4, 2)->unsigned()->nullable();
            // field core_3_length_cm datatype decimal4.2
            $table->decimal('core_3_length_cm', 4, 2)->unsigned()->nullable();
            // field post_SBP_mmHg datatype byte
            $table->tinyInteger('post_SBP_mmHg')->unsigned()->nullable();
            // field post_DBP_mmHg datatype byte
            $table->tinyInteger('post_DBP_mmHg')->unsigned()->nullable();
            // field approximated_operation_lasts_minutes datatype byte
            $table->tinyInteger('approximated_operation_lasts_minutes')->unsigned()->nullable();
            // field operation_attending_id datatype string
            $table->string('operation_attending_id')->nullable();
            // field operator_id datatype string
            $table->string('operator_id')->nullable();
            // field assistant_id datatype string
            $table->string('assistant_id')->nullable();
            // field hematoma datatype byte
            $table->tinyInteger('hematoma')->unsigned()->nullable();
            // field hematoma_lacation datatype string
            $table->string('hematoma_lacation')->nullable();
            // field gross_hematuria datatype byte
            $table->tinyInteger('gross_hematuria')->unsigned()->nullable();
            // field abdominal_pain datatype byte
            $table->tinyInteger('abdominal_pain')->unsigned()->nullable();
            // field hypotension datatype byte
            $table->tinyInteger('hypotension')->unsigned()->nullable();
            // field note datatype string
            $table->string('note', 512)->nullable();
            // field case_close_status datatype byte
            $table->tinyInteger('case_close_status')->unsigned()->nullable();
            // field case_close_status_detail datatype string
            $table->string('case_close_status_detail')->nullable();
            $table->string('h_hos', 120)->nullable();
            $table->string('h_adm', 120)->nullable();
            $table->bigInteger('creator')->unsigned()->default(0);
            $table->bigInteger('updater')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biopsy_cases');
    }
}
