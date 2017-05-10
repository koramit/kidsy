<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Patient;
use App\Lab;
use App\Pathoreport;
use App\Pretreatment;
use App\Treatment;
use App\Followup;
use App\User;
use Carbon\Carbon;

class GNCase extends Model
{
    protected $table = 'gncases';

    protected $dates = [
        'date_bx',
        'date_longest_symtom'
    ];

    protected $fillable = [
        'patient_id',
        'HN',
        'date_bx',
        'biopsy_count',
        'height',
        'weight',
        'SBP',
        'DBP',
        'smoking',
        'cigars_day',
        'cigar_years',
        'HT',
        'HT_years',
        'HT_months',
        'DM',
        'DM_years',
        'DM_months',
        'dyslipidemia',
        'dyslipidemia_years',
        'dyslipidemia_months',
        'stroke',
        'stroke_years',
        'stroke_months',
        'CAD',
        'CAD_years',
        'CAD_months',
        'PAD',
        'PAD_years',
        'PAD_months',
        'SLE',
        'SLE_years',
        'SLE_months',
        'SLE_ACL_malar_photo',
        'SLE_CCL_discoid',
        'SLE_oral_nasal_ulcer',
        'SLE_non_scarring_alopecia',
        'SLE_arthritis',
        'SLE_serositis',
        'SLE_renal',
        'SLE_neurological',
        'SLE_hemolytic_anemia',
        'SLE_leukopenia_lymphopenia',
        'SLE_thrombocytopenia',
        'SLE_ANA',
        'SLE_anti_DNA',
        'SLE_anti_Sm',
        'SLE_anti_antiphospholipid',
        'SLE_low_C3_C4_CH50',
        'SLE_DAT',
        'others_diseases',
        'asymptomatic_proteinuria',
        'asymptomatic_hematuria',
        'asymptomatic_proteinuria_hematuria',
        'gross_hematuria',
        'nephritis',
        'nephrotic',
        'nephrotic_nephritis',
        'AKI',
        'RPGN',
        'CGN',
        'high_cr',
        'new_or_aggravate_HT',
        'date_longest_symtom',
        'note'
    ];
    // protected $required = [
    //     'biopsy_count',
    //     'height',
    //     'weight',
    //     'SBP',
    //     'DBP',
    //     'HT',
    //     'HT_years',
    //     'HT_months',
    //     'DM',
    //     'DM_years',
    //     'DM_months',
    //     'dyslipidemia',
    //     'dyslipidemia_years',
    //     'dyslipidemia_months',
    //     'stroke',
    //     'stroke_years',
    //     'stroke_months',
    //     'CAD',
    //     'CAD_years',
    //     'CAD_months',
    //     'SLE',
    //     'SLE_years',
    //     'SLE_months',
    //     'date_longest_symtom',
    // ];

    // protected $checkBoxInputs = [
    //     'SLE_ACL_malar_photo',
    //     'SLE_CCL_discoid',
    //     'SLE_oral_nasal_ulcer',
    //     'SLE_non_scarring_alopecia',
    //     'SLE_arthritis',
    //     'SLE_serositis',
    //     'SLE_renal',
    //     'SLE_neurological',
    //     'SLE_hemolytic_anemia',
    //     'SLE_leukopenia_lymphopenia',
    //     'SLE_thrombocytopenia',
    //     'SLE_ANA',
    //     'SLE_anti_DNA',
    //     'SLE_anti_Sm',
    //     'SLE_anti_antiphospholipid',
    //     'SLE_low_C3_C4_CH50',
    //     'SLE_DAT',
    //     'asymptomatic_proteinuria',
    //     'asymptomatic_hematuria',
    //     'asymptomatic_proteinuria_hematuria',
    //     'gross_hematuria',
    //     'nephritis',
    //     'nephrotic',
    //     'nephrotic_nephritis',
    //     'AKI',
    //     'RPGN',
    //     'CGN',
    //     'high_cr',
    //     'new_or_aggravate_HT',
    // ];

    public function patient() {
        return $this->hasOne('App\Patient', 'id', 'patient_id');
    }

    public function followups() {
        return $this->hasMany('App\Followup', 'gncase_id', 'id');
    }

    /**
    * 
    * @return array.
    */
    public function getCheckBoxInputs() {
        return [
            'SLE_ACL_malar_photo',
            'SLE_CCL_discoid',
            'SLE_oral_nasal_ulcer',
            'SLE_non_scarring_alopecia',
            'SLE_arthritis',
            'SLE_serositis',
            'SLE_renal',
            'SLE_neurological',
            'SLE_hemolytic_anemia',
            'SLE_leukopenia_lymphopenia',
            'SLE_thrombocytopenia',
            'SLE_ANA',
            'SLE_anti_DNA',
            'SLE_anti_Sm',
            'SLE_anti_antiphospholipid',
            'SLE_low_C3_C4_CH50',
            'SLE_DAT',
            'asymptomatic_proteinuria',
            'asymptomatic_hematuria',
            'asymptomatic_proteinuria_hematuria',
            'gross_hematuria',
            'nephritis',
            'nephrotic',
            'nephrotic_nephritis',
            'AKI',
            'RPGN',
            'CGN',
            'high_cr',
            'new_or_aggravate_HT',
        ];
    }

    /**
    * 
    * @return array.
    */
    public function getRadioInputs() {
        return [
            'smoking',
            'HT',
            'DM',
            'dyslipidemia',
            'stroke',
            'CAD',
            'PAD',
            'SLE',
        ];
    }

    /**
    * 
    * @return array.
    */
    // public function getRequiredFields() {
    public function updateCompleteness($return = false) {
        $required = [
            'biopsy_count',
            'height',
            'weight',
            'SBP',
            'DBP',
            'HT',
            // 'HT_years',
            // 'HT_months',
            'DM',
            // 'DM_years',
            // 'DM_months',
            'dyslipidemia',
            // 'dyslipidemia_years',
            // 'dyslipidemia_months',
            'stroke',
            // 'stroke_years',
            // 'stroke_months',
            'CAD',
            // 'CAD_years',
            // 'CAD_months',
            'SLE',
            // 'SLE_years',
            // 'SLE_months',
            'date_longest_symtom',
        ];

        $dependency = [
            'HT',
            'DM',
            'dyslipidemia',
            'stroke',
            'CAD',
            'SLE',
        ];

        // $model = $this->toArray();
        
        // foreach ($dependency as $key => $value) {
        //     if ($model[$value] === '1') {
        //         array_push($required , $value . '_years') ;
        //         array_push($required , $value . '_months') ;
        //     }
        // }

        // $model = $this->toArray();
        
        foreach ($dependency as $key => $value) {
            if ($this->attributes[$value] === '1') {
                array_push($required , $value . '_years') ;
                array_push($required , $value . '_months') ;
            }
        }

        // updateCompleteness procedure.
        $fieldsIncomplete = [];
        $countFields = 0;
        foreach ($required as $key => $value) {
            if (!is_null($this->attributes[$value])) {
                $countFields++;
            } else {
                array_push($fieldsIncomplete, $value);
            }
        }

        if ($return) return $fieldsIncomplete;

        $this->attributes['fields_need'] = count($required);
        $this->attributes['fields_nailed'] = $countFields;
        $this->save();
        GNCase::calCompleteness($this->attributes['id']);
        // *****************************

        
    }

    public static function calCompleteness($id) {
        $needCount = 0;
        $nailedCount = 0;
        
        $model = Lab::find($id);
        $needCount += $model->fields_need;
        $nailedCount += $model->fields_nailed;
        $model = Pathoreport::find($id);
        $needCount += $model->fields_need;
        $nailedCount += $model->fields_nailed;
        $model = Pretreatment::find($id);
        $needCount += $model->fields_need;
        $nailedCount += $model->fields_nailed;
        $model = Treatment::find($id);
        $needCount += $model->fields_need;
        $nailedCount += $model->fields_nailed;
        $model = GNCase::find($id);
        $needCount += $model->fields_need;
        $nailedCount += $model->fields_nailed;

        $model->completeness = $nailedCount / $needCount * 100;
        $model->save();
    }

    public function getModelCompleteness($model){
        switch ($model) {
            case 'lab':
                $obj = Lab::find($this->id);
                return $obj->fields_nailed / $obj->fields_need * 100;
            case 'patho':
                $obj = Pathoreport::find($this->id);
                return $obj->fields_nailed / $obj->fields_need * 100;
            case 'prerx':
                $obj = Pretreatment::find($this->id);
                return $obj->fields_nailed / $obj->fields_need * 100;
            case 'rx':
                $obj = Treatment::find($this->id);
                return $obj->fields_nailed / $obj->fields_need * 100;
            case 'fu':
                $obj = Followup::find($this->id);
                return $obj->fields_nailed / $obj->fields_need * 100;
            default:
                return $this->fields_nailed / $this->fields_need * 100;
        }
    }

    /**
    * check numeric data before save to model.
    * @param string $field, field name. string $value.
    * @return void.
    */
    private function setNumValue($field,$value){
        $this->attributes[$field] = is_numeric($value) ? $value : null;
    }

    /**
    * check and format date data before save to model.
    * @param string $field, field name. string $value.
    * @return void.
    */
    private function setDateValue($field, $value) {
        $this->attributes[$field] = $value == '' ? null : \Carbon\Carbon::createFromFormat('d-m-Y', $value)->toDateString();
    }

    /**
    * Format date data meet application needs.
    * @param string $field, field name.
    * @return void.
    */
    private function getDateValue($field) {
        return is_null($this->attributes[$field]) ? null : \Carbon\Carbon::createFromFormat('Y-m-d', $this->attributes[$field])->format('d-m-Y');
    }

    /**
    * Set and Get methods.
    *
    */
    //date_bx
    public function setDateBxAttribute($value) { $this->setDateValue('date_bx', $value); }
    // public function getDateBxAttribute() { return $this->getDateValue('date_bx'); }
    // biopsy_count
    public function setBiopsyCountAttribute($value) { $this->setNumValue('biopsy_count',$value); }
    // height
    public function setHeightAttribute($value) { $this->setNumValue('height',$value); }
    // weight
    public function setWeightAttribute($value) { $this->setNumValue('weight',$value); }
    // SBP
    public function setSBPAttribute($value) { $this->setNumValue('SBP',$value); }
    // DBP
    public function setDBPAttribute($value) { $this->setNumValue('DBP',$value); }
    // smoking
    public function setSmokingAttribute($value) { $this->setNumValue('smoking',$value); }
    // cigars_day
    public function setCigarsDayAttribute($value) { $this->setNumValue('cigars_day',$value); }
    // cigar_years
    public function setCigarYearsAttribute($value) { $this->setNumValue('cigar_years',$value); }
    // HT
    public function setHTAttribute($value) { $this->setNumValue('HT',$value); }
    // HT_years
    public function setHTYearsAttribute($value) { $this->setNumValue('HT_years',$value); }
    // HT_months
    public function setHTMonthsAttribute($value) { $this->setNumValue('HT_months',$value); }
    // DM
    public function setDMAttribute($value) { $this->setNumValue('DM',$value); }
    // DM_years
    public function setDMYearsAttribute($value) { $this->setNumValue('DM_years',$value); }
    // DM_months
    public function setDMMonthsAttribute($value) { $this->setNumValue('DM_months',$value); }
    // dyslipidemia
    public function setDyslipidemiaAttribute($value) { $this->setNumValue('dyslipidemia',$value); }
    // dyslipidemia_years
    public function setDyslipidemiaYearsAttribute($value) { $this->setNumValue('dyslipidemia_years',$value); }
    // dyslipidemia_months
    public function setDyslipidemiaMonthsAttribute($value) { $this->setNumValue('dyslipidemia_months',$value); }
    // stroke
    public function setStrokeAttribute($value) { $this->setNumValue('stroke',$value); }
    // stroke_years
    public function setStrokeYearsAttribute($value) { $this->setNumValue('stroke_years',$value); }
    // stroke_months
    public function setStrokeMonthsAttribute($value) { $this->setNumValue('stroke_months',$value); }
    // CAD
    public function setCADAttribute($value) { $this->setNumValue('CAD',$value); }
    // CAD_years
    public function setCADYearsAttribute($value) { $this->setNumValue('CAD_years',$value); }
    // CAD_months
    public function setCADMonthsAttribute($value) { $this->setNumValue('CAD_months',$value); }
    // PAD
    public function setPADAttribute($value) { $this->setNumValue('PAD',$value); }
    // PAD_years
    public function setPADYearsAttribute($value) { $this->setNumValue('PAD_years',$value); }
    // PAD_months
    public function setPADMonthsAttribute($value) { $this->setNumValue('PAD_months',$value); }
    // SLE
    public function setSLEAttribute($value) { $this->setNumValue('SLE',$value); }
    // SLE_years
    public function setSLEYearsAttribute($value) { $this->setNumValue('SLE_years',$value); }
    // SLE_months
    public function setSLEMonthsAttribute($value) { $this->setNumValue('SLE_months',$value); }
    //date_longest_symtom
    public function setDateLongestSymtomAttribute($value) { $this->setDateValue('date_longest_symtom', $value); }
    // public function getDateLongestSymtomAttribute() { return $this->getDateValue('date_longest_symtom'); }

    /**
    * Get Patient name in this case.
    * @return stirng.
    */
    public function getPatientName(){
        return \App\Patient::getName($this->attributes['patient_id']);
    }

    public static function getPatient($id) {
        $gncase = GNCase::find($id);
        return Patient::find($gncase->patient_id);
    }

    /**
    * Get HN By Patient+Site.
    * @param integer $pid, integer $sid [patient_id, site_id].
    * @return string.
    */
    public static function getHNByPatientAndSite($pid, $sid) {
        $gncase = GNCase::where('patient_id',$pid)->where('site', $sid)->first();
        return isset($gncase->HN) ? $gncase->HN : '';
    }

    // public function getCompleteness() {
    //     return "x";
    //     $tmp = [];
    //     return number_format(ModelHelper::getCaseCompleteness($this->attributes['id'], $tmp, false),0,'.','');
    // }

    public function nextFU() {

        $lastFU = $this->followups->sortByDesc('date_fu')->first();
        if ($lastFU !== NULL) {
            if ($lastFU->isLastOutcome())
                return $lastFU->isLastOutcome();
        }

        // 24 48 next 48
        $offSet = 6; // 6 weeks.
        $extendOffSet = 8;
        $delay = 2; // 2 weeks.
        
        $visit = 1;
        $weeks = 0;

        $today = Carbon::now();

        // 1. repleatly add weeks by 24 or 48;
        // 2. create dateFilterStart from date_bx + week - offSet.
        // 3. create dateFilterEnd from date_bx + weeks + offSet.
        // 4. try to get first patient FU between 2 and 3.
        // 5. if got the FU continue loop.
        // 6. if got NULL then check
        //  6.1  
        do {
            // $date_bx = $date_bx->copy();
            $weeks += ($visit <= 2) ? 24 : 48;
            // $visit++;

            if ($visit <= 2) {
                $dateFilterStart = $this->date_bx->copy()->addWeeks($weeks - $offSet);
                $dateFilterEnd = $this->date_bx->copy()->addWeeks($weeks + $offSet);
            } else {
                $dateFilterStart = $this->date_bx->copy()->addWeeks($weeks - $extendOffSet);
                $dateFilterEnd = $this->date_bx->copy()->addWeeks($weeks + $extendOffSet);
            }

            // echo $dateFilterStart->toDateString() . " => " . $dateFilterEnd->toDateString();

            $fu =  Followup::where('gncase_id', $this->attributes['id'])
                            ->where('date_fu', '>=', $dateFilterStart->toDateString())
                            ->where('date_fu', '<=', $dateFilterEnd->toDateString())
                            ->orderBy('date_fu','desc')->first();
            if (is_null($fu)) {
                // if today greater than date_bx + weeks + delay.
                if ($today->gt($this->date_bx->copy()->addWeeks($weeks + $delay)->copy()))
                    return $weeks;
                else
                    return '';//$date_bx->copy()->addWeeks($weeks)->format('d-m-Y');
            } elseif ($fu->isLastOutcome()) {
                return $fu->isLastOutcome();
            }
            $visit++;
        } while (true);
    }

    public function getPredictedFollowupCount() {
        $follows = Followup::where('gncase_id', $this->id)->get();
        if (is_null($follows)) { // Has some fus.
            return count($follows);
        }
        // no fu.
        
        // $date_bx = Carbon::createFromFormat('d-m-Y', $this->date_bx);
        
        $weeksAgo = $this->date_bx->diffInWeeks(Carbon::now());

        $fuCount = ($weeksAgo / 48);

        if ($fuCount < 1)
            if ($weeksAgo >= 24)
                return 1;
            else
                return 0;

        return floor($fuCount) + 1;
    }

    // Search gncase by Candidate key : patient_national_id + date_bx.
    public static function getGNCaseIDByCK($nid, $date_bx) { 

        if (Patient::isPatientExist($nid)) {
            
            $patient = Patient::searchByNationalID($nid);
            
            $gncase = GNCase::where('patient_id','=',$patient->id)->where('date_bx','=',$date_bx)->first();               
            
            return empty($gncase) ? 0 : $gncase->id;
        }
        return 0;
    }

    // load data from csv file.
    public static function loadcsv($fileName) {
        // load all participate file.
        $fileName = storage_path(). '/csv/' . $fileName;
        // return $fileName;
        if(!file_exists($fileName) || !is_readable($fileName))
            return FALSE;
        else {
            $header = NULL;
            $data = array();

            $count = 0;

            if (($handle = fopen($fileName, 'r')) !== FALSE){
                while (($row = fgetcsv($handle, 1500, ",")) !== FALSE){ //300 = max lenght of longest line
                    if(!$header)
                        $header = $row;
                    else 
                        // {
                        // echo "$count\n";
                        $data[] = array_combine($header, $row);
                        // echo $data[$count]['id'] . "\n";
                        // $count++;
                        // }
                }
            }
            fclose($handle);
            return $data;
        }
    }

    public static function searchPatient($pid) {
        $patientCases = GNCase::loadcsv('patient_case.csv');
        foreach($patientCases as $patient) {
            if($patient['patient_id'] == $pid) return $patient;
        }
        return false;
    }

    public static function searchCase($id) {
        $patientCases = GNCase::loadcsv('patient_case.csv');
        foreach($patientC
            if($case['case_id'] == $id) return $case;
        }
        return false;
    }

    public static function removeNullInput(&$data) {
        foreach($data as $key => $value) {
            if ($value == 'NULL' || $value == NULL) unset($data[$key]);
            // echo $key . "\n";
        }
        // return $data;
    }

    public static function getEditedData(&$data, $except) {
        foreach($data as $key => $value) {
            if ($key != $except)
                // echo $value[0] . "\n";
                if ($value[0] != '*') {
                    unset($data[$key]);
                } else {
                    $data[$key] = str_replace('*', '', $data[$key]);
                }
            // echo $key . "\n";
        }
        // return $data;
    }

    // siriraj weekly update case.
    public static function sirirajWeeklyCaseUpdate($path) {
        $timeStart = \Carbon\Carbon::now()->format('Y-d-m : H:i:s');

        $gncases = GNCase::loadcsv($path . '/gncases.csv');
        $labs = GNCase::loadcsv($path . '/labs.csv');

        // return $gncases[0];

        foreach($gncases as $gncase) {
            GNCase::removeNullInput($gncase);
            $curl = curl_init('https://thaignregistry.org/api-post-gncase/');
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $gncase); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($curl);
            curl_close($curl);
            echo "gncase : " . $gncase['HN'] . " " . $gncase['date_bx'] . " => " . $result . "\n";

            $curl = curl_init('https://thaignregistry.org/api-post-patient/');
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $gncase); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($curl);
            curl_close($curl);
            echo "patient : " . $gncase['HN'] . " " . $gncase['date_bx'] . " => " . $result . "\n";
        }

        foreach($labs as $lab) {
            GNCase::removeNullInput($lab);
            $curl = curl_init('https://thaignregistry.org/api-post-lab/');
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $lab); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($curl);
            curl_close($curl);
            echo "lab : " . $lab['HN'] . " " . $lab['date_bx'] . " => " . $result . "\n";
        }

        $timeStop = \Carbon\Carbon::now()->format('Y-d-m : H:i:s');

        echo $timeStart . "\n";
        echo $timeStop . "\n";

        return "Done";

        // \App\Lab::updateCalculation(); 
        // \App\GNCase::calAllCompleteness();
        // \App\GNCase::updateNextFUAllCase();
        // \App\GNcase::genAllSearchTerms();
    }

    // siriraj followups update
    public static function sirirajFUUpdate($path) {
        $timeStart = \Carbon\Carbon::now()->format('Y-d-m : H:i:s');

        $followups = GNCase::loadcsv($path . '/followups.csv');

        foreach($followups as $followup) {
            GNCase::removeNullInput($followup);
            $curl = curl_init('https://thaignregistry.org/api-makeup-followup/');
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $followup); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($curl);
            curl_close($curl);
            echo "followup : " . $followup['gncase_id'] . " => " . $result . "\n";
        }

        $timeStop = \Carbon\Carbon::now()->format('Y-d-m : H:i:s');

        echo $timeStart . "\n";
        echo $timeStop . "\n";

        return "Done";

        // \App\Lab::updateCalculation(); 
        // \App\GNCase::calAllCompleteness();
        // \App\GNcase::updateNextFUAllCase();
    }


    // rename case_id to id
    public static function cleanDataFromCSV($path) {
        $timeStart = \Carbon\Carbon::now()->format('Y-d-m : H:i:s');

        $gncases = GNCase::loadcsv($path . '/gncases.csv');

        // GNCase::removeNullInput($gncases[0]);
        // GNCase::getEditedData($gncases[0], 'id');
        // return $gncases[0];

        foreach($gncases as $gncase) {
            GNCase::removeNullInput($gncase);
            GNCase::getEditedData($gncase, 'id');
            $curl = curl_init('https://thaignregistry.org/api-clean-gncase/');
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $gncase); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($curl);
            curl_close($curl);
            echo "gncase : " . $gncase['id'] . " => " . $result . "\n";
        }

        $labs = GNCase::loadcsv($path . '/labs.csv');

        foreach($labs as $lab) {
            GNCase::removeNullInput($lab);
            GNCase::getEditedData($lab, 'id');
            $curl = curl_init('https://thaignregistry.org/api-clean-lab/');
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $lab); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($curl);
            curl_close($curl);
            echo "lab : " . $lab['id'] . " => " . $result . "\n";
        }

        $pathoreports = GNCase::loadcsv($path . '/pathoreports.csv');

        foreach($pathoreports as $pathoreport) {
            GNCase::removeNullInput($pathoreport);
            GNCase::getEditedData($pathoreport, 'id');
            $curl = curl_init('https://thaignregistry.org/api-clean-pathoreport/');
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $pathoreport); 
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($curl);
            curl_close($curl);
            echo "pathoreport : " . $pathoreport['id'] . " => " . $result . "\n";
        }
    }

    // // siriraj routine update
    // public static function sirirajUpdate($path) {
    //     $timeStart = \Carbon\Carbon::now()->format('Y-d-m : H:i:s');

    //     $gncases = GNCase::loadcsv($path . '/gncases.csv');
    //     $labs = GNCase::loadcsv($path . '/labs.csv');
    //     $followups = GNCase::loadcsv($path . '/followups.csv');

    //     foreach($gncases as $gncase) {
    //         GNCase::removeNullInput($gncase);
    //         $curl = curl_init('https://thaignregistry.org/api-post-gncase/');
    //         curl_setopt($curl, CURLOPT_POST, TRUE);
    //         curl_setopt($curl, CURLOPT_POSTFIELDS, $gncase); 
    //         curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    //         $result = curl_exec($curl);
    //         curl_close($curl);
    //         echo "gncase : " . $gncase['HN'] . $gncase['date_bx'] . " => " . $result . "\n";

    //         $curl = curl_init('https://thaignregistry.org/api-post-patient/');
    //         curl_setopt($curl, CURLOPT_POST, TRUE);
    //         curl_setopt($curl, CURLOPT_POSTFIELDS, $gncase); 
    //         curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    //         $result = curl_exec($curl);
    //         curl_close($curl);
    //         echo "patient : " . $gncase['HN'] . $gncase['date_bx'] . " => " . $result . "\n";
    //     }

    //     foreach($labs as $lab) {
    //         GNCase::removeNullInput($lab);
    //         $curl = curl_init('https://thaignregistry.org/api-makeup-lab/');
    //         curl_setopt($curl, CURLOPT_POST, TRUE);
    //         curl_setopt($curl, CURLOPT_POSTFIELDS, $lab); 
    //         curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    //         $result = curl_exec($curl);
    //         curl_close($curl);
    //         echo "lab : " . $lab['case_id'] . " => " . $result . "\n";
    //     }

    //     // foreach($followups as $followup) {
    //     //     GNCase::removeNullInput($followup);
    //     //     $curl = curl_init('https://thaignregistry.org/api-makeup-followup/');
    //     //     curl_setopt($curl, CURLOPT_POST, TRUE);
    //     //     curl_setopt($curl, CURLOPT_POSTFIELDS, $followup); 
    //     //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    //     //     $result = curl_exec($curl);
    //     //     curl_close($curl);
    //     //     echo "followup : " . $followup['gncase_id'] . " => " . $result . "\n";
    //     // }

    //     // \App\Lab::updateCalculation(); 
    //     // \App\GNCase::calAllCompleteness();
    //     // \App\GNcase::updateNextFUAllCase();

    //     $timeStop = \Carbon\Carbon::now()->format('Y-d-m : H:i:s');

    //     echo $timeStart . "\n";
    //     echo $timeStop . "\n";

    //     return TRUE;
    // }

    // integrate data form csv files.
    public static function integratecsv() {
        $timeStart = \Carbon\Carbon::now()->format('Y-d-m : H:i:s');;
        $patientCases = GNCase::loadcsv('patient_case.csv');
        // echo "patientCases\n";
        $patients = GNCase::loadcsv('patients.csv');
        // echo "patients\n";      
        $labs = GNCase::loadcsv('labs.csv');
        // echo "labs\n";
        $pathoreports = GNCase::loadcsv('pathoreports.csv');
        // echo "pathoreports\n";
        $pretreatments = GNCase::loadcsv('pretreatments.csv');
        // echo "pretreatments\n";
        $treatments = GNCase::loadcsv('treatments.csv');
        // echo "treatments\n";
        $gncases = GNCase::loadcsv('gncases.csv');
        // echo "gncases\n";

        // return $pretreatments[630];

        // ******************************************
        foreach($gncases as $gncase) {
            GNCase::removeNullInput($gncase);

            $gncase['date_bx'] = \Carbon\Carbon::createFromFormat('Y-m-d', $gncase['date_bx'])->format('d-m-Y');

            // get decrypt patient data.
            $pat = GNCase::searchPatient($gncase['patient_id']);
            $gncase['national_id'] = $pat['national_id'];

            if (isset($gncase['date_longest_symtom'])) {
                $gncase['date_longest_symtom'] = \Carbon\Carbon::createFromFormat('Y-m-d', $gncase['date_longest_symtom'])->format('d-m-Y');
            }
            // $gncase['date_longest_symtom'] = $gncase['date_longest_symtom'] !== '' ? \Carbon\Carbon::createFromFormat('Y-m-d', $gncase['date_longest_symtom'])->format('d-m-Y') : NULL;

            
            $curl = curl_init('http://localhost/api-post-gncase/');
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $gncase); 
            // curl_setopt($curl, CURLOPT_URL, "http://localhost/create-user");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($curl);
            curl_close($curl);
            echo "case " . $gncase['id'] . " => " . $gncase['national_id'] . " : " . $gncase['date_bx'] . " => " . $result . " : " . \Carbon\Carbon::now()->format('Y-d-m : H:i:s') . "\n";
        }

        foreach($patients as $patient) {
            GNCase::removeNullInput($patient);

            $pat = GNCase::searchPatient($patient['id']);

            $patient['national_id'] = $pat['national_id'];
            $patient['first_name'] = $pat['fname'];
            $patient['last_name'] = $pat['lname'];

            if (isset($patient['dob'])) {
                $patient['dob'] = \Carbon\Carbon::createFromFormat('Y-m-d', $patient['dob'])->format('d-m-Y');
            }
            // $patient['dob'] = $patient['dob'] !== '' ? \Carbon\Carbon::createFromFormat('Y-m-d', $patient['dob'])->format('d-m-Y') : NULL;

            // echo "patient : " . $patient['first_name'] . " : " . $patient['dob'] . " => \n";
            $curl = curl_init('http://localhost/api-post-patient/');
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $patient); 
            // curl_setopt($curl, CURLOPT_URL, "http://localhost/create-user");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($curl);
            curl_close($curl);
            echo "patient " . $patient['id'] . " => " . $patient['first_name'] . " => " . $result . " : " . \Carbon\Carbon::now()->format('Y-d-m : H:i:s') . "\n";
        }

        foreach($labs as $lab) {
            GNCase::removeNullInput($lab);

            $case = GNCase::searchCase($lab['id']);

            $lab['national_id'] = $case['national_id'];
            $lab['date_bx'] = \Carbon\Carbon::createFromFormat('Y-m-d', $case['date_bx'])->format('d-m-Y');
            
            if (isset($lab['date_lab'])) {
                $lab['date_lab'] = \Carbon\Carbon::createFromFormat('Y-m-d', $lab['date_lab'])->format('d-m-Y');
            }
            // $lab['date_lab'] = $lab['date_lab'] !== '' ? \Carbon\Carbon::createFromFormat('Y-m-d', $lab['date_lab'])->format('d-m-Y') : NULL;

            $curl = curl_init('http://localhost/api-post-lab/');
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $lab); 
            // curl_setopt($curl, CURLOPT_URL, "http://localhost/create-user");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($curl);
            curl_close($curl);

            echo "Lab " . $lab['id'] . " => " . $lab['national_id'] . " : " . $lab['date_bx'] . " => $result " . \Carbon\Carbon::now()->format('Y-d-m : H:i:s') . "\n";
        }

        foreach($pathoreports as $pathoreport) {
            GNCase::removeNullInput($pathoreport);

            $case = GNCase::searchCase($pathoreport['id']);

            $pathoreport['national_id'] = $case['national_id'];
            $pathoreport['date_bx'] = \Carbon\Carbon::createFromFormat('Y-m-d', $case['date_bx'])->format('d-m-Y');

            $curl = curl_init('http://localhost/api-post-pathoreport/');
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $pathoreport); 
            // curl_setopt($curl, CURLOPT_URL, "http://localhost/create-user");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($curl);
            curl_close($curl);

            echo  "patho " . $pathoreport['id'] . " => " . $pathoreport['national_id'] . " : " . $pathoreport['date_bx'] . "  => $result " . \Carbon\Carbon::now()->format('Y-d-m : H:i:s') . "\n";
        }

        foreach($pretreatments as $pretreatment) {
            GNCase::removeNullInput($pretreatment);

            $case = GNCase::searchCase($pretreatment['id']);

            $pretreatment['national_id'] = $case['national_id'];
            $pretreatment['date_bx'] = \Carbon\Carbon::createFromFormat('Y-m-d', $case['date_bx'])->format('d-m-Y');

            $curl = curl_init('http://localhost/api-post-pretreatment/');
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $pretreatment); 
            // curl_setopt($curl, CURLOPT_URL, "http://localhost/create-user");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($curl);
            curl_close($curl);

            echo  "pre rx " . $pretreatment['id'] . " => " . $pretreatment['national_id'] . " : " . $pretreatment['date_bx'] . "  => $result " . \Carbon\Carbon::now()->format('Y-d-m : H:i:s') . "\n";
        }

        $rxDate = [
            'pulse_methylpred_date',
            'prednisolone_date',
            'cyclophosphamide_date',
            'azathioprine_date',
            'MMF_date',
            'myfortic_date',
            'cyclosporine_date',
            'tacrolimus_date',
            'IVIg_date',
            'rituximab_date',
            'plasmapheresis_date',
            'ACEI_date',
            'ARB_date',
            'chloroquine_date',
            'statin_date',
            'HCQ_date',
            'anti_platelet_date',
            'antihypertensive_date',
            'diuretic_date',
            'other_current_rx1_date',
            'other_current_rx3_date',
            'other_current_rx2_date',
        ];

        foreach($treatments as $treatment) {
            GNCase::removeNullInput($treatment);

            $case = GNCase::searchCase($treatment['id']);

            $treatment['national_id'] = $case['national_id'];
            $treatment['date_bx'] = \Carbon\Carbon::createFromFormat('Y-m-d', $case['date_bx'])->format('d-m-Y');

            foreach($rxDate as $dateField) {
                if (isset($treatment['dateField'])) {
                    $treatment['dateField'] = \Carbon\Carbon::createFromFormat('Y-m-d', $treatment['dateField'])->format('d-m-Y');
                }
                // $treatment[$dateField] = $treatment[$dateField] !== '' ? \Carbon\Carbon::createFromFormat('Y-m-d', $treatment[$dateField])->format('d-m-Y') : NULL;
            }

            $curl = curl_init('http://localhost/api-post-treatment/');
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $treatment); 
            // curl_setopt($curl, CURLOPT_URL, "http://localhost/create-user");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
            $result = curl_exec($curl);
            curl_close($curl);

            echo  "rx " . $treatment['id'] . " => " . $treatment['national_id'] . " : " . $treatment['date_bx'] . " => $result " . \Carbon\Carbon::now()->format('Y-d-m : H:i:s') . "\n";
        }

        // create patients form cvs but check existence first.
        // foreach($patients as $patient) {

        //     // get decrypt name + id.
        //     $pat = GNCase::searchPatient($patient['id']);
            
        //     // check existence.
        //     $findPat = Patient::searchByNationalID($pat['national_id']);

        //     if (empty($findPat)) { // not existe.

        //         $patient['national_id'] = $pat['national_id'];
        //         $patient['first_name'] = $pat['fname'];
        //         $patient['last_name'] = $pat['lname'];
                
        //         // $patient['dob'] = \Carbon\Carbon::createFromFormat('Y-m-d', $patient['dob'])->format('d-m-Y');
        //         $patient['dob'] = $patient['dob'] !== '' ? \Carbon\Carbon::createFromFormat('Y-m-d', $patient['dob'])->format('d-m-Y') : NULL;
        //         echo $patient['id'] . "\n";
        //         $pat = Patient::create($patient);
        //         $pat['site_id'] = 1;
        //         $pat['creator'] = 0;
        //         $pat['updater'] = 0;
        //         $pat->save();
        //     }
        // }


        // create case form csv file.
        // foreach ($gncases as $gncase) {

        //     // get decrypt patient data.
        //     $pat = GNCase::searchPatient($gncase['patient_id']);
                        
        //     // check if patient existe.
        //     $findPat = Patient::searchByNationalID($pat['national_id']);
        //     // format date.
        //     $gncase['date_bx'] = \Carbon\Carbon::createFromFormat('Y-m-d', $gncase['date_bx'])->format('d-m-Y');

        //     // if case note exitse.
        //     // echo $pat['national_id'] . " => " . $gncase['date_bx'] . "\n";
        //     $isCase = GNCase::getGNCaseIDByCK($pat['national_id'], $gncase['date_bx']);
        //     // die(var_dump($gncase));

        //     // return $isCase;
        //     echo $pat['national_id'] . " => " . $gncase['date_bx'] . " : " .$gncase['id'] . " => $isCase \n";
        //     if ($isCase == 0) {
        //         // echo $gncase['id'] . ' => ' . $gncase['date_bx'] . ' => ' .  $gncase['date_longest_symtom'] . "\n";
                
        //         $gncase['date_longest_symtom'] = $gncase['date_longest_symtom'] !== '' ? \Carbon\Carbon::createFromFormat('Y-m-d', $gncase['date_longest_symtom'])->format('d-m-Y') : NULL;
        //         // echo $gncase['date_bx'] . "\n";
                
        //         $gncase['patient_id'] = $findPat->id;



        //         $case = GNCase::create($gncase);
        //         $case->site = 1;
        //         $case->creator = 0;
        //         $case->updater = 0;
        //         $case->save();
        //     }
        // }
        $timeStop = \Carbon\Carbon::now()->format('Y-d-m : H:i:s');

        echo $timeStart . "\n";
        echo $timeStop . "\n";
        return true;
    }

    public static function importcsv()
    {
        /*
        use Illuminate\Support\Facades\DB;
        Change csv file here
        */
        $filename = public_path().'/assets/csv/import_gn_cases.csv';
        if(!file_exists($filename) || !is_readable($filename))
            return FALSE;
        else {
            $header = NULL;
            $data = array();
            if (($handle = fopen($filename, 'r')) !== FALSE){
                /*
                change table here
                */
                while (($row = fgetcsv($handle, 1000, ",")) !== FALSE){ //300 = max lenght of longest line
                    if(!$header)
                        $header = $row;
                    else 
                        $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }

        foreach ($data as $item) {
            if (\App\Patient::isPatientExist($item['patient_id'])) {
                $patient = \App\Patient::searchByNationalID($item['patient_id']);
                
                if ($item['date_bx']) {
                    $date_bx = explode('-',$item['date_bx']);
                    $item['date_bx'] = $date_bx[2] . "-" . $date_bx[1] . "-" . $date_bx[0];
                }

                if ($item['date_longest_symtom']) {
                    $date_longest_symtom = explode('-',$item['date_longest_symtom']);
                    $item['date_longest_symtom'] = $date_longest_symtom[2] . "-" . $date_longest_symtom[1] . "-" . $date_longest_symtom[0];
                }

                $gncase = GNCase::create($item);
                $gncase->patient_id = $patient->id;
                $gncase->site = $item['site'];
                $gncase->creator = 0;
                $gncase->save();

                $lab = new \App\Lab;
                $lab->id = $gncase->id;
                $lab->save();

                $pat = new \App\Pathoreport;
                $pat->id = $gncase->id;
                $pat->save();

                $prerx = new \App\Pretreatment;
                $prerx->id = $gncase->id;
                $prerx->save();

                $rx = new \App\Treatment;
                $rx->id = $gncase->id;
                $rx->save();
            } 
        }

        return true;
    }

    

    // public static function setTxData($nid, $date_bx, $model, $field, $value, $date_fu) {
    //     $case_id = GNCase::getGNCaseIDByCK($nid, $date_bx);
    //     switch ($model) {
    //         case 'prerx':
    //             $obj = \App\Pretreatment::find($case_id);
    //             break;
    //         case 'rx':
    //             $obj = \App\Treatment::find($case_id);
    //             break;
    //         case 'fu':
    //             $objs = \App\Followup::where('gncase_id',$case_id)->where('date_fu',$date_fu)->get();
    //             $obj = $objs[0];
    //             break;
    //     }
    //     $obj->update([$field => $value]);
    //     $obj->save();
    //     return true;
    // }

    // public static function setTxDataAll() {
    //     $success = GNCase::setTxData('3459900179626','2015-05-08','prerx','cyclophosphamide_recent_dose','0.2', null);
    //     $success = GNCase::setTxData('1670500361510','2015-04-09','prerx','cyclophosphamide_recent_dose','0.75', null);
    //     $success = GNCase::setTxData('2630700087037','2015-01-08','prerx','cyclophosphamide_recent_dose','0.6', null);
    //     $success = GNCase::setTxData('3102400867589','2015-04-08','prerx','cyclophosphamide_recent_dose','0.1', null);
    //     $success = GNCase::setTxData('1520200006324','2015-09-22','prerx','cyclophosphamide_recent_dose','1', null);

    //     $success = GNCase::setTxData('3250401129236', '2014-12-04','prerx', 'MMF_recent_dose', '1.5', null);
    //     $success = GNCase::setTxData('1700400101990', '2015-02-12','prerx', 'MMF_recent_dose', '1', null);
    //     $success = GNCase::setTxData('1710300091101', '2015-04-30','prerx', 'MMF_recent_dose', '2', null);
    //     $success = GNCase::setTxData('1103700198784', '2015-02-13','prerx', 'MMF_recent_dose', '0.8', null);
    //     $success = GNCase::setTxData('1103700690069', '2015-02-23','prerx', 'MMF_recent_dose', '1.5', null);
    //     $success = GNCase::setTxData('360200229523', '2015-09-14','prerx', 'MMF_recent_dose', '0.75', null);
    //     $success = GNCase::setTxData('3720600102791','2014-12-09','prerx', 'MMF_recent_dose', '0.5', null);
    //     $success = GNCase::setTxData('3100300329281','2015-02-04','prerx', 'MMF_recent_dose', '1.5', null);
    //     $success = GNCase::setTxData('1100699001894','2015-03-18','prerx', 'MMF_recent_dose', '1.5', null);
    //     $success = GNCase::setTxData('1629900015021','2015-06-22','prerx', 'MMF_recent_dose', '1.5', null);
    //     $success = GNCase::setTxData('3120600291689','2014-06-23','prerx', 'MMF_recent_dose', '0.5', null);
    //     $success = GNCase::setTxData('1102700801536','2015-05-20','prerx', 'MMF_recent_dose', '2', null);
    //     $success = GNCase::setTxData('pmk56815/46', '2014-11-06','prerx', 'MMF_recent_dose', '2', null);
    //     $success = GNCase::setTxData('319980002131', '2015-06-03','prerx', 'MMF_recent_dose', '1.5', null);
    //     $success = GNCase::setTxData('khon_id_23', '2015-05-07','prerx', 'MMF_recent_dose', '1.5', null);
    //     $success = GNCase::setTxData('khon_id_29', '2015-02-03','prerx', 'MMF_recent_dose', '1', null);
    //     $success = GNCase::setTxData('khon_id_48', '2015-04-23','prerx', 'MMF_recent_dose', '1', null);

    //     $success = GNCase::setTxData('1102800018957','2015-07-06', 'prerx','myfortic_recent_dose', '0.36', null);
    //     $success = GNCase::setTxData('1100700029530','2015-03-09', 'prerx','myfortic_recent_dose', '0.72', null);

    //     $success = GNCase::setTxData('1130600085306','2015-06-03','rx','MMF_current_dose','1', null);
    //     $success = GNCase::setTxData('3250401129236','2014-12-04','rx','MMF_current_dose','0.05', null);
    //     $success = GNCase::setTxData('1180600101549','2014-12-09','rx','MMF_current_dose','1', null);
    //     $success = GNCase::setTxData('1710300091101','2015-04-30','rx','MMF_current_dose','2', null);
    //     $success = GNCase::setTxData('1103700690069','2015-02-23','rx','MMF_current_dose','1.5', null);
    //     $success = GNCase::setTxData('360200229523','2015-09-14','rx','MMF_current_dose','0.75', null);
    //     $success = GNCase::setTxData('pmk56815/46' ,'2014-11-06','rx','MMF_current_dose','2', null);
    //     $success = GNCase::setTxData('khon_id_10','2015-02-19','rx','MMF_current_dose','1', null);
    //     $success = GNCase::setTxData('khon_id_33','2015-03-24','rx','MMF_current_dose','1', null);
    //     $success = GNCase::setTxData('khon_id_48','2015-04-23','rx','MMF_current_dose','1', null);

    //     $success = GNCase::setTxData('1100700029530','2015-03-09','rx','myfortic_current_dose','0.72', null);

    //     $success = GNCase::setTxData('3110300389730','2015-01-30','fu','MMF_current_dose','0.72', '2015-02-11');
    //     $success = GNCase::setTxData('3110300389730','2015-01-30','fu','MMF_current_dose','0.72', '2015-07-15');
    //     $success = GNCase::setTxData('3110300389730','2015-01-30','fu','MMF_current_dose','0.72', '2015-11-04');
    //     $success = GNCase::setTxData('1103700690069','2015-02-23','fu','MMF_current_dose','1.5', '2015-03-11');
    //     $success = GNCase::setTxData('360200229523','2015-09-14','fu','MMF_current_dose','0.75', '2015-10-07');
    //     $success = GNCase::setTxData('3102400080732','2015-04-20','fu','MMF_current_dose','1.5', '2015-09-02');
    //     $success = GNCase::setTxData('1100700029530','2015-03-09','fu','MMF_current_dose','1.44', '2015-03-27');
    //     return $success;
    // }

    public static function calAllCompleteness() {
        $gncases = GNCase::all();
        foreach($gncases as $gncase) {
            $gncase->updateCompleteness();
            $model = Lab::find($gncase->id);
            $model->updateCompleteness();
            $model = Pathoreport::find($gncase->id);
            $model->updateCompleteness();
            echo "ID#" . $gncase->id . " - " . $model->fields_need . "\n";
            $model = Pretreatment::find($gncase->id);
            $model->updateCompleteness();
            $model = Treatment::find($gncase->id);
            $model->updateCompleteness();
        }
        // update site_id, patient_id.
        $fus = Followup::all();
        foreach($fus as $fu){
            $gn = GNCase::find($fu->gncase_id);
            // $user = User::find($fu->creator)
            $fu->patient_id = $gn->patient_id;
            $fu->site_id = $gn->site;
            $fu->save();
        }
        return true;
    }

    public function updateSearchTerms() {
        $this->attributes['search_terms'] = $this->HN . " " . $this->patient->first_name . " " . $this->patient->last_name . " : " . $this->date_bx->format('d-m-Y');
        $this->save();
    }

    public static function genAllSearchTerms() {
        $gncases = GNCase::all();
        foreach($gncases as $gncase) {
            $gncase->updateSearchTerms();
        }
    }

    public static function updateNextFUAllCase() {
        $gncases = GNCase::all();
        foreach ($gncases as $gncase) {
            $gncase->next_fu = $gncase->nextFU();
            $result = $gncase->save();
        }
    }
}
