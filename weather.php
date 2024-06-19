<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image" href="assets/img/favicon.png">
  <title>Weather</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/56e72382bd.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arial">
</head>
<style>
  body {
    font-family: arial;
  }

  #table-test {
    max-width: 200px;
    margin: 0 auto;
    margin-top: 30px;
  }
</style>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="77" style="background-image:url('assets/img/bike.jpg'); background-size: cover;">
  <nav class="navbar navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="assets/img/logo.svg" alt="Bristol Cycling Logo" width="250" height="auto">
      </a>
      <button data-bs-toggle="collapse" class="navbar-toggler navbar-toggler-right" data-bs-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" value="Menu">
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item nav-link"><a class="nav-link active" href="index.php"><i class="fa-solid fa-arrow-left"></i> Back</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-5"><br>
    <div class="card text-white bg-dark mb-3 text-center" id="table-test">
      <div class="card-header">Current Weather</div>
      <div class="card-body">
        <p class="card-text">Temperature: <span id="currentTemp"></span>°C</p>
        <p class="card-text">Weather: <span id="currentWeather"></span></p>
        <p class="card-text">Humidity: <span id="currentHumidity"></span>%</p>
        <p class="card-text">Wind Speed: <span id="currentWindSpeed"></span> m/s</p>
      </div>
    </div>
    <h2>Weather Forecast for Bristol, UK</h2>
    <div class="table-responsive">
      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th>Date</th>
            <th>Temperature (°C)</th>
            <th>Weather</th>
            <th>Humidity (%)</th>
            <th>Wind Speed (m/s)</th>
          </tr>
        </thead>
        <tbody id="weatherTable">
        </tbody>
      </table>
    </div>
  </div>

  <script>
    const apiKey = '0aac235af5e24577b2d130100241606';

    // Function to display current weather
    function displayCurrentWeather(currentWeather) {
      document.getElementById('currentTemp').innerText = currentWeather.temp_c;
      document.getElementById('currentWeather').innerText = currentWeather.condition.text;
      document.getElementById('currentHumidity').innerText = currentWeather.humidity;
      document.getElementById('currentWindSpeed').innerText = currentWeather.wind_mph * 0.44704; // Convert mph to m/s
    }

    // Function to fetch current weather
    async function getCurrentWeather() {
      try {
        const response = await fetch(`https://api.weatherapi.com/v1/current.json?key=${apiKey}&q=Bristol&aqi=no`);
        const data = await response.json();
        const currentWeatherData = data.current;

        // Display current weather in the card
        displayCurrentWeather(currentWeatherData);
      } catch (error) {
        console.log('Error fetching current weather:', error);
      }
    }

    // Function to fetch weather forecast for the next 7 days
    async function getWeatherForecast() {
      try {
        const response = await fetch(`https://api.weatherapi.com/v1/forecast.json?key=${apiKey}&q=Bristol&days=7&aqi=no&alerts=no`);
        const data = await response.json();
        const forecastData = data.forecast.forecastday;

        const weatherTable = document.getElementById('weatherTable');
        weatherTable.innerHTML = ''; // Clears the table before adding new data

        forecastData.forEach(dayForecast => {
          const date = new Date(dayForecast.date);

          const row = document.createElement('tr');
          row.innerHTML = `
            <td>${date.toDateString()}</td>
            <td>${dayForecast.day.avgtemp_c}°C</td>
            <td>${dayForecast.day.condition.text}</td>
            <td>${dayForecast.day.avghumidity}%</td>
            <td>${(dayForecast.day.maxwind_mph * 0.44704).toFixed(1)} m/s</td>
          `;
          weatherTable.appendChild(row);
        });

      } catch (error) {
        console.log('Error fetching weather forecast:', error);
        const weatherTable = document.getElementById('weatherTable');
        weatherTable.innerHTML = '<tr><td colspan="5">Failed to fetch weather forecast</td></tr>';
      }
    }

    // Call the function to get current weather on page load
    getCurrentWeather();

    // Call the function to get weather forecast on page load
    getWeatherForecast();
  </script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/js/navbar.js"></script>
</body>

</html>