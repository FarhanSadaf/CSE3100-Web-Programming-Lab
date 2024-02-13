// Get all elements by id
const searchBtn = document.getElementById('searchBtn');
const cityName = document.getElementById('cityName');
const temperature = document.getElementById('temperature');
const weatherDescription = document.getElementById('weatherDescription');
const humidity = document.getElementById('humidity');
const windSpeed = document.getElementById('windSpeed');

// When the document is loaded, display the weather of current location
document.addEventListener('DOMContentLoaded', function() {
    fetchWeatherData();
});

// When the search button is clicked, display the weather of the city
searchBtn.addEventListener('click', function() {
    const city = document.getElementById('cityInput').value;
    fetchWeatherData(city);
});

function fetchWeatherData(city='') {
    // Start loading the progress bar
    startLoading();

    // Fetch data from the server with route "/coordinates/city"
    fetch(`/coordinates/${city}`)
        .then(response => response.json())
        .then(coordinateData => {
            // If status is error 
            if (coordinateData.status === 'error') {
                // Display the error message
                cityName.innerHTML = coordinateData.message;
                temperature.innerHTML = '';
                weatherDescription.innerHTML = '';
                humidity.innerHTML = '';
                windSpeed.innerHTML = '';
            }
            else {
                // Get the latitude and longitude from the coordinateData
                const lat = coordinateData.lat;
                const lon = coordinateData.lon;

                // Fetch data from the server with route "/weather/lat/lon"
                fetch(`/weather/${lat}/${lon}`)
                    .then(response => response.json())
                    .then(weatherData => {
                        if (weatherData.status === 'error') {
                            // Display the error message
                            cityName.innerHTML = weatherData.message;
                            temperature.innerHTML = '';
                            weatherDescription.innerHTML = '';
                            humidity.innerHTML = '';
                            windSpeed.innerHTML = '';
                        }
                        else {
                            // Display the weather of the current location
                            const _cityName = coordinateData.city;
                            const _temperature = weatherData.data.main.temp;
                            const _weatherDescription = weatherData.data.weather[0].description;
                            const _windSpeed = weatherData.data.wind.speed;
                            const _humidity = weatherData.data.main.humidity;

                            cityName.innerHTML = `Weather in ${_cityName}`;
                            temperature.innerHTML = `Temperature: ${_temperature}°C`;
                            weatherDescription.innerHTML = `Weather: ${_weatherDescription}`;
                            humidity.innerHTML = `Humidity: ${_humidity}%`;
                            windSpeed.innerHTML = `Wind Speed: ${_windSpeed} km/h`;
                        }
                    })
                    .catch(error => {
                        console.log('Error fetching weather data:', error);
                    })
                    .finally(() => {
                        // End loading the progress bar
                        endLoading();
                    });
                }
        })
        .catch(error => {
            // Show the error 
            cityName.innerHTML = 'Error fetching weather data. Please try again later.';
            temperature.innerHTML = '';
            weatherDescription.innerHTML = '';
            humidity.innerHTML = '';
            windSpeed.innerHTML = '';
        })
        .finally(() => {
            // End loading the progress bar
            endLoading();
        });
    
}

