<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    <link rel="stylesheet" href="{{asset("css/progress-bar.css")}}">
</head>
<body>
    <div class="progress-container">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    <div class="container">
        <h1>Get the Weather of Bangladesh!</h1>
        <div class="search-container">
            <input type="text" id="cityInput" placeholder="Enter city name">
            <button id="searchBtn">Search</button>
        </div>
        <div id="weatherData" class="weather-data">
            <h2 id="cityName"></h2>
            <p id="temperature"></p>
            <p id="weatherDescription"></p>
            <p id="humidity"></p>
            <p id="windSpeed"></p>
        </div>
    </div>

    <script src="{{asset("js/progress-bar.js")}}"></script>
    <script src="{{asset("js/script.js")}}"></script>
</body>
</html>