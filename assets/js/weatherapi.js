// Function to fetch weather data from OpenWeatherMap
document.addEventListener('DOMContentLoaded', function() {
    const weatherInfoNav = document.getElementById('weather-infoNav');

    function getWeather() {
        const apiKey = '2645d3a34171a029a0ec6d4265529d9a';
        const city = 'Bristol';
        const country = 'UK';
        const units = 'metric';

        const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city},${country}&units=${units}&appid=${apiKey}`;

        fetch(apiUrl)
            .then((response) => response.json())
            .then((data) => {
                // Display weather information
                const temperature = data.main.temp;
                const description = data.weather[0].description;
                const icon = data.weather[0].icon;
                weatherInfoNav.innerHTML = `<a>${temperature}°C </a>`;
            })
    }

    // Call the function to get weather data when the page loads
    getWeather();
});