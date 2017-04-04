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
            'id',
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
        return $this->PatientAPI->getPatient($this->hn)['name'];
    }

    public function getGender() {
        return $this->PatientAPI->getPatient($this->hn)['gender'];
    }

    public function getDoctor($pln) {
        switch ($pln) {
            case "10601" : return 'รศ.นพ. เกรียงศักดิ์ วารีแสงทิพย์ ว.10601';
            case "21723" : return 'อ.พญ. ไกรวิพร เกียรติสุนทร ว.21723';
            case "11957" : return 'ศ.นพ. ชัยรัตน์ ฉายากุล ว.11957';
            case "12108" : return 'รศ.นพ. ทวี ชาญชัยรุจิรา ว.12108';
            case "28476" : return 'อ.พญ. ทัศน์พรรณ ศรีทองกุล ว.28476';
            case "18460" : return 'อ.พญ. นลินี เปรมัษเฐียร ว.18460';
            case "27569" : return 'อ.นพ. นัฐสิทธิ์ ลาภปริสุทธิ ว.27569';
            case "31892" : return 'อ.พญ. ปีณิดา สกุลรัตนศักดิ์ ว.31892';
            case "21814" : return 'ผศ.พญ. รัตนา ชวนะสุนทรพจน์ ว.21814';
            case "10405" : return 'อ.นพ. สมเกียรติ วสุวัฎฎกุล ว.10405';
            case "22979" : return 'อ.นพ. สุกิจ รักษาสุข ว.22979';
            case "15675" : return 'อ.นพ. สุชาย ศรีทิพยวรรณ ว.15675';
            case "17703" : return 'รศ.นพ. อรรถพงศ์ วงศ์วิวัฒน์ ว.17703';
            case "37848" : return 'พญ. กรชนก วารีแสงทิพย์ ว.37848';
            case "30836" : return 'พญ. จิดาภา มหามงคลสวัสดิ์ ว.30836';
            case "41092" : return 'นพ. ชวลิต โชติเรืองนภา ว.41092';
            case "33596" : return 'นพ. ธรรมพร เนาว์รุ่งโรจน์ ว.33596';
            case "43065" : return 'พญ. บัณย์ฐิตา ธนภัทรบริสุทธิ์ ว.43065';
            case "41148" : return 'พญ. บุลพร เตชจงนำชัย ว.41148';
            case "43068" : return 'นพ. ปรัชญา พุมอุทัยวิรัตน์ ว.43068';
            case "43317" : return 'พญ. พัชรินทร์ พิทักษ์โชคชัย ว.43317';
            case "34508" : return 'พญ. รัชฎา เหมินทร์ ว.34508';
            case "37961" : return 'พญ. รัตติยา เภาทอง ว.37961';
            case "36732" : return 'นพ. วีรกิจ นาวีระ ว.36732';
            case "37650" : return 'นพ. สุนทร ปิ่นไพบูลย์ ว.37650';
            default: return '';
        }
    }

    public function getUSEchoText() {
        if ($this->attributes['ultrasound_echogenicity'] === NULL) return '';
        switch ($this->attributes['ultrasound_echogenicity']) {
            case 1: return 'normal';
            case 2: return 'increase';
            case 0: return 'other';
            default: return '';
        }
    }

    public function getVirusResultText($result) {
        if ($result === NULL) return '';
        switch ($result) {
            case 0 : return 'N/A';
            case 1 : return 'Negative';
            case 2 : return 'Positive';
            case 3 : return 'Intermediate';
            case 4 : return 'Undetermined';
            case 5 : return 'Weakly Positive';
            default: return '';
        }
    }

    public function getNeedleTypeText() {
        if ($this->attributes['needle_type'] === NULL) return '';
        switch ($this->attributes['needle_type']) {
            case 1: return 'Gun';
            case 2: return 'Cook';
            case 0: return 'Other';
            default: return '';
        }
    }

    public function getCoresLength() {
        if ($this->attributes['no_cores_obtained'] == 0) return '';

        $reply = '';
        if ($this->attributes['core_1_length_cm'] !== NULL) $reply = $this->attributes['core_1_length_cm'];
        if ($this->attributes['core_2_length_cm'] !== NULL) $reply .= ', ' . $this->attributes['core_2_length_cm'];
        if ($this->attributes['core_3_length_cm'] !== NULL) $reply .= ', ' . $this->attributes['core_3_length_cm'];

        return trim($reply, ', ');

    }

    public function displayDate($field, $format = 'd-m-Y') { // for code generate form.
        return $this->attributes[$field] !== NULL ? (new \DateTime($this->attributes[$field]))->format($format): NULL;
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

                // only women
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
        return ($this->date_bx !== NULL 
                    && $this->is_native !== NULL
                    && $this->kidney_side !== NULL
                    && $this->xylocaine_ml !== NULL
                    && $this->punctured_times !== NULL
                    && $this->needle_reuse_times !== NULL
                    && $this->no_cores_obtained !== NULL
                    && $this->needle_type !== NULL
                    && $this->needle_size !== NULL
                    && $this->post_SBP_mmHg !== NULL
                    && $this->post_DBP_mmHg !== NULL
                    && $this->approximated_operation_lasts_minutes !== NULL
                    && $this->operator_id !== NULL
                );
    }

    public function isInQueue() {
        return 
            ($this->case_close_status === NULL) ||
            ($this->case_close_status !== NULL && $this->date_bx->diffInDays(\Carbon\Carbon::now() <= 8))
            ;
    }

    // hn attribute get and set.
    public function setHnAttribute($value) {
        $this->attributes['hn'] = encryptInput($value);
        $this->attributes['h_hos'] = h_en($value);
    }
    public function getHnAttribute() {
        return decryptAttribute($this->attributes['hn']);
    }

    // an attribute get and set.
    public function setAnAttribute($value) {
        $this->attributes['an'] = encryptInput($value);
        $this->attributes['h_adm'] = h_en($value);
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
