<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require 'vendor/autoload.php';

class TestGuzzleController extends Controller
{
    public function index()
    {
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://kodikapi.com/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', '/list', ['query' => ['token' => 'b366fa83b760db1dc05b3c7d5f70331e', 'types' => 'anime-serial']]);
        $response = json_decode($response->getBody()->getContents(),true);
        echo '<pre>';
        print_r($response['results']);
        echo '</pre>';
    }
}
