<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Oferty</title>
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
                <img src="images/Car4You-line-logo.png" height="50" alt="car4you logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-1" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Strona główna<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
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
    <section id="herous" class="text-light">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-12 pt-lg-0 order-2 order-lg-1">
                    <h1>Oferty</h1>
                    <h2>Wybierz samochód z dostępnej oferty.</h2>
                </div>
            </div>
        </div>
    </section>

    <section id="car-catalog" class="car-catalog car-catalog-bg text-dark">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">

                    <!-- Filter Panel -->
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs" id="carFilterCard" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#nav-basic" id="tab-basic"
                                        data-toggle="tab">Podstawowe dane</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#nav-specs" id="tab-specs"
                                        data-toggle="tab">Specyfikacje</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="tabContent">
                                <div class="tab-pane fade show active" id="nav-basic" role="tabpanel">
                                    <form>
                                        <div class="form-group">
                                            <label for="producentFilter">Producent:</label>
                                            <select class="form-control" id="producentFilter">
                                                <option>Volkswagen</option>
                                                <option>Ford</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="modelFilter">Model:</label>
                                            <select class="form-control" id="modelFilter">
                                                <option>Mondeo</option>
                                                <option>Golf</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="productionYearFilter">Rok produkcji od:</label>
                                            <select class="form-control" id="productionYearFilter">
                                                <option>2020</option>
                                                <option>2019</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Zastosuj</button>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="nav-specs" role="tabpanel">
                                    <form>
                                        <div class="form-group">
                                            <label for="#">Ocena klientów:</label>
                                            <select class="form-control" id="#">
                                                <option>1</option>
                                                <option>2</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Segment:</label>
                                            <select class="form-control" id="#">
                                                <option>1</option>
                                                <option>2</option>
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="#">Typ silnika:</label>
                                                <select class="form-control" id="#">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="#">Moc:</label>
                                                <select class="form-control" id="#">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="#">Pojemność silnika:</label>
                                                <select class="form-control" id="#">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <label for="#">Skrzynia biegów:</label>
                                            <select class="form-control" id="#">
                                                <option>1</option>
                                                <option>2</option>
                                            </select>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="#">Ilość miejsc:</label>
                                                <select class="form-control" id="#">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="#">Pojemność bagażnika:</label>
                                                <select class="form-control" id="#">
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Średnie spalanie:</label>
                                            <select class="form-control" id="#">
                                                <option>1</option>
                                                <option>2</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Zasięg na pełnym baku:</label>
                                            <select class="form-control" id="#">
                                                <option>1</option>
                                                <option>2</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="#">Średni koszt wynajmu:</label>
                                            <select class="form-control" id="#">
                                                <option>1</option>
                                                <option>2</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Zastosuj</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Oferty Cards -->
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 justify-content-center">
                <div class="col mb-4">
                    <div class="card bg-light text-center h-100">
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
                </div>
                <div class="col mb-4">
                    <div class="card bg-light text-center h-100">
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
                </div>
                <div class="col mb-4">
                    <div class="card bg-light text-center h-100 justify-content-between">
                        <img src="images/samochody/mercedes_cw205.png" class="card-img-top" alt="mercedes_cw205">
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
                <div class="col mb-4">
                    <div class="card bg-light text-center h-100">
                        <img src="images/samochody/renault-trafic.png" class="card-img-top" alt="renault-trafic">
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
                </div>
                <div class="col mb-4">
                    <div class="card bg-light text-center h-100">
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
                </div>
                <div class="col mb-4">
                    <div class="card bg-light text-center h-100">
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
                <div class="col mb-4">
                    <div class="card bg-light text-center h-100">
                        <img src="images/samochody/skoda_superb.png" class="card-img-top" alt="Skoda Superb">
                        <div class="card-body card-body-flex">
                            <h5 class="card-title">Skoda Superb</h5>
                            <h6 class="card-subtitle mb-2 text-muted">220zł/dzień</h6>
                            <div class="text-left">
                            <p class="card-text">
                            <h6><b>Klasa: B</b></h6>
                            Rok produkcji: 2015r<br>
                            Silnik: 1.4L 125KM benzyna<br>
                            Skrzynia biegów: Manualna
                            </p>
                           </div>
                            <a href="#" class="btn btn-primary">Wypożycz</a>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card bg-light text-center h-100">
                        <img src="images/samochody/vw golf.png" class="card-img-top" alt="VW Golf">
                        <div class="card-body card-body-flex">
                            <h5 class="card-title">Volkswagen Golf</h5>
                            <h6 class="card-subtitle mb-2 text-muted">120zł/dzień</h6>
                            <div class="text-left">
                            <p class="card-text">
                            <h6><b>Klasa: B</b></h6>
                            Rok produkcji: 2010r<br>
                            Silnik: 1.2L 105KM benzyna<br>
                            Skrzynia biegów: Manualna
                            </p>
                            </div>
                            <a href="#" class="btn btn-primary">Wypożycz</a>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card bg-light text-center h-100">
                        <img src="images/samochody/vw_arteon.jpg" class="card-img-top" alt="VW Arteon">
                        <div class="card-body card-body-flex">
                            <h5 class="card-title">Volkswagen Areton</h5>
                            <h6 class="card-subtitle mb-2 text-muted">250zł/dzień</h6>
                            <div class="text-left">
                            <p class="card-text">
                            <h6><b>Klasa: B+</b></h6>
                            Rok produkcji: 2017r<br>
                            Silnik: 2.0L 150KM benzyna<br>
                            Skrzynia biegów: Manualna
                            </p>
                            </div>
                            <a href="#" class="btn btn-primary">Wypożycz</a>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card bg-light text-center h-100">
                        <img src="images/samochody/vw_passat.png" class="card-img-top" alt="VW Passat">
                        <div class="card-body card-body-flex">
                            <h5 class="card-title">Volkswagen Passat</h5>
                            <h6 class="card-subtitle mb-2 text-muted">100zł/dzień</h6>
                            <div class="text-left">
                            <p class="card-text">
                            <h6><b>Klasa: B</b></h6>
                            Rok produkcji: 2010r<br>
                            Silnik: 2.0L 140KM benzyna<br>
                            Skrzynia biegów: Manualna
                            </p>
                            </div>
                            <a href="#" class="btn btn-primary">Wypożycz</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="row justify-content-center">
                <div class="col d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><img src="images/samochody/Ford_mondeo.png" class="img-fluid" alt="Ford Mondeo"></div>
                        <div class="mt-auto">
                            <h5 class="title">Ford Mondeo</h5>
                            <h6 class="mb-2 text-muted">95zł</h6>
                            <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><img src="images/samochody/hyundai i10.png" class="img-fluid"
                                alt="Ford Mondeo"></div>
                                <div class="mt-auto">
                                    <h3 class="title">Ford Mondeo</h4>
                                        <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias
                                            excepturi sint occaecati cupiditate</p>

                                </div>
                    </div>
                </div>
                
            </div> -->
        </div>
    </section>

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php';?>


</body>

</html>