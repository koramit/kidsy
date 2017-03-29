<?php

namespace App\APIs;
use GuzzleHttp\Client;

class UserAPI {
    
    public function __construct() {
        $this->client = new Client([
                                'base_uri' => env('USER_API_HOST'),
                                'timeout'  => 2.0,
                            ]);
    }

    public function checkUser($orgID) {
        $response = $this->client->get('/check-user/' . $orgID);
        if ($response->getStatusCode() == 200) return json_decode($response->getBody(), TRUE);
        return ['resultCode' => 9, 'resultText' => 'service error.'];
    }

    public function login($data) {
        $response = $this->client->post('/login',['form_params' => $data]);
        if ($response->getStatusCode() == 200) return json_decode($response->getBody(), TRUE);
        return ['resultCode' => 9, 'resultText' => 'service error.'];
    }

    public function getData(array $data) {
        $response = $this->client->post('/get-user',['form_params' => $data]);
        if ($response->getStatusCode() == 200) return json_decode($response->getBody(), TRUE);
        return ['resultCode' => 9, 'resultText' => 'service error.'];
    }
}