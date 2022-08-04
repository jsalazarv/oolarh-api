<?php

namespace App\Http\Controllers;

use App\Clients\LocationClient;
use App\Http\Resources\LocationResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

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
     * @return AnonymousResourceCollection
     */
    public function countries(): AnonymousResourceCollection
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
     * @return AnonymousResourceCollection
     */
    public function states($country): AnonymousResourceCollection
    {
        $states = $this->client->getStatesByCountry($country);
        $data = collect();
        $data->put('data', $states->json());
        $data->put('links', []);
        $data->put('meta', []);

        return LocationResource::collection($data);
    }

    /**
     * @param $country
     * @param $state
     * @return AnonymousResourceCollection
     */
    public function cities($country, $state): AnonymousResourceCollection
    {
        $cities = $this->client->getCitiesByState($country, $state);
        $data = collect();
        $data->put('data', $cities->json());
        $data->put('links', []);
        $data->put('meta', []);

        return LocationResource::collection($data);
    }
}
