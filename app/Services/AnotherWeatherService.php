<?php


namespace App\Services;


use App\Abstracts\WeatherServicesAbstract;

class AnotherWeatherService extends WeatherServicesAbstract
{

    public function getCurrentWeather($city): array
    {
        // Obviously not implemented
        return [];
    }

    public function setUri(): void
    {
        $this->uri = env('ANOTHER_WEATHER_SERVICE_URI');
    }

    public function setApiKey(): void
    {
        $this->api_key = env('ANOTHER_WEATHER_SERVICE_KEY');
    }
}