<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
</head>
<body>

    <div class="container">
        <h1>Get the Weather!</h1>
        <form class="search-container" action="" method="POST">
            @csrf
            <input type="text" name="city" placeholder="Enter city name">
            <button type="submit" id="searchBtn">Search</button>
        </form>
        @if(isset($error))
            <div class="weather-data">
                <h2 class="error">{{ $error }}</h2>
            </div>
        @else
        <div class="weather-data">
            <h2>Weather in {{ $city }}</h2>
            <p>Temperature: {{ $temperature }}°C</p>
            <p>Weather: {{ $description }}</p>
            <p>Humidity: {{ $humidity }}%</p>
            <p>Wind Speed: {{ $wind }} km/h</p>
        </div>
        @endif
    </div>

    <script src="{{asset("js/script.js")}}"></script>
</body>
</html>