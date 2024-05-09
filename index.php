<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <link rel="shortcut icon" type="image" href="assets/img/favicon.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Bristol Cycling</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <script src="https://cdn.emailjs.com/dist/email.min.js"></script>
    <link rel="stylesheet" href="assets/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/56e72382bd.js" crossorigin="anonymous"></script> <!--icon for l-->
    <script src="assets/js/emailjs.js"></script>
    <script src="assets/js/weatherapi.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>

<!--Doesn't work when i put it on styles.css idk why-->
<style>
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: black;
    }

    ::-webkit-scrollbar-thumb {
        background-color: white;
        border-radius: 10px;
    }

    /* 
    #weather-infoNav {
  position: fixed;
  right: 0;
} */
</style>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="77">
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
                    <li class="nav-item nav-link"><a class="nav-link active" href="#about">About</a></li>
                    <li class="nav-item nav-link"><a class="nav-link" href="#map">Map</a></li>
                    <li class="nav-item nav-link"><a class="nav-link" href="#table">Table</a></li>
                    <li style="margin-right: 8px;" class="nav-item nav-link"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item nav-link"><a class="nav-link" href="weather.php" id="currentTemp"></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!--Top page-->
    <header class="masthead" style="background-image:url('assets/img/bike.jpg'); ">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <a class="navbar-brand" href="index.php">
                            <img src="assets/img/logo.svg" alt="Bristol Cycling Logo" width="700" height="auto" style="max-width: 100%;">
                        </a>
                        <p class="intro-text"><br>Start Searching! <br></p>
                        <a class="btn btn-link btn-circle" role="button" href="#about"><i class="fa-solid fa-angle-down"></i></a>
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
                    <h2>About Bristol Cycling shops and services</h2>
                    <p>Bristol Cycling shops and services is a user-friendly website designed to cater to the needs of cycling enthusiasts
                        and riders of all levels who are looking to explore new areas and find nearby cycle shops with
                        ease. This platform offers a variety of features and functionalities to make your cycling
                        experience more enjoyable and convenient.</p>
                </div>
                <div class="row">
                    <?php
                    include('flickr.php');
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!--section with map not properly integrated the way i want atm-->
    <section id="map" class="text-center content-section masthead" style="height: 700px; background-image:url('assets/img/road.jpg');">
        <div class="container">
            <div class="row">
                <div class="map-clean">
                    <iframe allowfullscreen="" frameborder="0" src="https://arcg.is/14mOnb" width="100%" height="650px"></iframe>
                </div>
            </div>
        </div>
    </section>

    <style>
        table {
            max-width: 100%;
        }

        th,
        td {
            width: auto;
        }
    </style>

    <!--Section to display table-->
    <section class="text-center content-section masthead" id="table">
        <div class="container">
            <div class="col-lg-8 mx-auto">
                <h2 class="center-text">Details of bike shops and the services they provide</h2>
                <!-- Table for larger screens -->
                <div class="table-responsive d-none d-lg-block">
                    <table class="table table-striped">
                        <?php include 'database.php'; ?>
                    </table>
                </div>
                <!-- Download link for CSV file for mobile users since table too big for them-->
                <div class="text-center">
                    <a download href="assets/files/cycle_shops.pdf" class="btn btn-dark">Download as CSV</a>
                </div>
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
                    <form id="form">
                        <div class="form-group">
                            <label for="name">name</label>
                            <input class="form-control" type="text" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input class="form-control" type="text" name="email" id="email" required="@" required=".">
                        </div>
                        <div class="form-group">
                            <label for="subject">subject</label>
                            <input class="form-control" type="text" name="subject" id="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">message</label>
                            <input class="form-control" type="text" name="message" id="message" required>
                        </div>

                        <input type="submit" class="btn btn-dark" style="margin: 4px;" id="button" value="Send Email">
                    </form>
                    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
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
    <script src="assets/js/navbar.js"></script>

    <!--Again idk why i have to bring the script here, i swear i know how to link another file-->
    <script>
        //OpenWeatherMap API key
        const apiKey = '2645d3a34171a029a0ec6d4265529d9a';

        // Function to display current weather
        function displayCurrentWeather(currentWeather) {
            document.getElementById('currentTemp').innerText = currentWeather.main.temp + "°C";
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

        // Call the function to get current weather on page load
        getCurrentWeather();
    </script>

    <script>
        emailjs.init('frYMEZHApy2ByW99C')

        const btn = document.getElementById('button');

        document.getElementById('form')
            .addEventListener('submit', function(event) {
                event.preventDefault();

                btn.value = 'Sending...';

                const serviceID = 'default_service';
                const templateID = 'template_hajzas6';

                emailjs.sendForm(serviceID, templateID, this)
                    .then(() => {
                        btn.value = 'Send Email';
                        alert('Query Sent!'); //alert once submitted
                        form.reset(); //clears form after submission as well
                    }, (err) => {
                        alert('Error sending query!');
                    });
            });
    </script>
</body>

</html>