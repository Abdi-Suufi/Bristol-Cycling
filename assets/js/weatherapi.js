// Function to fetch weather data from OpenWeatherMap
document.addEventListener('DOMContentLoaded', function() {
    const weatherInfo = document.getElementById('weather-info');
    const weatherInfoNav = document.getElementById('weather-infoNav');
    function getWeather() { //each constant gets used during url query
        const apiKey = '2645d3a34171a029a0ec6d4265529d9a'; // api key
        const city = 'Bristol';
        const country = 'UK';
        const units = 'metric'; // Change to 'imperial' from Fahrenheit
    
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
            .catch((error) => {
                console.error('Error fetching weather data:', error);
                weatherInfo.innerHTML = 'Weather data unavailable';
            });
    }
    
    // Call the function to get weather data when the page loads
    getWeather();
});
