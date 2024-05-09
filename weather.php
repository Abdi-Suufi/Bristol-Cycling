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

<body style="background-image:url('assets/img/bike.jpg'); background-size: cover;">
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
    <div class="card text-white bg-dark mb-3 text-center" id="table-test" >
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
    const apiKey = '2645d3a34171a029a0ec6d4265529d9a';

    // Function to display current weather
    function displayCurrentWeather(currentWeather) {
      document.getElementById('currentTemp').innerText = currentWeather.main.temp;
      document.getElementById('currentWeather').innerText = currentWeather.weather[0].description;
      document.getElementById('currentHumidity').innerText = currentWeather.main.humidity;
      document.getElementById('currentWindSpeed').innerText = currentWeather.wind.speed;
    }

    // Function to fetch current weather
    async function getCurrentWeather() {
      try {
        const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=Bristol&appid=${apiKey}&units=metric`);
        const currentWeatherData = await response.json();

        // Display current weather in the card
        displayCurrentWeather(currentWeatherData);
      } catch (error) {
        console.log('Error fetching current weather:', error);
      }
    }

    // Function to fetch weather forecast for the next 7 days
    async function getWeatherForecast() {
      try {
        const response = await fetch(`http://api.openweathermap.org/data/2.5/forecast?q=Bristol&appid=${apiKey}&units=metric`);
        const forecastData = await response.json();

        const weatherTable = document.getElementById('weatherTable');
        weatherTable.innerHTML = ''; // Clears the table before adding new data

        const forecastsPerDay = {}; 

        forecastData.list.forEach(dayForecast => {
          const date = new Date(dayForecast.dt * 1000).toDateString(); 

          if (!forecastsPerDay[date] || Math.abs(dayForecast.dt - getNoonTimestamp(date)) < Math.abs(forecastsPerDay[date].dt - getNoonTimestamp(date))) {
            forecastsPerDay[date] = dayForecast;
          }
        });

        Object.values(forecastsPerDay).slice(1).forEach(dayForecast => { 
            const date = new Date(dayForecast.dt * 1000); 

          const row = document.createElement('tr');
          row.innerHTML = `
            <td>${date.toDateString()}</td>
            <td>${dayForecast.main.temp}°C</td>
            <td>${dayForecast.weather[0].description}</td>
            <td>${dayForecast.main.humidity}%</td>
            <td>${dayForecast.wind.speed.toFixed(1)} m/s</td> 
          `;
          weatherTable.appendChild(row);
        });

      } catch (error) { 
        console.log('Error fetching weather forecast:', error);
        const weatherTable = document.getElementById('weatherTable');
        weatherTable.innerHTML = '<tr><td colspan="5">Failed to fetch weather forecast</td></tr>';
      }
    }

    // Helper function to get a timestamp for noon of a given date
    function getNoonTimestamp(dateString) {
      const date = new Date(dateString);
      date.setHours(12, 0, 0, 0);
      return date.getTime() / 1000 ; 
    }

    // Call the function to get current weather on page load
    getCurrentWeather();

    // Call the function to get weather forecast on page load
    getWeatherForecast();
  </script>

<footer>
        <div class="container text-center">
            <p>Copyright ©&nbsp;Bristol Cycling 2023</p>
        </div>
    </footer>
</body>

</html>