<?php

namespace App\Http\Controllers;

use App\Clients\LocationClient;
use App\Http\Resources\LocationResource;

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
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function countries()
    {
        $countries = $this->client->getCountries();

        return LocationResource::collection([
            'data' => $countries->json(),
            'links' => [
                "first" => "",
                "last" => "",
                "prev" => null,
                "next" => null
            ],
            'meta' => []
        ]);
    }

    /**
     * @param $country
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function states($country)
    {
        $states = $this->client->getStatesByCountry($country);

        return LocationResource::collection([
            'data' => $states->json(),
            'links' => [
                "first" => "",
                "last" => "",
                "prev" => null,
                "next" => null
            ],
            'meta' => []
        ]);
    }

    /**
     * @param $state
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function cities($state)
    {
        $cities = $this->client->getCitiesByState($state);

        return LocationResource::collection([
            'data' => $cities->json(),
            'links' => [
                "first" => "",
                "last" => "",
                "prev" => null,
                "next" => null
            ],
            'meta' => []
        ]);
    }
}
