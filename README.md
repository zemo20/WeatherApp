# WeatherApp
Weather reading application

# How to run
1-git clone https://github.com/zemo20/WeatherApp.git


2-composer install


3-copy to .env.example to .env and add your openweathermap api key


4-run php index.php and follow the instruction

# Project structure
app: the application logic
tests : the test cases
vendor : external packages

# Mentionable Classes
WeatherServicesAbstract: the abstract class that should be extended by any new weather service used

WeatherController: the logic of outputting the weather passes through this class

OpenWeatherMapService: open weather map service class

helpers(not a class): functions that are maybe be needed throughout the app should be added to this file

# External Packages:
Composer: Obviously

Guzzle http client: The most famous client for http requests

Dotenv : The Easy way to manage env variables

phpunit : for testing
