<?php

namespace App\Http\Controllers;

use App\Clients\LocationClient;

class LocationController extends Controller
{
    protected $client;

    public function __construct(LocationClient $locationClient)
    {
        $this->client = $locationClient;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function countries()
    {
        $countries = $this->client->getCountries();

        return $countries;
    }

    /**
     * @param $country
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function states($country)
    {
        $states = $this->client->getStatesByCountry($country);

        return $states;
    }

    /**
     * @param $state
     * @return \GuzzleHttp\Promise\PromiseInterface|\Illuminate\Http\Client\Response
     */
    public function cities($state)
    {
        $cities = $this->client->getCitiesByState($state);

        return $cities;
    }
}
