<?php

namespace App\Providers;

use App\Clients\LocationClient;
use Illuminate\Support\ServiceProvider;

class LocationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LocationClient::class, function () {
            $token = config('services.location_service.token');
            $email = config('services.location_service.email');
            $url = config('services.location_service.url');

            return new LocationClient($url, $token, $email);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
