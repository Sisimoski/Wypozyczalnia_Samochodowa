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

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.php';?>

</head>

<body>
    <!-- Alert -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/alert.php';?>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <nav class="navbar navbar-expand-md fixed-top navbar-light bg-light"
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
                        <a class="nav-link" href="oferty.php">Oferty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontakt.php">Kontakt</a>
                    </li>
                </ul>
                <?php
            if(!isset($_SESSION['id'])){
            echo "<button id='zaloguj' type='submit' class='btn btn-outline-primary'>Zaloguj się</button>";
            echo "<button id='zarejestruj' type='submit' class='btn btn-primary ml-2'>Zarejestruj się</button>" ;
            }
            else{
                if(isset($_SESSION['rodzaj_konta'])){
                    if($_SESSION['rodzaj_konta'] == 1 || $_SESSION['rodzaj_konta'] == 2){
                        echo "<button id='panelKlienta' href='./cpanel/index.php' type='submit' class='btn btn-primary'>Panel Klienta</button>";
                    }
                    if($_SESSION['rodzaj_konta'] == 3 || $_SESSION['rodzaj_konta'] == 4){
                        echo "<button id='panelKlienta' href='./cpanel/index.php' type='submit' class='btn btn-primary'>Panel Pracownika</button>";
                    }
                        
                }
                echo "<button type='button' id='wyloguj' class='btn btn-outline-primary ml-2'>Wyloguj</button>";
            }
        ?>


            </div>
        </nav>
    </section>

    <!-- Sekcja Hero -->
    <section id="hero" class="text-light">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1">
                    <h1>Car4You</h1>
                    <h2>Oto najlepsza wypożyczalnia w Twojej okolicy.</h2>
                </div>
                <div class="col-lg-6 order-1 order-lg-1">
                    <!-- Dodać cień do obrazka -->
                    <img src="images/bg/home-hero-background.png" class="img-fluid" alt="homepage-hero-background">
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
                <div class="col-md-6 col-lg-6 col-xl-3 d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><i class='bx bx-been-here'></i></div>
                        <h3 class="title">Innowacyjny pomysł</h4>
                            <p class="description">Pierwsza wypożyczalnia w Polsce, która umożliwia zarówno
                                wypożyczenie, jak i wynajem samochodu.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><i class='bx bx-dollar-circle'></i></div>
                        <h3 class="title">Konkurencyjna cena</h4>
                            <p class="description">Ceny są porównywalne z innymi okolicznymi wypożyczalniami. Dodatkowo
                                Ty sam możesz zarobić, wynajmując komuś swój własny samochód.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><i class='bx bx-home-heart'></i></div>
                        <h3 class="title">Wygoda</h4>
                            <p class="description">Wybór samochodu zależy od Ciebie. Możesz wybrać samochód bez
                                wychodzenia z domu. To samo dotyczy rejestracji swojego samochodu w systemie.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-3 d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><i class='bx bxs-coupon'></i></div>
                        <h3 class="title">Rabaty</h4>
                            <p class="description">Dzięki Karcie Lojalnościowej zdobywasz punkty, które pozwalają na
                                zniżki okresowe, ale też na zniżki stałe. Jedyne co musisz zrobić, to zacząć
                                wypożyczać/wynajmować!</p>
                    </div>
                </div>
            </div>
    </section>

    <!-- Sekcja Karuzela -->

    <section id="car-catalog" class="car-catalog car-catalog-bg text-dark">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="car-catalog-title">
                        <h2>Wybierz samochód</h2>
                        <p>Z ponad wielu dostępnych w naszym katalogu.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <section class="carousel slide" data-ride="carousel" id="carsCarousel">
                        <div class="container pt-0 mt-2">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="card-deck">
                                        
                                    <!-- Default Main Card -->
                                        <div class="card bg-light border-primary text-center">
                                            <img src="#" class="card-img-top" alt="Default">
                                            <div class="card-body card-body-flex">
                                                <h5 class="card-title">Title</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">Cena</h6>
                                                <div class="text-left">
                                                    <p class="card-text">
                                                        <h6><b>Klasa: </b></h6>
                                                        Rok produkcji: <br>
                                                        Silnik: <br>
                                                        Skrzynia biegów: 
                                                    </p>
                                                </div>
                                                <a href="wynajem/samochod.php" class="btn btn-primary">Wypożycz</a>
                                            </div>
                                        </div>
                                        <!-- End of Default Main Card -->

                                        <div class="card bg-light border-primary text-center">
                                            <img src="images/samochody/Ford_mondeo.png" class="card-img-top" alt="Ford Mondeo">
                                            <div class="card-body card-body-flex">
                                                <h5 class="card-title">Ford Mondeo</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">160zł/dzień</h6>
                                                <div class="text-left">
                                                    <p class="card-text">
                                                        <h6><b>Klasa: B</b></h6>
                                                        Rok produkcji: 2014r<br>
                                                        Silnik: 1.5L 120KM diesel<br>
                                                        Skrzynia biegów: Manualna
                                                    </p>
                                                </div>
                                                <a href="wynajem/samochod.php" class="btn btn-primary">Wypożycz</a>
                                            </div>
                                        </div>
                                        <div class="card bg-light border-primary text-center">
                                            <img src="images/samochody/hyundai i10.png" class="card-img-top" alt="Hyundai i10">
                                            <div class="card-body card-body-flex">
                                                <h5 class="card-title">Hyundai i10</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">70zł/dzień</h6>
                                                <div class="text-left">
                                                    <p class="card-text">
                                                        <h6><b>Klasa: B</b></h6>
                                                        Rok produkcji: 2013r<br>
                                                        Silnik: 1.0L 66KM benzyna<br>
                                                        Skrzynia biegów: Manualna
                                                    </p>
                                                </div>
                                                <a href="#" class="btn btn-primary">Wypożycz</a>
                                            </div>
                                        </div>
                                        <div class="card bg-light border-primary text-center">
                                            <img src="images/samochody/mercedes_cw205.png" class="card-img-top"
                                                alt="mercedes_cw205">
                                            <div class="card-body card-body-flex">
                                                <h5 class="card-title">Mercedes CW205</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">300zł/dzień</h6>
                                                <div class="text-left">
                                                    <p class="card-text">
                                                        <h6><b>Klasa: B+</b></h6>
                                                        Rok produkcji: 2014r<br>
                                                        Silnik: 1.6L 136KM diesel<br>
                                                        Skrzynia biegów: Manualna
                                                    </p>
                                                </div>
                                                <a href="#" class="btn btn-primary">Wypożycz</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card-deck">
                                        <div class="card bg-light border-primary text-center">
                                            <img src="images/samochody/renault-trafic.png" class="card-img-top"
                                                alt="renault-trafic">
                                            <div class="card-body card-body-flex">
                                                <h5 class="card-title">Renault Trafic</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">260zł/dzień</h6>
                                                <div class="text-left">
                                                    <p class="card-text">
                                                        <h6><b>Klasa: B</b></h6>
                                                        Rok produkcji: 2010r<br>
                                                        Silnik: 2.0L 115KM diesel<br>
                                                        Skrzynia biegów: Manualna
                                                    </p>
                                                </div>
                                                <a href="#" class="btn btn-primary">Wypożycz</a>
                                            </div>
                                        </div>
                                        <div class="card bg-light border-primary text-center">
                                            <img src="images/samochody/Seat_ibiza.png" class="card-img-top" alt="Seat_ibiza">
                                            <div class="card-body card-body-flex">
                                                <h5 class="card-title">Seat Ibiza</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">110zł/dzień</h6>
                                                <div class="text-left">
                                                    <p class="card-text">
        
                                                        <h6><b>Klasa: B</b></h6>
                                                        Rok produkcji: 2008r<br>
                                                        Silnik: 1.9L 105KM benzyna<br>
                                                        Skrzynia biegów: Manualna
                                                    </p>
                                                </div>
                                                <a href="#" class="btn btn-primary">Wypożycz</a>
                                            </div>
                                        </div>
                                        <div class="card bg-light border-primary text-center">
                                            <img src="images/samochody/Skoda_fabia.png" class="card-img-top" alt="Skoda_fabia">
                                            <div class="card-body card-body-flex">
                                                <h5 class="card-title">Skoda Fabia</h5>
                                                <h6 class="card-subtitle mb-2 text-muted">80zł/dzień</h6>
                                                <div class="text-left">
                                                    <p class="card-text">
                                                        <h6><b>Klasa: B</b></h6>
                                                        Rok produkcji: 2014r<br>
                                                        Silnik: 1.0L 60KM benzyna<br>
                                                        Skrzynia biegów: Manualna
                                                    </p>
                                                </div>
                                                <a href="#" class="btn btn-primary">Wypożycz</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-center lead">
                                    <a class="btn btn-secondary-outline prev" href="" title="go back"><i class="fa fa-lg fa-chevron-left"></i></a>
                                    <a class="btn btn-secondary-outline next" href="" title="more"><i class="fa fa-lg fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="row pt-3">
                        <div class="col text-center">
                            <a href="oferty.php" class='btn btn-outline-primary'>Zobacz wszystko</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php';?>
    <script src="/js/index.js"></script>
    <script src="/js/newsletter.js"></script>
</body>

</html>