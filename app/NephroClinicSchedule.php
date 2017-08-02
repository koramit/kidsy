<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\APIs\PatientAPI;

class NephroClinicSchedule extends Model
{
    protected $PatientAPI;
    protected $table = 'nephro_clinic_schedules';
    protected $fillable = ['hn_list', 'datetime_clinic'];
    protected $dates = ['datetime_clinic'];

    public function __construct(array $attributes = array()) { // สำหรับ class ที่ extends Model ต้องทำ __construct() แบบนี้จ้า
        parent::__construct($attributes);
        $this->PatientAPI = new PatientAPI;
    }
    
    public function getPatientList() {
        foreach ( preg_split("/\r\n|\n|\r/", $this->hn_list) as $hn ) {
            
            $patient['hn'] = $hn;

            $patient['name'] = $this->PatientAPI->getPatient($hn)['name'];

            $caseFolder = \App\CaseFolder::findByHN($hn);
            if ( $caseFolder !== NULL ) {
                $patient['folder_number'] = $caseFolder->getFolderNumber();
                $patient['folder_type'] = $caseFolder->folder_type;
                $colorText = \App\PathoDiagnosisCode::getColorText($caseFolder->diagnosis_code);
                $patient['remark'] =  ($colorText === NULL ? '' : ($colorText . ' : ')) . $caseFolder->remark;
            } else {
                $legacy = \App\LegacyBiopsyCase::findByHN($hn);
                if ( $legacy !== NULL ) {
                    $patient['folder_number'] = $legacy->getFolderNumber();
                    $patient['folder_type'] = $legacy->folder_type;
                    $colorText = \App\PathoDiagnosisCode::getColorText($legacy->diag_code);
                    $patient['remark'] = ($colorText === NULL ? '' : ($colorText . ' : ')) . trim($legacy->remark . ' ' . $legacy->new_folder  . ' ' . $legacy->staus);
                } else {
                    $patient['folder_number'] = NULL;
                    $patient['folder_type'] = NULL; 
                    $patient['remark'] = NULL;
                }
            }
            
            $patients[] = $patient; 
        }

        return $patients;
    }
}
