<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Exception;

class PositionController extends Controller
{
    public function getCurrentCoordinates() 
    {
        try {
            // Get the current coordinates of the user using Geolocation API
            $client = new Client();
            $response = $client->get("http://ip-api.com/json");
            $data = json_decode($response->getBody(), true);
            return response()->json([
                "status" => "success",
                "city" => $data["city"],
                "country" => $data["country"],
                "lat" => $data["lat"],
                "lon" => $data["lon"]
            ]);
        }
        catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "Error fetching the IP address!"
            ]);
        }
    }

    public function getCoordinatesByCity($city)
    {
        try {
            // Use Geocoding API to get the coordinates of the city
            // https://openweathermap.org/api/geocoding-api
            $apiKey = env('OPENWEATHER_API_KEY');
            $url = "http://api.openweathermap.org/geo/1.0/direct?q=$city&limit=2&appid=$apiKey";
            // Use Guzzle to make the request
            $client = new Client();
            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);

            // Return the coordinates, "lat" and "lon" from $data
            return response()->json([
                "status" => "success",
                "city" => $data[0]["name"],
                "country" => $data[0]["country"],
                "lat" => $data[0]["lat"],
                "lon" => $data[0]["lon"]
            ]);
        }
        catch (Exception $e) {
            return response()->json([
                "status" => "error",
                "message" => "City not found!"
            ]);
        }
    }
}
