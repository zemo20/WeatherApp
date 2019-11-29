<?php


namespace App\Controllers;


use App\Services\AnotherWeatherService;
use App\Services\OpenWeatherMap;

class WeatherController
{
    protected $service;
    protected $uri;


    public function __construct()
    {
        switch (env('WEATHER_SERVICE')) {
            case 'openweather':
                $this->service = new OpenWeatherMap();
                break;
            case 'anotherserivce':
                $this->service = new AnotherWeatherService();
                break;
            default:
                throw new \Exception('Invalid weather service.');
        }
    }


    public static function readCurrentWeather($city)
    {
        $weatherState = (new self)->service->getCurrentWeather($city);
        $temperature = $weatherState['temp'];
        $cloud = function () use ($weatherState) {
            if ($weatherState['clouds'] > 70) {
                return 'It\'s really cloudy today';
            } elseif ($weatherState['clouds'] > 30) {
                return 'There\'s some cloud today';
            } else {
                return 'The sky is clear';
            }
        };
        $wind = ($weatherState['wind'] > 5) ? 'It\'s windy today' : 'The winds are calm ';

        echo json_encode([
            'temp' => 'Temp:' . $temperature . ' degree Celsius',
            'cloud' => 'Cloud:' . $cloud(),
            'wind' => 'Wind:' . $wind
        ]);
    }


}