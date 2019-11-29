<?php


namespace App\Tests\Controllers;


use App\Services\AnotherWeatherService;
use App\Services\OpenWeatherMap;
use PHPUnit\Framework\TestCase;

class WeatherControllerTest extends TestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
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
        parent::__construct($name, $data, $dataName);
    }

}