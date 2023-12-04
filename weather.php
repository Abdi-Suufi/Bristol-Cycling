<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/56e72382bd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <script src="assets/js/navbar.js"></script>
</head>

<body style="background: rgb(0,0,0);
background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(11,11,11,1) 7%, rgba(45,45,45,1) 52%, rgba(17,17,17,1) 87%, rgba(0,0,0,1) 100%);">
    <nav class="navbar navbar-expand-md fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="index.php">Bristol Cycling</a>
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

    <div class="card text-white bg-dark mb-3">
            <div class="card-header">Current Weather</div>
            <div class="card-body">
                <h5 class="card-title">Bristol, UK</h5>
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
                    <!-- Weather forecast for the next 7 days will be displayed here -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Your OpenWeatherMap API key
        const apiKey = '2645d3a34171a029a0ec6d4265529d9a';

        // Function to fetch weather forecast for the next 7 days
        async function getWeatherForecast() {
            try {
                const response = await fetch(`https://api.openweathermap.org/data/2.5/forecast?q=Bristol&cnt=8&appid=${apiKey}&units=metric`);
                const forecastData = await response.json();

                // Display the weather forecast in the table
                const weatherTable = document.getElementById('weatherTable');
                forecastData.list.slice(1).forEach(dayForecast => {
                    const date = new Date(dayForecast.dt * 1000); // Convert timestamp to date

                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${date.toDateString()}</td>
                        <td>${dayForecast.main.temp}°C</td>
                        <td>${dayForecast.weather[0].description}</td>
                        <td>${dayForecast.main.humidity}%</td>
                        <td>${dayForecast.wind.speed} m/s</td>
                    `;
                    weatherTable.appendChild(row);
                });
            } catch (error) {
                console.log('Error fetching weather forecast:', error);
                const weatherTable = document.getElementById('weatherTable');
                weatherTable.innerHTML = '<tr><td colspan="5">Failed to fetch weather forecast</td></tr>';
            }
        }

        // Call the function to get weather forecast on page load
        getWeatherForecast();
    </script>
</body>
</html>