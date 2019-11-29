<?php

use App\Controllers\WeatherController;

require __DIR__ . '/vendor/autoload.php';

echo "Enter city name:";
$city = trim(fgets(STDIN, 1024));
if (empty($city)) {
    abort('City cannot be empty');
}
WeatherController::readCurrentWeather($city);
