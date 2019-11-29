<?php

namespace App\Abstracts;

use GuzzleHttp\Client;

Abstract class WeatherServicesAbstract
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->setUri();
        $this->setApiKey();
    }

    public abstract function getCurrentWeather($city): array;

    public abstract function setUri(): void;

    public abstract function setApiKey(): void;

}