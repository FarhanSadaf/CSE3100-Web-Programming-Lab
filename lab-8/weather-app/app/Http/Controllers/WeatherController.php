<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Exception;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        // Get the city from the request
        $city = $request->input('city');
        
        // Get the OpenWeather API key from the .env file
        $apiKey = env('OPENWEATHER_API_KEY');

        // If the city is provided, get the current coordinates
        if ($city) {
            try {
                // User OpenWeather API to get the weather data in Celsius by city
                // https://openweathermap.org/current
                $url = "https://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";
                
                // Use Guzzle to make the request
                $client = new Client();
                $response = $client->get($url);
                $data = json_decode($response->getBody(), true);

                return view('weather', [
                    'city' => $data['name'],
                    'temperature' => $data['main']['temp'],
                    'description' => $data['weather'][0]['description'],
                    'humidity' => $data['main']['humidity'],
                    'wind' => $data['wind']['speed']
                ]);
            }
            catch (Exception $e) {
                return view('weather', [
                    'error' => 'City not found!'
                ]);
            }
        }

        // If the city is not provided, get the coordinates of the city
        $data = $this->getCurrentCoordinates();
        
        // If IP address is not found, return the error
        if (isset($data['error'])) {
            return view('weather', $data);
        }

        // Get the weather data by coordinates
        $lat = $data['lat'];
        $lon = $data['lon'];

        try {
            // User OpenWeather API to get the weather data in Celsius
            // https://openweathermap.org/current
            $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$apiKey&units=metric";
            $client = new Client();
            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);
            
            return view('weather', [
                'city' => $data['name'],
                'temperature' => $data['main']['temp'],
                'description' => $data['weather'][0]['description'],
                'humidity' => $data['main']['humidity'],
                'wind' => $data['wind']['speed']
            ]);
        }
        catch (Exception $e) {
            return view('weather', [
                'error' => 'Could not get the weather data!'
            ]);
        }

    }
    
    public function getCurrentCoordinates() 
    {
        try {
            // Get the current coordinates of the user using Geolocation API
            $client = new Client();
            $response = $client->get("http://ip-api.com/json");
            $data = json_decode($response->getBody(), true);
            
            return [
                "city" => $data["city"],
                "lat" => $data["lat"],
                "lon" => $data["lon"]
            ];
        }
        catch (Exception $e) {
            return [
                "error" => "Could not get the current coordinates!"
            ];
        }
    }
}
