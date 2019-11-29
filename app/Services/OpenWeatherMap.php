<?php

namespace App\Services;

use App\Abstracts\WeatherServicesAbstract;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\ServerException;

class OpenWeatherMap extends WeatherServicesAbstract
{
    private $api_key;
    private $uri;

    public function getCurrentWeather($city): array
    {
        try {
            $res = $this->client->request('GET', $this->uri . 'data/2.5/weather', [
                'query' => [
                    'q' => $city,
                    'appid' => $this->api_key
                ],
            ]);
        } catch (ConnectException $exception) {
            abort("Error connecting to weather service");
        } catch (ClientException $exception) {
            abort("City not found");
        }

        $info = json_decode($res->getBody()->getContents());
        return [
            'temp' => kelvinToCelsius($info->main->temp),
            'wind' => $info->wind->speed,
            'clouds' => $info->clouds->all
        ];

    }

    public function setUri(): void
    {
        $this->uri = env('OPEN_WEATHER_URI');
    }

    public function setApiKey(): void
    {
        $this->api_key = env('OPEN_WEATHER_API_KEY');
    }

}