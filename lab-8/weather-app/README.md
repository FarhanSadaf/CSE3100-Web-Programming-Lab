<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Creating a Weather Application
In this lab, we will create basic a weather application.


# Follow the following steps
1. Create a new Laravel project.

    `composer create-project laravel/laravel weather-app`

    `cd example-app`

2. Open in Visual Studio Code and run the project.

    `php artisan serve`

3. Installing [Guzzle](https://github.com/guzzle/guzzle) (for client HTTP API)

    `composer require guzzlehttp/guzzle`

    If you get any errors while running this command, try running `composer update` first and then the above command.

4. As we will use [OpenWeather](openweathermap.org) for API calls, create a new account there and get your [API KEY](https://home.openweathermap.org/api_keys).

5. Add your API key to `.env` file. E.g.

    `OPENWEATHER_API_KEY="fdcc5af3e2fdb37742b4cf41008dffc6"`

6. Create a new view using the `php artisan make:view weather` command.

    A new view file, `\resources\views\weather.blade.php` will be created.

    Design this file. In this project, we created `css` and `js` folders in `public` directory, put all the CSS and JS files there and linked them.

7. Getting the weather
    1) Create a new controller by writing this command, `php artisan make:controller WeatherController`.
    2) Implemement `getCurrentCoordinates()` function on `WeatherContoller` to fetch the current co-ordinate information of the user using the [IP Geolocation API](https://ip-api.com/). 
    3) Implemement `getWeather(Request $request)` function on `WeatherContoller` which will return the `weather.blade.php` view with weather data passed in an associative array. If the city is given in the request input (form POST in our implementation), then use the [OpenWeather API](https://openweathermap.org/current) to fetch the weather data. If the city is not given in the request input (form GET in our implementation), then call `getCurrentCoordinates()` function to get the current latitude and longitude and call  the [OpenWeather API](https://openweathermap.org/current) to fetch the weather data.
    4) Add the routes on `web.php` (GET and POST). 

8. Use the [Blade Directives](https://laravel.com/docs/10.x/blade) on `weather.blade.php` file where necessary.

    Make sure to use `@csrf` in your form, or else you might get *Error 409: Page Expired*. [Why?](https://www.squash.io/how-to-fix-error-419-page-expired-in-laravel-post-request/#:~:text=When%20working%20with%20Laravel%2C%20you,against%20cross%2Dsite%20scripting%20attacks.)


## Tasks
1. Modify this project to serve the city search request using only the GET method (modify the `weather.blade.php` and `web.php`). There will be only a single GET route on `web.php`.
2. Add another controller `WeatherAPIController` which will work similarly to `WeatherController`. But instead of returning the view with data, `WeatherAPIController` will only return JSON responses.

    Add 2 GET routes on `api.php`, `/weather` (will return the weather of the current city), and `/weather/{city}` (will return the weather of the city passed in the route). 

    Then, test these routes using [`Postman`](https://www.postman.com/). E.g. `http://127.0.0.1:8000/api/weather` and `http://127.0.0.1:8000/api/weather/california`.

## References
1. https://github.com/rakibdevs/openweather-laravel-api/tree/master
