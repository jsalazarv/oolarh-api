<?php

namespace App\Clients;

use Illuminate\Support\Facades\Http;

class LocationClient
{
    protected $client;

    public function __construct($url, $token, $email)
    {
        $response = Http::withOptions([
            'base_uri' => $url
        ])->withHeaders([
            'Accept' => 'application/json',
            'api-token' => $token,
            'user-email' => $email,
        ])->get("getaccesstoken");

        $authToken = $response->json('auth_token');

        $client = Http::withOptions([
            'base_uri' => $url
        ])->withHeaders([
            'Authorization' => 'Bearer ' . $authToken,
            'Accept' => 'application/json',
            'user-email' => $email,
        ]);

        $this->client = $client;
    }

    public function getCountries()
    {
        return $this->client->get("/countries/");
    }

    public function getStatesByCountry($country)
    {
        return $this->client->get("/states/" . $country);
    }

    public function getCitiesByState($state)
    {
        return $this->client->get("/cities/" . $state);
    }
}
