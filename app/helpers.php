<?php

function env($key, $default = null)
{
    $dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');
    $dotenv->load();

    return getenv($key);
}

function kelvinToCelsius($kelvin)
{
    return $kelvin - 273.15;
}

function abort($message)
{
    echo $message;
    die();
}


