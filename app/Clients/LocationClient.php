<?php

namespace App\Clients;

use Illuminate\Support\Facades\Http;

class LocationClient
{
    protected $client;

    public function __construct($url, $token)
    {
        $client = Http::withOptions([
            'base_uri' => $url
        ])->withHeaders([
            'Accept' => 'application/json',
            'X-CSCAPI-KEY' => $token
        ]);

        $this->client = $client;
    }

    public function getCountries()
    {
        return $this->client->get("/countries");
    }

    public function getStatesByCountry($country)
    {
        return $this->client->get("/countries/" . $country . "/states");
    }

    public function getCitiesByState($country, $state)
    {
        return $this->client->get("/countries/" . $country . "/states/" . $state . "/cities");
    }
}
