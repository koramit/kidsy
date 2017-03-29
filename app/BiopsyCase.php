<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\APIs\PatientAPI;
// use App\Utilities\Helpers;

class BiopsyCase extends Model
{
    protected $PatientAPI;

    protected $table = 'biopsy_cases';

    protected $dates = [
                    'datetime_make_appointment',
                    'date_biopsy_expected',
                    'date_chest_xray',
                    'date_HBV',
                    'date_HCV',
                    'date_HIV',
                    'date_Cr',
                    'date_BUN',
                    'date_Hct',
                    'date_PT',
                    'date_PTT',
                    'date_platelet',
                    'date_bx'
                ];

    protected $fillable = [
            'hn',
            'is_black',
            'birth_place_id',
            'education_id',
            'career_id',
            'set_biopsy_at',
            'urgency_case',
            'datetime_make_appointment',
            'date_biopsy_expected',
            'case_open_status',
            'ward_id',
            'fellow_id',
            'case_attending_id',
            'insurance_id',
            'insurance_title',
            'tel_no',
            'alternative_contact',
            'date_chest_xray',
            'chest_xray_result',
            'date_HBV',
            'HBV',
            'date_HCV',
            'HCV',
            'date_HIV',
            'HIV',
            'lab_source',
            'date_Cr',
            'Cr',
            'date_BUN',
            'BUN',
            'date_Hct',
            'Hct',
            'date_PT',
            'PT',
            'date_PTT',
            'PTT',
            'date_platelet',
            'platelet',
            'an',
            'smoking',
            'smoke_per_day',
            'smoke_years',
            'pregnancy',
            'gravida',
            'para',
            'abortus',
            'date_last_period',
            'weight_kg',
            'height_cm',
            'pre_SBP_mmHg',
            'pre_DBP_mmHg',
            'pre_HD_performed',
            'pre_PD_performed',
            'DDAVP_given',
            'clinical_dx_1',
            'clinical_dx_2',
            'clinical_dx_3',
            'date_bx',
            'is_native',
            'kidney_side',
            'ultrasound_echogenicity',
            'ultrasound_echogenicity_other',
            'left_kidney_length_cm',
            'right_kidney_length_cm',
            'xylocaine_ml',
            'needle_type',
            'needle_size',
            'needle_reuse_times',
            'punctured_times',
            'no_cores_obtained',
            'core_1_length_cm',
            'core_2_length_cm',
            'core_3_length_cm',
            'post_SBP_mmHg',
            'post_DBP_mmHg',
            'approximated_operation_lasts_minutes',
            'operation_attending_id',
            'operator_id',
            'assistant_id',
            'hematoma',
            'hematoma_lacation',
            'gross_hematuria',
            'abdominal_pain',
            'hypotension',
            'note',
            'case_close_status',
            'case_close_status_detail',
    ];

    // public function __construct() { // ไม่รู้ว่าทำไมมี construct แล้ว create() ไม่ทำงาน เหมือนว่าส่ง array ว่างเข้าไป
    //     parent::__construct();
    //     $this->PatientAPI = new PatientAPI;
    // }

    public function __construct(array $attributes = array()) { // สำหรับ class ที่ extends Model ต้องทำ __construct() แบบนี้จ้า
        parent::__construct($attributes);
        $this->PatientAPI = new PatientAPI;
    }

    public static function checkHnInQueue($hn) {
        $case = BiopsyCase::findCaseInQueueByHN($hn);

        if (is_null($case)) {
            $patientAPI = new PatientAPI;
            $patient = $patientAPI->getPatient($hn);
            if ($patient['resultCode'] == '0') {
                return ['resultCode' => '0', 'resultText' => $patient['name']];
            }

            $return_code_text = ['success.','ไม่พบ HN นี้ในระบบ','HN นี้ถูกยกเลิกแล้ว','HN นี้เสียชีวิตแล้ว','ไม่สามารถดึงข้อมูล HN นี้ได้','ไม่มีสิทธิ์ดึงข้อมูล HN นี้'];
            return ['resultCode' => '1', 'resultText' => $return_code_text[$patient['resultCode']]];
        }

        return ['resultCode' => '1', 'resultText' => 'มีคิว Biopsy แล้วต้องยกเลิก Case เดิมก่อน Set ใหม่'];
    }

    public static function findCaseInQueueByHN($hn) {
        foreach(BiopsyCase::all() as $case) {
            if ($case->hn == $hn && $case->case_close_status === NULL) return $case;
        }

        return NULL;
    }

    public function getName() {
        // if (is_null($this->PatientAPI)) $this->PatientAPI = new PatientAPI; // find the way to blind to container.
        return $this->PatientAPI->getPatient($this->hn)['name'];
    }

    public function getGender() {
        // if (is_null($this->PatientAPI)) $this->PatientAPI = new PatientAPI; // find the way to blind to container.
        return $this->PatientAPI->getPatient($this->hn)['gender'];
    }

    public function displayDate($field, $format = 'd-m-Y') { // for code generate form.
        return $this->attributes[$field] !== NULL ? (new \DateTime($this->attributes[$field]))->format($format): NULL;
    }

    protected function h_en($value) {
        return strrev(base64_encode($value));
    }

    protected function h_de($value) {
        return base64_decode(strrev($value));
    }

    public function getInputsType($part) {
        if ($part == 'set-biopsy') return [
                'is_black' => 'options',
                'birth_place_id' => 'options',
                'education_id' => 'options',
                'career_id' => 'options',
                'tel_no' => 'text',
                'alternative_contact' => 'text',
                // patient part
                
                'datetime_make_appointment' => 'datetime',
                'date_biopsy_expected' => 'date',
                'set_biopsy_at' => 'options',
                'urgency_case' => 'options',
                'case_open_status' => 'options',
                'ward_id' => 'options',
                'fellow_id' => 'options',
                'case_attending_id' => 'options',
                'insurance_id' => 'options',
                'insurance_title' => 'text',
                'case_close_status' => 'options',
                'case_close_status_detail' => 'text',
                // set-biopsy part


                'date_chest_xray' => 'date',
                'date_HBV' => 'date',
                'date_HCV' => 'date',
                'date_HIV' => 'date',
                'date_Cr' => 'date',
                'date_BUN' => 'date',
                'date_Hct' => 'date',
                'date_PT' => 'date',
                'date_PTT' => 'date',
                'date_platelet' => 'date',
                'chest_xray_result' => 'options',
                'HBV' => 'options',
                'HCV' => 'options',
                'HIV' => 'options',
                'lab_source' => 'options',
                'Cr' => 'number',
                'BUN' => 'number',
                'Hct' => 'number',
                'PT' => 'number',
                'PTT' => 'number',
                'platelet' => 'number',
                // labs part
                
                'note' => 'text',
                // note part
            ];

        if ($part == 'pre-biopsy-data') return [
                'is_black' => 'options',
                'birth_place_id' => 'options',
                'education_id' => 'options',
                'career_id' => 'options',
                'tel_no' => 'text',
                'alternative_contact' => 'text',
                // patient part

                'an' => 'text',
                'ward_id' => 'options',
                'weight_kg' => 'number',
                'height_cm' => 'number',
                'pre_SBP_mmHg' => 'number',
                'pre_DBP_mmHg' => 'number',
                'smoking' => 'options',
                'smoke_per_day' => 'number',
                'smoke_years' => 'number',
                'pregnancy' => 'options',
                'gravida' => 'number',
                'para' => 'number',
                'abortus' => 'number',
                'date_last_period' => 'text',
                // pre-biops-data part
                
                'note' => 'text',
                // note part
            ];

        if ($part == 'pre-biopsy-data') return [
                'chest_xray_result' => 'options',
                'HBV' => 'options',
                'HCV' => 'options',
                'HIV' => 'options',
                'lab_source' => 'options',
                'Cr' => 'number',
                'BUN' => 'number',
                'Hct' => 'number',
                'PT' => 'number',
                'PTT' => 'number',
                'platelet' => 'number',
                // labs part

                'weight_kg' => 'number',
                'height_cm' => 'number',
                'pre_SBP_mmHg' => 'number',
                'pre_DBP_mmHg' => 'number',
                'pre_HD_performed' => 'options',
                'pre_PD_performed' => 'options',
                'DDAVP_given' => 'options',
                'clinical_dx_1' => 'options',
                'clinical_dx_2' => 'options',
                'clinical_dx_3' => 'options',
                // clinical-data part
                
                'note' => 'text',
                // note part
            ];

        if ($part == 'procedure-note') return [
                'date_bx' => 'date',
                'is_native' => 'options',
                'kidney_side' => 'options',
                'ultrasound_echogenicity' => 'options',
                'ultrasound_echogenicity_other' => 'text',
                'left_kidney_length_cm' => 'text',
                'right_kidney_length_cm' => 'text',
                'xylocaine_ml' => 'text',
                'needle_type' => 'options',
                'needle_size' => 'text',
                'needle_reuse_times' => 'text',
                'punctured_times' => 'text',
                'no_cores_obtained' => 'text',
                'core_1_length_cm' => 'text',
                'core_2_length_cm' => 'text',
                'core_3_length_cm' => 'text',
                'post_SBP_mmHg' => 'text',
                'post_DBP_mmHg' => 'text',
                'approximated_operation_lasts_minutes' => 'text',
                'operation_attending_id' => 'options',
                'operator_id' => 'options',
                'assistant_id' => 'options',
                'hematoma' => 'options',
                'hematoma_lacation' => 'text',
                'gross_hematuria' => 'options',
                'abdominal_pain' => 'options',
                'hypotension' => 'options',
                // procedure-note part

                'note' => 'text',
                // note part
            ];

        return [];
    }

    public function canPrint() {
        return ($this->date_bx !== NULL && $this->no_cores_obtained !== NULL);
    }

    // hn attribute get and set.
    public function setHnAttribute($value) {
        $this->attributes['hn'] = encryptInput($value);
    }
    public function getHnAttribute() {
        return decryptAttribute($this->attributes['hn']);
    }

    // an attribute get and set.
    public function setAnAttribute($value) {
        $this->attributes['an'] = encryptInput($value);
    }
    public function getAnAttribute() {
        return decryptAttribute($this->attributes['an']);
    }

    // tel_no attribute get and set.
    public function setTelNoAttribute($value) {
        $this->attributes['tel_no'] = ($value == '') ? NUll : encrypt($value);
    }
    public function getTelNoAttribute() {
        return is_null($this->attributes['tel_no']) ? NULL : decrypt($this->attributes['tel_no']);
    }

    // alternative_contact attribute get and set.
    public function setAlternativeContactAttribute($value) {
        $this->attributes['alternative_contact'] = ($value == '') ? NUll : encrypt($value);
    }
    public function getAlternativeContactAttribute() {
        return is_null($this->attributes['alternative_contact']) ? NULL : decrypt($this->attributes['alternative_contact']);
    }

    // FOR TESTING
    public static function genCase() {
        BiopsyCase::create(['hn' => 48113365]);
        BiopsyCase::create(['hn' => 51113365]);
        BiopsyCase::create(['hn' => 50113365]);
        return TRUE;
    }
    
}
