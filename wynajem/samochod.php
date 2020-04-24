<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Samochód</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.php';?>
    <script src="./js/index.js"></script>
    <script src="js/newsletter.js"></script>
</head>

<body>
    <!-- Alert -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/alert.php';?>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <nav class="navbar navbar-expand-md fixed-top navbar-light bg-light"
            style="box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">
            <a class="navbar-brand ml-2" href="index.php">
                <img src="/images/Car4You-line-logo.png" height="50" alt="car4you logo">
                <!-- <a href="https://www.freepik.com/free-photos-vectors/background">Background vector created by katemangostar - www.freepik.com</a> -->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-1" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php">Strona główna<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/oferty.php">Oferty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/aboutus.php">O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kontakt.php">Kontakt</a>
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
    <!-- Naprawiona responsywność -->
    <section id="herous" class="text-light">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-12 pt-lg-0 order-2 order-lg-1">
                    <h1>Wypożycz samochód</h1>
                    <h2>Sprawdź szczegóły.</h2>
                </div>
            </div>
        </div>
    </section>

    <section id="carcontent">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 d-flex align-items-stretch">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="/images/samochody/Ford_mondeo.png" alt="First slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Ford Mondeo</h3>
                            <h5 class="card-subtitle mb-2 text-muted">160zł/dzień</h5>
                            <p class="card-text card-text-details">Segment: klasa średnia</p>
                            <p class="card-text card-text-details">Rok produkcji: 2014</p>
                            <p class="card-text card-text-details">Typ silnika: Diesel</p>
                            <p class="card-text card-text-details">Moc: 120 KM</p>
                            <p class="card-text card-text-details">Pojemność silnika: 1.5 L</p>
                            <p class="card-text card-text-details">Średnie spalanie: 4,0 l/100km</p>
                            <p class="card-text card-text-details">Skrzynia biegów: Manualna 6 biegowa</p>
                            <p class="card-text card-text-details">Ilość miejsc: 5</p>
                            <p class="card-text card-text-details">Pojemność bagażnika: 383 l</p>
                            <p class="card-text card-text-details">Zasięg na pełnym baku: 1520km</p>
                            <p class="card-text card-text-details">Średni koszt wynajmu: 160zł/dzień</p>

                            <div class="btn-group-card mt-4">
                                <a href="/oferty.php" class="btn btn-outline-danger btn-sm">Wróć do ofert</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4 mt-lg-4">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Lokalizacja:</h4>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <label class="input-group-text input-group-lokalizacja"
                                        for="inputGroupSelect01">Odbiór:</label>
                                </div>
                                <input class="form-control" type="text" placeholder="Opole, ul. Prószkowska" readonly>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text input-group-lokalizacja"
                                        for="inputGroupSelect01">Zwrot:</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Wybierz punkt wypożyczalni...</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <h4 class="card-title mt-3 mb-2">Data:</h4>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <label class="input-group-text input-group-data"
                                        for="inputGroupSelect01">Od:</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Dzień</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Miesiąc</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Rok</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text input-group-data"
                                        for="inputGroupSelect01">Do:</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Dzień</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Miesiąc</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <select class="custom-select" id="inputGroupSelect01">
                                    <option selected>Rok</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <h4 class="card-title mt-3 mb-2">Podsumowanie:</h4>
                            <form class="form-inline align-items-baseline">
                                <div class="form-group">
                                    <label>Rabat:</label>
                                </div>
                                <div class="form-group d-flex flex-column">
                                    <input type="text" class="form-control form-control-sm mx-3">
                                    <small class="text-muted text-center">
                                        Wprowadź kod rabatowy.
                                    </small>
                                </div>
                                <div class="form-group mx-1">
                                    <button type="submit" class="btn btn-primary btn-sm mb-2">Akceptuj</button>
                                </div>
                            </form>
                            <div class="border-bottom mt-3 mb-3"></div>
                            <h4 class="card-title mt-3 mb-2 text-center">Zsumowana kwota: <span
                                    class="badge badge-danger text-wrap">160zł</span></h4>
                            <div class="mt-3 d-flex flex-column">
                                <a href="#" class="btn btn-success">Rezerwuj</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php';?>
</body>

</html>