<?php

namespace App\Modules\Parsing\Controllers;

use GuzzleHttp\Client as HttpClient;

class ParsingController
{
    public function parse()
    {
        // $file = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/publicanimeList.json');
        // $file = json_decode($file, true);
        // return file_put_contents($_SERVER['DOCUMENT_ROOT'].'/myAnimeList.json', json_encode($file,JSON_PRETTY_PRINT));


        $url = 'https://kodikapi.com/list?token=b366fa83b760db1dc05b3c7d5f70331e&types=anime-serial&order=asc';
        $httpClient = new HttpClient();
        // $parsingList = json_decode($response->getBody()->getContents(), true);
        // return $result = $this->getPage($url, $httpClient);
        $result = $this->getTitle($url, $httpClient);
        $returnedValue =  response()->json($result);
        $returnedValue = json_encode($returnedValue, JSON_PRETTY_PRINT);
        return file_put_contents($_SERVER['DOCUMENT_ROOT'].'/myAnimeListV2.json', $returnedValue);
    }
    public function getTitle($url, $client)
    {
        $result = [];
        $response = $client->post($url);

        $response = json_decode($response->getBody()->getContents(), true);

        $result[] = $response["results"];

        if (!empty($response["next_page"])) {
            $result = array_merge($result, $this->getTitle($response["next_page"], $client));
        }

        return $result;
    }
    public function getPage($url, $client)
    {
        $result = [];
        $response = $client->post($url);

        $response = json_decode($response->getBody()->getContents(), true);

        // $result[] = $response["results"];

        if (!empty($response["next_page"]))
        {
            return $this->getPage($response["next_page"], $client);
        }

        return $url;
    }
}
