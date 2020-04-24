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

    <?php 
    include("include.php");
    ?>

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
            <div class="car-catalog-title">
                <h2>Wybierz samochód</h2>
                <p>Z ponad wielu dostępnych w naszym katalogu.</p>
            </div>
            <section class="carousel slide" data-ride="carousel" id="carsCarousel">
                <div class="container pt-0 mt-2">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-deck">
                                <div class="card">
                                    <div class="card-img-top p-4 card-img-top-250">
                                        <img class="img-fluid" src="images/porsche-911.png" alt="Porsche 911">
                                    </div>
                                    <div class="card-body pt-2">
                                        <h6 class="small text-wide p-b-2">Voluptatum deleniti atque corrupti quos
                                            dolores et quas molestias
                                            excepturi sint occaecati cupiditate</h6>
                                        <h2>
                                            <a href="">Porsche 911</a>
                                        </h2>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-img-top p-4 card-img-top-250">
                                        <img class="img-fluid" src="images/Ford-Fusion-Mondeo-2013.png"
                                            alt="Ford Mondeo">
                                    </div>
                                    <div class="card-body pt-2">
                                        <h6 class="small text-wide p-b-2">Voluptatum deleniti atque corrupti quos
                                            dolores et quas molestias
                                            excepturi sint occaecati cupiditate</h6>
                                        <h2>
                                            <a href="">Ford Mondeo</a>
                                        </h2>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-img-top p-4 card-img-top-250">
                                        <img class="img-fluid" src="images/bmw-3-series.png" alt="BMW Serii 3">
                                    </div>
                                    <div class="card-body pt-2">
                                        <h6 class="small text-wide p-b-2">Voluptatum deleniti atque corrupti quos
                                            dolores et quas molestias
                                            excepturi sint occaecati cupiditate</h6>
                                        <h2>
                                            <a href="">BMW Serii 3</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card-deck">
                                <div class="card">
                                    <div class="card-img-top p-4 card-img-top-250">
                                        <img class="img-fluid" src="images/porsche-911.png" alt="Porsche 911">
                                    </div>
                                    <div class="card-body pt-2">
                                        <h6 class="small text-wide p-b-2">Voluptatum deleniti atque corrupti quos
                                            dolores et quas molestias
                                            excepturi sint occaecati cupiditate</h6>
                                        <h2>
                                            <a href="">Porsche 911</a>
                                        </h2>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-img-top p-4 card-img-top-250">
                                        <img class="img-fluid" src="images/Ford-Fusion-Mondeo-2013.png"
                                            alt="Ford Mondeo">
                                    </div>
                                    <div class="card-body pt-2">
                                        <h6 class="small text-wide p-b-2">Voluptatum deleniti atque corrupti quos
                                            dolores et quas molestias
                                            excepturi sint occaecati cupiditate</h6>
                                        <h2>
                                            <a href="">Ford Mondeo</a>
                                        </h2>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-img-top p-4 card-img-top-250">
                                        <img class="img-fluid" src="images/bmw-3-series.png" alt="BMW Serii 3">
                                    </div>
                                    <div class="card-body pt-2">
                                        <h6 class="small text-wide p-b-2">Voluptatum deleniti atque corrupti quos
                                            dolores et quas molestias
                                            excepturi sint occaecati cupiditate</h6>
                                        <h2>
                                            <a href="">BMW Serii 3</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-md-center lead">
                            <a class="btn btn-secondary-outline prev" href="" title="go back"><i
                                    class="fa fa-lg fa-chevron-left"></i></a>
                            <a class="btn btn-secondary-outline next" href="" title="more"><i
                                    class="fa fa-lg fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row pt-3">
                <div class="col text-center">
                    <button type='button' class='btn btn-primary mr-sm-2'>Zobacz wszystko</button>
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer" class="footer bg-light">
        <div class="container">
            <div class="row justify-content-between">

                <div class="col-lg-3 col-md-6 footer-newsletter">
                    <h4>Pozostań w kontakcie</h4>
                    <p>
                        Nie przegap żadnych informacji i zapisz się do naszego newslettera.
                    </p>
                    <form class="newsletterForm">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" id="newsletterEmail"
                                placeholder="Email">
                        </div>
                        <button type="button" id="subscribeNewsletterButton" class="btn btn-primary">Subskrybuj</button>
                    </form>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Przydatne linki</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Strona główna</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Oferty</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">O nas</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Kontakt</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-social">
                    <h4>Dołącz do sieci</h4>
                    <p>Stwórz z nami najwspanialszą społeczność!</p>
                    <div class="footer-social mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram-alt"></i></a>
                        <a href="#" class="play-store"><i class='bx bxl-play-store'></i></a>
                        <a href="#" class="githyb"><i class="bx bxl-github"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Kontakt</h4>
                    <p>
                        ul. Prószkowska niewiemjaka <br>
                        Opole, 11-111<br>
                        Polska <br><br>
                        <strong>Telefon:</strong> +48 123 456 789<br>
                        <strong>Email:</strong> Car4YouCompany@gmail.com<br>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>Car4You © 2020. Wszystkie prawa zastrzeżone.</p>
                </div>
            </div>
        </div>
    </div>
    <script src="js/index.js"></script>
    <script src="js/newsletter.js"></script>
</body>

</html>