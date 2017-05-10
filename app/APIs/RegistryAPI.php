<?php

namespace App\APIs;
use GuzzleHttp\Client;
use App\BiopsyCase;

class RegistryAPI {
    public function __construct() {
        $this->client = new Client([
                                'base_uri' => env('GN_REGISTRY_HOST'),
                                'timeout'  => 2.0,
                            ]);
    }
    
    // siriraj weekly update case.
    public function updateRegistry($data, $model) {
        removeNullInput($data);
        $response = $this->client->post('/api-post-' . $model, ['form_params' => $data]);
        if ($response->getStatusCode() == 200) {
            $response =  json_decode($response->getBody(), TRUE);
            // echo "resultCode = " . $response['resultCode'] . "; responseText = " . $response['resultText'] . "\n";
            if ($response['resultCode'] > 1) return false;
        } else return false;

        return true;
    }
    // public function updateRegistry($caseID) {
    //     $case = BiopsyCase::find($caseID);
    //     $data = [
    //         'HN' => $case->HN,
    //         'date_bx' => $case->date_bx->format('d-m-Y'),
    //         'height' => $case->height_cm,
    //         'weight' => $case->weight_kg,
    //         'SBP' => $case->pre_SBP_mmHg,
    //         'DBP' => $case->pre_DBP_mmHg,
    //         'smoking' => $case->smoking,
    //         'cigars_day' => $case->smoke_per_day,
    //         'cigar_years' => $case->smoke_years,
    //         'national_id' => $case->getPatientData('document_id'),
    //         'first_name' => $case->getPatientData('first_name'),
    //         'last_name' => $case->getPatientData('last_name'),
    //         'dob' => $case->getPatientData('dob') === NULL ? '' : date_create($case->getPatientData('dob'))->format('d-m-Y'),
    //         'gender' => $case->getPatientData('gender'),
    //         'address' => $case->getPatientData('address'),
    //         'postcode' => $case->getPatientData('postcode'),
    //         'tel_no' => $case->getPatientData('tel_no'),
    //         'race' => $case->is_black,
    //         'birth_place' => $case->birth_place_id,
    //         'education' => $case->education_id,
    //         'career' => $case->career_id,
    //     ];
    //     removeNullInput($data);

    //     // return $data;

    //     $response = $this->client->post('/api-post-gncase', ['form_params' => $data]);
    //     if ($response->getStatusCode() == 200) {
    //         $response =  json_decode($response->getBody(), TRUE);
    //         echo "resultCode = " . $response['resultCode'] . "; responseText = " . $response['resultText'] . "\n";
    //         if ($response['resultCode'] > 1) return false;
    //     } else return false;


    //     $data = [
    //         'date_bx' => $case->date_bx->format('d-m-Y'),
    //         'national_id' => $case->getPatientData('document_id'),
    //         'first_name' => $case->getPatientData('first_name'),
    //         'last_name' => $case->getPatientData('last_name'),
    //         'dob' => $case->getPatientData('dob') === NULL ? '' : date_create($case->getPatientData('dob'))->format('d-m-Y'),
    //         'gender' => $case->getPatientData('gender'),
    //         'address' => $case->getPatientData('address'),
    //         'postcode' => $case->getPatientData('postcode'),
    //         'tel_no' => $case->getPatientData('tel_no'),
    //         'race' => $case->is_black,
    //         'birth_place' => $case->birth_place_id,
    //         'education' => $case->education_id,
    //         'career' => $case->career_id,
    //     ];
    //     removeNullInput($data);
    //     $response = $this->client->post('/api-post-patient', ['form_params' => $data]);
    //     if ($response->getStatusCode() == 200) {
    //         $response =  json_decode($response->getBody(), TRUE);
    //         echo "resultCode = " . $response['resultCode'] . "; responseText = " . $response['resultText'] . "\n";
    //         if ($response['resultCode'] > 1) return false;
    //     } else return false;

    //     $data = [
    //         'date_bx' => $case->date_bx->format('d-m-Y'),
    //         'national_id' => $case->getPatientData('document_id'),
    //         'date_lab' => $case->date_bx->format('d-m-Y'),
    //         'Hct' => $case->Hct,
    //         'platelet' => $case->platelet,
    //         'BUN' => $case->BUN,
    //         'Cr' => $case->Cr,
    //         'HBsAg' => $case->HBV == 1 ? '0':NULL,
    //         'HBeAg' => $case->HBV == 1 ? '0':NULL,
    //         'Anti_HCV' => $case->HCV == 1 ? '0':NULL,
    //         'Anti_HIV' => $case->HIV == 1 ? '0':NULL,
    //     ];
    //     removeNullInput($data);
    //     // return $data;
    //     $response = $this->client->post('/api-post-lab', ['form_params' => $data]);
    //     if ($response->getStatusCode() == 200) {
    //         $response =  json_decode($response->getBody(), TRUE);
    //         echo "resultCode = " . $response['resultCode'] . "; responseText = " . $response['resultText'] . "\n";
    //         if ($response['resultCode'] > 1) return false;
    //     } else return false;

    //     // $data = [
    //     //     'date_bx' => $case->date_bx->format('d-m-Y'),
    //     //     'national_id' => $case->getPatientData('document_id'),
    //     //     'patho_done' => '1',
    //     //     // 'patho_result' => '1',
    //     // ];
    //     // removeNullInput($data);
    //     // $response = $this->client->post('/api-post-pathoreport', ['form_params' => $data]);
    //     // if ($response->getStatusCode() == 200) {
    //     //     $response =  json_decode($response->getBody(), TRUE);
    //     //     echo "resultCode = " . $response['resultCode'] . "; responseText = " . $response['resultText'] . "\n";
    //     //     if ($response['resultCode'] > 1) return false;
    //     // } else return false;

    //     return true;

    //     // \App\Lab::updateCalculation(); 
    //     // \App\GNCase::calAllCompleteness();
    //     // \App\GNCase::updateNextFUAllCase();
    //     // \App\GNcase::genAllSearchTerms();
    // }
}