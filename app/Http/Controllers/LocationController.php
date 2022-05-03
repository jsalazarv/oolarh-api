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
        $data = collect();
        $data->put('data', $countries->json());
        $data->put('links', []);
        $data->put('meta', []);

        return LocationResource::collection($data);
    }

    /**
     * @param $country
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function states($country)
    {
        $states = $this->client->getStatesByCountry($country);
        $data = collect();
        $data->put('data', $states->json());
        $data->put('links', []);
        $data->put('meta', []);

        return LocationResource::collection($data);
    }

    /**
     * @param $state
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function cities($contry, $state)
    {
        $cities = $this->client->getCitiesByState($contry, $state);
        $data = collect();
        $data->put('data', $cities->json());
        $data->put('links', []);
        $data->put('meta', []);

        return LocationResource::collection($data);
    }
}
