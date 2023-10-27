<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<script>
    import emailjs from 'emailjs-com'
</script>

<head>
    <link rel="shortcut icon" type="image" href="assets/img/bike-favicon.jpg">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Bristol Cycling</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin:700&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
    <script src="assets/js/emailjs.js"></script>
</head>


<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="77">
    <nav class="navbar navbar-expand-md fixed-top navbar-light" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#">Bristol Cycling</a><button data-bs-toggle="collapse" class="navbar-toggler navbar-toggler-right" data-bs-target="#navbarResponsive" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" value="Menu"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item nav-link"><a class="nav-link active" href="#about">About</a></li>
                    <li class="nav-item nav-link"><a class="nav-link" href="#map">Map</a></li>
                    <li class="nav-item nav-link"><a class="nav-link" href="#table">Table</a></li>
                    <li class="nav-item nav-link"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item nav-link"></a></li>
                    <li class="nav-item nav-link"><a class="nav-link" id="weather-infoNav"></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Top page-->
    <header class="masthead" style="background-image:url('assets/img/bike.jpg');">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h1 class="brand-heading mx-auto">Bristol Cycling</h1>
                        <p class="intro-text">Find your local bike shop for new bikes and servicing.<br>Created with BristolOpenData <br><!-- <a id="weather-info" style="color: white"> --></a></p>
                        <a class="btn btn-link btn-circle" role="button" href="#about"><i class="fa fa-angle-double-down animated"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--about section of website-->
    <section class="text-center content-section" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>About Bristol Cycling</h2>
                    <p>Bristol Cycling is a user-friendly website designed to cater to the needs of cycling enthusiasts
                        and riders of all levels who are looking to explore new areas and find nearby cycle shops with
                        ease. This platform offers a variety of features and functionalities to make your cycling
                        experience more enjoyable and convenient.</p>
                </div>
                <div class="row">
                    <link rel="stylesheet" href="styles.css">
                    <div class="column">
                        <img src="assets/img/bike6.jpg" alt="Snow" style="width:60%">
                    </div>
                    <div class="column">
                        <img src="assets/img/bike5.jpg" alt="Forest" style="width:60%">
                    </div>
                    <div class="column">
                        <img src="assets/img/bike4.jpg" alt="Mountains" style="width:60%">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--section with map not properly integrated the way i want atm-->
    <section id="map" class="text-center content-section masthead" style="height: 700px; background-image:url('assets/img/road.jpg');">
        <div class="container">
            <div class="row">
                <div class="map-clean"><iframe allowfullscreen="" frameborder="0" src="https://arcg.is/m0r49" width="100%" height="650px"></iframe></div>
            </div>
        </div>
    </section>

    <!--Section to display table-->
    <section class="text-center content-section masthead" id="table">
        <div class="container">
            <div class="col-lg-8 mx-auto">
                <h2 class="center-text">Table Data from Database</h2>
                <h3>I HATE SQL</h3>
                <?php
                include 'database.php';
                ?>
            </div>
        </div>
    </section>

    <!--Contact section working finally-->
    <section class="text-center content-section masthead" id="contact" style="background-image:url('assets/img/bike2.jpg');">
        <script src="https://smtpjs.com/v3/smtp.js"></script>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Contact</h2>
                    <form onSubmit="sendEmail(event)" id="emailForm">
                        <div class="form-group">
                            <label for="name">Full name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email address:</label>
                            <input type="email" class="form-control" id="email" name="email" required="@" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-dark" style="margin: 4px;">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container text-center">
            <p>Copyright ©&nbsp;Bristol Cycling 2023</p>
        </div>
    </footer>
    <!--Bugs out if its in the head tag idk why-->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/grayscale.js"></script>
    <script>
        // Function to fetch weather data from OpenWeatherMap
        function getWeather() {
            const apiKey = '2645d3a34171a029a0ec6d4265529d9a'; // Replace with your API key
            const city = 'Bristol';
            const country = 'UK';
            const units = 'metric'; // Change to 'imperial' for Fahrenheit

            const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${city},${country}&units=${units}&appid=${apiKey}`;

            fetch(apiUrl)
                .then((response) => response.json())
                .then((data) => {
                    const weatherInfo = document.getElementById('weather-info');
                    const weatherInfoNav = document.getElementById('weather-infoNav');

                    // Display weather information
                    const temperature = data.main.temp;
                    const description = data.weather[0].description;
                    const icon = data.weather[0].icon;

                    weatherInfo.innerHTML = `
          <!-- <h3>Weather in ${city}, ${country}</h3>  might use if i move from where i have it-->
          <p>Temperature: ${temperature}°C</p>
          <p>Description: ${description}</p>
          <img src="https://openweathermap.org/img/wn/${icon}.png" alt="Weather Icon">
        `;

                    weatherInfoNav.innerHTML = `
          <a>${temperature}°C  </a>  
        `;
                })
                .catch((error) => {
                    console.error('Error fetching weather data:', error);
                    weatherInfo.innerHTML = 'Weather data unavailable';
                });
        }

        // Call the function to get weather data when the page loads
        getWeather();
    </script>

</body>

</html>