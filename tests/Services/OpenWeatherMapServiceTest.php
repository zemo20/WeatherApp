<?php


namespace App\Tests\Services;


use App\Services\OpenWeatherMap;
use GuzzleHttp\Exception\ClientException;
use PHPUnit\Framework\TestCase;

class OpenWeatherMapServiceTest extends TestCase
{
    private $service;
    private $response;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        //just to ensure the right weather service is used in case the env has another service in use
        putenv('WEATHER_SERVICE=openweather');
        $this->service = new OpenWeatherMap();
        parent::__construct($name, $data, $dataName);
        $this->response = $this->service->getCurrentWeather('cairo');
    }

    public function testServiceReturnsInformation()
    {
        self::assertIsArray($this->response);
        self::assertArrayHasKey('temp', $this->response);
        self::assertArrayHasKey('wind', $this->response);
        self::assertArrayHasKey('clouds', $this->response);
    }

    public function testResponseTypes()
    {
        self::assertIsNumeric($this->response['temp']);
        self::assertIsNumeric($this->response['wind']);
        self::assertIsNumeric($this->response['clouds']);
    }
}