<?php

namespace App\Helpers;

use GuzzleHttp\Client;

class PlayerInfo
{
    public static function getNBAPlayerInfo($playerID, $playerName, $statsToGet)
    {
        $client = new Client();



        $response = $client->request('GET', 'https://tank01-fantasy-stats.p.rapidapi.com/getNBAPlayerInfo', [
            'headers' => [
                'X-RapidAPI-Host' => 'tank01-fantasy-stats.p.rapidapi.com',
                'X-RapidAPI-Key' => env('RAPIDKEY'),
            ],
            'query' => [
                'playerID' => $playerID,
                'playerName' => $playerName,
                'statsToGet' => $statsToGet,
            ],
        ]);

        return $response->getBody();
    }
}
