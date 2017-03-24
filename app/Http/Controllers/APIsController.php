<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class APIsController extends Controller
{
    var $client;
    public function __construct() {
        $this->client = new Client();
    }

    public function getUser($sap) {
        $client = new Client();
        $response = $client->request('GET', 'http://localhost:9345/get-user-from-organization/' . $sap);
        return $response->getStatusCode();
    }

    public function login($sap, $password) {
        $response = $client->request('GET', 'http://localhost:9345/get-user-from-organization/' . $sap);
    }
}
