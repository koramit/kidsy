<?php

namespace App\APIs;
use GuzzleHttp\Client;

class PatientAPI {
    public function __construct() {
        $this->client = new Client([
                                'base_uri' => env('PATIENT_API_HOST'),
                                'timeout'  => 5.0,
                            ]);
    }
    public function getPatient($hn) {
        $response = $this->client->get('/get-patient/' . $hn);
        if ($response->getStatusCode() == 200) {
            return json_decode($response->getBody(), TRUE);
        }
        return response;
    }
}
