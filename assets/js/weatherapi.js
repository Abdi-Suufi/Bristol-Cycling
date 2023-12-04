document.addEventListener('DOMContentLoaded', function () {
    const weatherInfo = document.getElementById('weather-info');
    const forecastTable = document.getElementById('forecast-table');

    function getWeather() {
        const apiKey = '2645d3a34171a029a0ec6d4265529d9a'; // Replace with your API key
        const city = 'Bristol';
        const country = 'UK';
        const units = 'metric'; // Change to 'imperial' for Fahrenheit

        // Get weather forecast data for the next 7 days
        const forecastUrl = `https://api.openweathermap.org/data/2.5/forecast?q=${city},${country}&units=${units}&appid=${apiKey}`;
        fetchWeatherData(forecastUrl, displayWeatherForecast);
    }

    function fetchWeatherData(url, callback) {
        fetch(url)
            .then((response) => response.json())
            .then((data) => {
                callback(data);
            })
            .catch((error) => {
                console.error('Error fetching weather data:', error);
                weatherInfo.innerHTML = 'Weather data unavailable';
            });
    }

    function displayWeatherForecast(forecastData) {
        console.log('Forecast data:', forecastData); // Log the received forecast data

        // Clear existing table rows
        forecastTable.innerHTML = '<tr><th>Date</th><th>Temperature (°C)</th><th>Weather</th></tr>';

        // Extract relevant data from the forecastData and populate the table
        for (const entry of forecastData.list) {
            const date = new Date(entry.dt * 1000); // Convert timestamp to date
            const temperature = entry.main.temp;
            const weatherDescription = entry.weather[0].description;

            const row = forecastTable.insertRow();
            row.innerHTML = `<td>${date.toDateString()}</td><td>${temperature}</td><td>${weatherDescription}</td>`;
        }
    }

    // Call the function to get weather data when the page loads
    getWeather();
});
