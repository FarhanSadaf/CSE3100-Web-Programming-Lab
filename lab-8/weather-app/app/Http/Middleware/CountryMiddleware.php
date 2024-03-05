<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use GuzzleHttp\Client;

class CountryMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $country='BD'): Response
    {
        /* Only allow requests from the specified country */
        
        // Get the city from the request
        $city = $request->input('city');

        // Use the reverse geocoding API to get the country from the coordinates
        $apiKey = env("OPENWEATHER_API_KEY");
        $url = "http://api.openweathermap.org/geo/1.0/direct?q=$city&limit=1&appid=$apiKey";

        // Use Guzzle to make the request
        $client = new Client();
        $response = $client->get($url);
        $data = json_decode($response->getBody(), true);

        if ($data[0]["country"] != $country) {
            return response('You are not allowed to get the weather from this route', 401);
        }
        return $next($request);
    }
}
