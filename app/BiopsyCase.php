<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\APIs\PatientAPI;
use App\CaseFolder;
// use App\Utilities\Helpers;

class BiopsyCase extends Model
{
    protected $PatientAPI;

    protected $table = 'biopsy_cases';

    protected $dates = [
        'datetime_make_appointment',
        'date_biopsy_expected',
        'date_admit_expected',
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
        'date_bx',
        'datetime_post_hematoma',
        'datetime_post_gross_hematuria',
        'datetime_post_hypotension',
        'datetime_post_abdominal_pain',
        'datetime_post_fever',
        'datetime_post_ultrasound',
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
        'date_admit_expected',
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
        'operation_start',
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
        // 'approximated_operation_lasts_minutes',
        'operation_stop',
        'operation_attending_id',
        'operator_id',
        'assistant_id',
        'hematoma',
        'hematoma_location',
        'gross_hematuria',
        'abdominal_pain',
        'hypotension',
        'note',
        'case_close_status',
        'case_close_status_detail',
        'hematoma_size_cm',
        'post_Hct',
        'post_hematoma',
        'datetime_post_hematoma',
        'post_hematoma_size_cm',
        'post_hematoma_location',
        'post_gross_hematuria',
        'datetime_post_gross_hematuria',
        'post_hypotension',
        'datetime_post_hypotension',
        'post_abdominal_pain',
        'datetime_post_abdominal_pain',
        'post_fever',
        'datetime_post_fever',
        'post_fever_cause',
        'post_ultrasound',
        'datetime_post_ultrasound',
        'post_rpc_transfusion',
        'post_rpc_transfusion_unit',
        'post_whole_blood_transfusion',
        'post_whole_blood_transfusion_unit',
        'post_cryo_transfusion',
        'post_cryo_transfusion_unit',
        'post_platlete_transfusion',
        'post_platlete_transfusion_unit',
        'post_antifibrinolytic',
        'post_antifibrinolytic_detail',
        'post_antibiotic',
        'post_antibiotic_detail',
        'post_angiogram',
        'post_embolization',
        'post_nephrectomy',
        'outcome_resolve',
        'outcome_arf',
        'outcome_crf_no_dialysis',
        'outcome_ESRD',
        'outcome_dead',
        'post_complication_completed',
        'post_complication_note',
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

    public static function findCaseInQueueByHN($hn) { // *** wait for implement by using h_hos.
        foreach(BiopsyCase::all() as $case) {
            if ($case->hn == $hn && $case->case_close_status === NULL) return $case;
        }

        return NULL;
    }

    public static function latestCaseByHN($hn) {
        $cases = BiopsyCase::orderBy('date_bx', 'desc')->get();

        foreach( $cases as $case ) {
            if ( $case->hn == $hn ) return $case;
        }

        return NULL;
    }

    public function getPatientData($field) {
        if ( $field == 'name' ) {
            $patient = $this->PatientAPI->getPatient($this->hn);
            return $patient['title'] . ' ' . $patient['name'];
        }
        return $this->PatientAPI->getPatient($this->hn)[$field];
    }

    public function getDayAdmitShortName() {
        if ($this->attributes['date_admit_expected'] === NULL) return '';
        switch ($this->date_admit_expected->format('l')) {
            case 'Sunday' : return 'Sun';
            case 'Monday' : return 'Mon';
            case 'Tuesday' : return 'Tue';
            case 'Wednesday' : return 'Wed';
            case 'Thursday' : return 'Thu';
            case 'Friday' : return 'Fri';
            case 'Saturday' : return 'Sat';
        }
    }

    public function getWard() {
        if ($this->attributes['ward_id'] === NULL) return '';
        switch ($this->attributes['ward_id']) {
            case 1  : return '72/5 ตต. (The heart)';
            case 2  : return '72/5 ตอ. (The heart)';
            case 3  : return '72/6 ตต.';
            case 4  : return '72/6 ตอ.';
            case 5  : return '72/7 ชายใต้';
            case 6  : return '72/7 ชายเหนือ';
            case 7  : return '72/7 หญิง';
            case 8  : return '72/8 ตต.';
            case 9  : return '72/8 ตอ.';
            case 10 : return '72/9 ชาย ตอ.';
            case 11 : return '72/9 หญิง ตอ.';
            case 12 : return '84/2 ตต. (KT)';
            case 13 : return '84/10 ตต.';
            case 14 : return '84/10 ตอ.';
            case 15 : return '84/3 ตตจ.2';
            case 16 : return '84/5 ตต.';
            case 17 : return '84/5 ตอ.';
            case 18 : return '84/6 ตต.';
            case 19 : return '84/6 ตอ.';
            case 20 : return '84/7 ตต.';
            case 21 : return '84/7 ตอ.';
            case 22 : return '84/8 ตต.';
            case 23 : return '84/8 ตอ.';
            case 24 : return '84/9 ตต.';
            case 25 : return '84/9 ตอ.';
            case 26 : return 'ฉก 10 ใต้';
            case 27 : return 'ฉก 15';
            case 28 : return 'ฉก 16';
            case 29 : return 'ฉก 7 ใต้';
            case 30 : return 'ฉก 7 เหนือ';
            case 31 : return 'ไตเทียม';
            case 32 : return 'ปกส 3';
            case 33 : return 'ปาวา 2';
            case 34 : return 'ปาวา 3';
            case 35 : return 'ผะอบ 5';
            case 36 : return 'พิเศษ';
            case 37 : return 'มว 1';
            case 38 : return 'มว 2';
            case 39 : return 'วธ 3';
            case 40 : return 'อฎ 10 ใต้';
            case 41 : return 'อฎ 10 เหนือ';
            case 42 : return 'อฎ 11 ใต้';
            case 43 : return 'อฎ 11 เหนือ';
            case 44 : return 'อฎ 12 ใต้';
            case 45 : return 'อฎ 12 เหนือ';
            case 46 : return 'อฎ 6 ใต้';
            case 47 : return 'อฎ 6 เหนือ';
            case 48 : return 'อฎ 9 ใต้';
            case 49 : return 'อฎ 9 เหนือ';
            case 50 : return 'อื่นๆ/ไม่ทราบ';
        }
    }
    
    public function getDoctor($pln, $mode = 'full') {
        switch ($pln) {
            case "37848" : return $mode == 'full' ? 'อ.พญ. กรชนก วารีแสงทิพย์ ว.37848' : 'กรชนก';
            case "10601" : return $mode == 'full' ? 'รศ.นพ. เกรียงศักดิ์ วารีแสงทิพย์ ว.10601' : 'เกรียงศักดิ์';
            case "21723" : return $mode == 'full' ? 'อ.พญ. ไกรวิพร เกียรติสุนทร ว.21723' : 'ไกรวิพร';
            case "11957" : return $mode == 'full' ? 'ศ.นพ. ชัยรัตน์ ฉายากุล ว.11957' : 'ชัยรัตน์';
            case "12108" : return $mode == 'full' ? 'รศ.นพ. ทวี ชาญชัยรุจิรา ว.12108' : 'ทวี';
            case "28476" : return $mode == 'full' ? 'อ.พญ. ทัศน์พรรณ ศรีทองกุล ว.28476' : 'ทัศน์พรรณ';
            case "18460" : return $mode == 'full' ? 'อ.พญ. นลินี เปรมัษเฐียร ว.18460' : 'นลินี';
            case "27569" : return $mode == 'full' ? 'อ.นพ. นัฐสิทธิ์ ลาภปริสุทธิ ว.27569' : 'นัฐสิทธิ์';
            case "31892" : return $mode == 'full' ? 'อ.พญ. ปีณิดา สกุลรัตนศักดิ์ ว.31892' : 'ปีณิดา';
            case "21814" : return $mode == 'full' ? 'ผศ.พญ. รัตนา ชวนะสุนทรพจน์ ว.21814' : 'รัตนา';
            case "10405" : return $mode == 'full' ? 'อ.นพ. สมเกียรติ วสุวัฎฎกุล ว.10405' : 'สมเกียรติ';
            case "22979" : return $mode == 'full' ? 'อ.นพ. สุกิจ รักษาสุข ว.22979' : 'สุกิจ';
            case "15675" : return $mode == 'full' ? 'อ.นพ. สุชาย ศรีทิพยวรรณ ว.15675' : 'สุชาย';
            case "17703" : return $mode == 'full' ? 'รศ.นพ. อรรถพงศ์ วงศ์วิวัฒน์ ว.17703' : 'อรรถพงศ์';
            case "30836" : return $mode == 'full' ? 'พญ. จิดาภา มหามงคลสวัสดิ์ ว.30836' : 'จิดาภา';
            case "45208" : return $mode == 'full' ? 'นพ. จิตวัติ พูลพุทธพงศ์ ว.45208' : 'จิตวัติ';
            case "41092" : return $mode == 'full' ? 'นพ. ชวลิต โชติเรืองนภา ว.41092' : 'ชวลิต';
            case "39285" : return $mode == 'full' ? 'นพ. ถิรพล สินปรีชานนท์ ว.39285' : 'ถิรพล';
            case "41905" : return $mode == 'full' ? 'นพ. ธนพล พงศ์นัชชา ว.41905' : 'ธนพล';
            case "33596" : return $mode == 'full' ? 'นพ. ธรรมพร เนาว์รุ่งโรจน์ ว.33596' : 'ธรรมพร';
            case "38872" : return $mode == 'full' ? 'นพ. นราธิป ทองทับ ว.38872' : 'นราธิป';
            case "43065" : return $mode == 'full' ? 'พญ. บัณย์ฐิตา ธนภัทรบริสุทธิ์ ว.43065' : 'บัณย์ฐิตา';
            case "41148" : return $mode == 'full' ? 'พญ. บุลพร เตชจงนำชัย ว.41148' : 'บุลพร';
            case "43068" : return $mode == 'full' ? 'นพ. ปรัชญา พุมอุทัยวิรัตน์ ว.43068' : 'ปรัชญา';
            case "43317" : return $mode == 'full' ? 'พญ. พัชรินทร์ พิทักษ์โชคชัย ว.43317' : 'พัชรินทร์';
            case "41171" : return $mode == 'full' ? 'นพ. พัทธดนย์ ศิริวงศ์รังสรร ว.41171' : 'พัทธดนย์';
            case "39364" : return $mode == 'full' ? 'พญ. มัชฌิมา รอดเชื้อ ว.39364' : 'มัชฌิมา';
            case "34508" : return $mode == 'full' ? 'พญ. รัชฎา เหมินทร์ ว.34508' : 'รัชฎา';
            case "37961" : return $mode == 'full' ? 'พญ. รัตติยา เภาทอง ว.37961' : 'รัตติยา';
            case "36732" : return $mode == 'full' ? 'นพ. วีรกิจ นาวีระ ว.36732' : 'วีรกิจ';
            case "37650" : return $mode == 'full' ? 'นพ. สุนทร ปิ่นไพบูลย์ ว.37650' : 'สุนทร';
            case "38872" : return $mode == 'full' ? 'นพ. นราธิป ทองทับ ว.38872' : 'นราธิป';
            case "41171" : return $mode == 'full' ? 'นพ. พัทธดนย์ ศิริวงศ์รังสรร ว.41171' : 'พัทธดนย์';
            case "45208" : return $mode == 'full' ? 'นพ. จิตวัต พูลพุทธพงษ์ ว.45208' : 'จิตวัต';
            case "39285" : return $mode == 'full' ? 'นพ. ถิรพล สินปรีชานนท์ ว.39285' : 'ถิรพล';
            case "41905" : return $mode == 'full' ? 'นพ. ธนพล พงศ์นัชชา ว.41905' : 'ธนพล';
            case "39364" : return $mode == 'full' ? 'พญ. มัชฌิมา รอดเชื้อ ว.39364' : 'มัชฌิมา';
            case "41145" : return $mode == 'full' ? 'นพ. นิพนธ์ นครน้อย ว.41145' : 'นิพนธ์';
            case "39536" : return $mode == 'full' ? 'พญ. ปวิตรา วาสุเทพรังสรรค์ ว.39536' : 'ปวิตรา';
            case "36921" : return $mode == 'full' ? 'พญ. ดวงนภา จันเทวา ว.36921' : 'ดวงนภา';
            case "42661" : return $mode == 'full' ? 'พญ. ญาธิป มุกดาลอย ว.42661' : 'ญาธิป';
            case "39374" : return $mode == 'full' ? 'พญ. รักษิณา ชัยณรงค์ศิริพร ว.39374' : 'รักษิณา';
            case "42983" : return $mode == 'full' ? 'พญ. จงถนอม โตวิเศษ ว.42983' : 'จงถนอม';
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

    public function getOperationLasts() {
        if (! $this->canPrint() ) return '';

        $start = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->date_bx->toDateString() . ' ' . $this->operation_start);
        $stop = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $this->date_bx->toDateString() . ' ' . $this->operation_stop);
        return $start->diffInMinutes($stop);
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
                'date_admit_expected' => 'date',
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

        if ($part == 'clinical-data') return [
                
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
                'operation_start' => 'text',
                'is_native' => 'options',
                'kidney_side' => 'options',
                'ultrasound_echogenicity' => 'options',
                'ultrasound_echogenicity_other' => 'text',
                'left_kidney_length_cm' => 'number',
                'right_kidney_length_cm' => 'number',
                'xylocaine_ml' => 'number',
                'needle_type' => 'options',
                'needle_size' => 'number',
                'needle_reuse_times' => 'number',
                'punctured_times' => 'number',
                'no_cores_obtained' => 'number',
                'core_1_length_cm' => 'number',
                'core_2_length_cm' => 'number',
                'core_3_length_cm' => 'number',
                'post_SBP_mmHg' => 'number',
                'post_DBP_mmHg' => 'number',
                // 'approximated_operation_lasts_minutes' => 'text',
                'operation_start' => 'text',
                'operation_attending_id' => 'options',
                'operator_id' => 'options',
                'assistant_id' => 'options',
                'hematoma' => 'options',
                'hematoma_location' => 'text',
                'gross_hematuria' => 'options',
                'abdominal_pain' => 'options',
                'hypotension' => 'options',
                // procedure-note part

                'note' => 'text',
                // note part
            ];

        if ($part == 'post-complications') return [
                'Hct' => 'number',
                'hematoma' => 'options',
                'hematoma_size_cm' => 'number',
                'hematoma_location' => 'text',
                'post_Hct' => 'number',
                'post_hematoma' => 'options',
                'datetime_post_hematoma' => 'datetime',
                'post_hematoma_size_cm' => 'number',
                'post_hematoma_location' => 'text',
                'post_gross_hematuria' => 'options',
                'datetime_post_gross_hematuria' => 'datetime',
                'post_hypotension' => 'options',
                'datetime_post_hypotension' => 'datetime',
                'post_abdominal_pain' => 'options',
                'datetime_post_abdominal_pain' => 'datetime',
                'post_fever' => 'options',
                'datetime_post_fever' => 'datetime',
                'post_fever_cause' => 'text',
                'post_ultrasound' => 'options',
                'datetime_post_ultrasound' => 'datetime',
                'post_rpc_transfusion' => 'options',
                'post_rpc_transfusion_unit' => 'number',
                'post_whole_blood_transfusion' => 'options',
                'post_whole_blood_transfusion_unit' => 'number',
                'post_cryo_transfusion' => 'options',
                'post_cryo_transfusion_unit' => 'number',
                'post_platlete_transfusion' => 'options',
                'post_platlete_transfusion_unit' => 'number',
                'post_antifibrinolytic' => 'options',
                'post_antifibrinolytic_detail' => 'text',
                'post_antibiotic' => 'options',
                'post_antibiotic_detail' => 'text',
                'post_angiogram' => 'options',
                'post_embolization' => 'options',
                'post_nephrectomy' => 'options',
                'outcome_resolve' => 'checkbox',
                'outcome_arf' => 'checkbox',
                'outcome_crf_no_dialysis' => 'checkbox',
                'outcome_ESRD' => 'checkbox',
                'outcome_dead' => 'checkbox',
                'post_complication_completed' => 'checkbox',
                'post_complication_note' => 'text',
            ];

        return [];
    }

    public function canPrint() {
        return ($this->date_bx !== NULL 
                    && $this->operation_start !== NULL
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
                    && $this->operation_stop !== NULL
                    // && $this->approximated_operation_lasts_minutes !== NULL
                    && $this->operator_id !== NULL
                );
    }

    public function isQueue() {
        if ( $this->case_close_status !== NULL && $this->case_close_status > 1 ) return FALSE;
        return (
                    ($this->case_close_status === NULL) ||
                    ($this->date_bx->diffInDays(\Carbon\Carbon::now()) <= 8)
            );
    }

    public function isInPostComplicationList() { return $this->canPrint() && !$this->post_complication_completed; }

    public function getRegistryData($model) {
        if ($model == 'gncase')
            return [
                'HN' => $this->HN,
                'date_bx' => $this->date_bx->format('d-m-Y'),
                'height' => $this->height_cm,
                'weight' => $this->weight_kg,
                'SBP' => $this->pre_SBP_mmHg,
                'DBP' => $this->pre_DBP_mmHg,
                'smoking' => $this->smoking,
                'cigars_day' => $this->smoke_per_day,
                'cigar_years' => $this->smoke_years,
                'national_id' => $this->getPatientData('document_id'),
                
                // 'first_name' => $this->getPatientData('first_name'),
                // 'last_name' => $this->getPatientData('last_name'),
                // 'dob' => $this->getPatientData('dob') === NULL ? '' : date_create($this->getPatientData('dob'))->format('d-m-Y'),
                // 'gender' => $this->getPatientData('gender'),
                // 'address' => $this->getPatientData('address'),
                // 'postcode' => $this->getPatientData('postcode'),
                // 'tel_no' => $this->getPatientData('tel_no'),
                // 'race' => $this->is_black,
                // 'birth_place' => $this->birth_place_id,
                // 'education' => $this->education_id,
                // 'career' => $this->career_id,
            ];

        if ($model == 'patient')
            return [
                'date_bx' => $this->date_bx->format('d-m-Y'),
                'national_id' => $this->getPatientData('document_id'),
                'first_name' => $this->getPatientData('first_name'),
                'last_name' => $this->getPatientData('last_name'),
                'dob' => $this->getPatientData('dob') === NULL ? '' : date_create($this->getPatientData('dob'))->format('d-m-Y'),
                'gender' => $this->getPatientData('gender'),
                'address' => $this->getPatientData('address'),
                'postcode' => $this->getPatientData('postcode'),
                'tel_no' => $this->getPatientData('tel_no'),
                'race' => $this->is_black,
                'birth_place' => $this->birth_place_id,
                'education' => $this->education_id,
                'career' => $this->career_id,
            ];

        if ($model == 'lab')
            return [
                'date_bx' => $this->date_bx->format('d-m-Y'),
                'national_id' => $this->getPatientData('document_id'),
                'date_lab' => $this->date_bx->format('d-m-Y'),
                'Hct' => $this->Hct,
                'platelet' => $this->platelet,
                'BUN' => $this->BUN,
                'Cr' => $this->Cr,
                'HBsAg' => $this->HBV == 1 ? '0':NULL,
                'HBeAg' => $this->HBV == 1 ? '0':NULL,
                'Anti_HCV' => $this->HCV == 1 ? '0':NULL,
                'Anti_HIV' => $this->HIV == 1 ? '0':NULL,
            ];
    }

    public function diagnosis() {
        // return $this->hasOne('App\PathoDiagnosisCode', 'id', 'diagnosis_id');
        return \App\PathoDiagnosisCode::find($this->diagnosis_id);
    }

    public function caseFolder() {
        // return $this->hasOne('App\PathoDiagnosisCode', 'id', 'diagnosis_id');
        return CaseFolder::find($this->case_folder_id);
    }

    public function getYearCode() {
        return ( $this->date_bx != NULL ) ? substr($this->date_bx->year + 543, -2) : NULL;
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

    public static function findError() {
        $cases = static::whereNull('case_close_status')->orderBy('date_biopsy_expected', 'desc')->get();
        foreach ($cases as $case) {
            echo $case->id + '\n';
            echo $case->isQueue() ? 'queue\n' : 'not queue\n';
        }
    } 
    
}
