// Function to fetch weather data from OpenWeatherMap
const weatherInfo = document.getElementById('weather-info');
const weatherInfoNav = document.getElementById('weather-infoNav');

function getWeather() {
    const apiKey = '2645d3a34171a029a0ec6d4265529d9a'; // Replace with your API key
    const city = 'Bristol';
    const country = 'UK';
    const units = 'metric'; // Change to 'imperial' for Fahrenheit

    const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city},${country}&units=${units}&appid=${apiKey}`;

    fetch(apiUrl)
        .then((response) => response.json())
        .then((data) => {
            // Display weather information
            const temperature = data.main.temp;
            const description = data.weather[0].description;
            const icon = data.weather[0].icon;

            weatherInfo.innerHTML = `
                <p>Temperature: ${temperature}°C</p>
                <p>Description: ${description}</p>
                <img src="https://openweathermap.org/img/wn/${icon}.png" alt="Weather Icon">
            `;

            weatherInfoNav.innerHTML = `<a>${temperature}°C </a>`;
        })
        .catch((error) => {
            console.error('Error fetching weather data:', error);
            weatherInfo.innerHTML = 'Weather data unavailable';
        });
}

// Call the function to get weather data when the page loads
getWeather();
