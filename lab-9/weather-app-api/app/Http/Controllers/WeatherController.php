<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Exception;

class WeatherController extends Controller
{
    public function getWeatherByCoordinates($lat, $lon)
    {
        try {
            // User OpenWeather API to get the weather data in Celsius
            // https://openweathermap.org/current
            $apiKey = env('OPENWEATHER_API_KEY');
            $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$apiKey&units=metric";
            $client = new Client();
            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);
            return response()->json([
                'status' => 'success',
                'data' => $data
            ]);
        }
        catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ]);
        }
    }
}
