<?php

namespace App\APIs;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
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

        try {
            $response = $this->client->post('/api-post-' . $model, ['form_params' => $data]);
        } catch (RequestException $e) { // in case of server down.
            return FALSE;
        }

        if ($response->getStatusCode() == 200) {
            $response =  json_decode($response->getBody(), TRUE);
            if ($response['resultCode'] > 1) return FALSE; // data not update.
            
            return TRUE; // success.
        }

        return FALSE; // connection failed.
    }
}