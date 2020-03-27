<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Car4You - wypożyczalnia samochodów</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Nunito|Quicksand&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <!-- Boxicons -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./js/index.js"></script>
</head>

<body>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light"
            style="box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">
            <a class="navbar-brand ml-2" href="index.php">
                <img src="images/Car4You-line-logo.png" height="50" alt="car4you logo">
                <!-- <a href="https://www.freepik.com/free-photos-vectors/background">Background vector created by katemangostar - www.freepik.com</a> -->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-1" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Strona główna<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Oferty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontakt</a>
                    </li>
                </ul>
                <?php
            if(!isset($_SESSION['id'])){
            echo "<button id='zaloguj' type='submit' class='btn btn-outline-primary mr-sm-2'>Zaloguj się</button>";
            echo "<button id='zarejestruj' type='submit' class='btn btn-primary my-2 my-sm-0'>Zarejestruj się</button>" ;
            }
            else{
                if(isset($_SESSION['rodzaj_klienta'])){
                    if($_SESSION['rodzaj_klienta'] == 1 || $_SESSION['rodzaj_klienta'] == 2){
                        echo "<button id='panelKlienta' href='./cpanel/index.php' type='submit' class='btn btn-primary my-2 my-sm-0'>Panel Klienta</button>";
                    }
                        
                }
                if(isset($_SESSION['rodzaj_pracownika'])){
                    if($_SESSION['rodzaj_pracownika'] == 1 || $_SESSION['rodzaj_pracownika'] == 2){
                        echo "<button id='panelPracownika' type='submit' class='btn btn-primary my-2 my-sm-0'>Moje Konto</button>"; 
                    }
                }
                echo "<button type='button' id='wyloguj' class='btn btn-primary my-2 my-sm-0'>Wyloguj</button>";
            }
        ?>
            </div>
        </nav>
    </section>

    <!-- Sekcja Hero -->
    <!-- Spierdolona responsywność -->
    <section id="hero" class="d-flex align-items-center text-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1">
                    <h1>Car4You</h1>
                    <h2>Oto najlepsza wypożyczalnia w Twojej okolicy.</h2>
                </div>
                <div class="col-lg-6 order-1 order-lg-1">
                    <!-- Dodać cień do obrazka -->
                    <img src="images/home-hero-background.png" class="img-fluid" alt="homepage-hero-background">
                </div>
            </div>
        </div>
    </section>

    <!-- Sekcja Highlight -->
    <section id="highlight" class="highlight highlight-bg">
        <div class="container">
            <div class="highlight-title text-light">
                <h2>Zobacz, dlaczego klienci nas wybierają</h2>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><i class='bx bx-car bx-tada'></i></div>
                        <h3 class="title">Lorem Ipsum</h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi sint occaecati cupiditate</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><i class='bx bx-building-house bx-tada'></i></div>
                        <h3 class="title">Lorem Ipsum</h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi sint occaecati cupiditate</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><i class='bx bx-navigation bx-tada'></i></div>
                        <h3 class="title">Lorem Ipsum</h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi sint occaecati cupiditate</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><i class='bx bx-user-check bx-tada'></i></div>
                        <h3 class="title">Lorem Ipsum</h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi sint occaecati cupiditate</p>
                    </div>
                </div>
            </div>
    </section>
    <section id="car-catalog" class="car-catalog car-catalog-bg text-dark">
        <div class="container">
            <div class="car-catalog-title">
                <h2>Wybierz samochód</h2>
                <p>Z ponad wielu dostępnych w naszym katalogu.</p>
            </div>
            <div class="row">
                <div class="col">
                    <div class="icon-box">
                        <div class="icon"><img src="images/porsche-911.png" class="img-fluid" alt="Porsche 911"></div>
                        <h3 class="title">Porsche 911</h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi sint occaecati cupiditate</p>
                    </div>
                </div>
                <div class="col">
                    <div class="icon-box">
                        <div class="icon"><img src="images/Ford-Fusion-Mondeo-2013.png" class="img-fluid" alt="Ford Mondeo"></div>
                        <h3 class="title">Ford Mondeo</h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi sint occaecati cupiditate</p>
                    </div>
                </div>
                <div class="col">
                    <div class="icon-box">
                        <div class="icon"><img src="images/bmw-3-series.png" class="img-fluid"
                                alt="Ford Mondeo"></div>
                        <h3 class="title">BMW Serii 3</h4>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                excepturi sint occaecati cupiditate</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <button type='button' class='btn btn-primary mr-sm-2'>Zobacz wszystko</button>
                </div>
            </div>
        </div>
    </section>
    <section id="map">
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d80902.88709892464!2d17.836246159044936!3d50.678829943229296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47105306456db34b%3A0x25c66487400c346e!2sOpole!5e0!3m2!1spl!2spl!4v1585259764522!5m2!1spl!2spl"
                frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </section>
    <section id="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col">

                </div>
                <div class="col">

                </div>
                <div class="col">

                </div>
                <div class="col">

                </div>
            </div>
        </div>
    </section>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Copyright Car4You © 2020. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>