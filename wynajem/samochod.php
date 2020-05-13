<?php
session_start();
    if(isset($_GET["idCar"])){
        if($_GET["idCar"] == ''){
            header("Location: /wynajem/samochodTemplate.php");
        }
        else{
            require $_SERVER['DOCUMENT_ROOT'] . '/php/config.php'; 
            $sth = $db->prepare("SELECT ulica, vin, samochod.id_specyfikacja_samochodu, numer_tablicy_rejestracyjnej, producent, model, rok, kolor, opis, cena_netto, procent_vat_ceny, cena_brutto, czy_posiadany, segment, typ_silnika, moc, pojemnosc_silnika, srednie_spalenie, skrzynia_biegow, ilosc_miejsc, pojemnosc_bagaznika, zasieg, fotografia
            FROM specyfikacja_samochodu
            INNER JOIN samochod ON samochod.id_specyfikacja_samochodu = specyfikacja_samochodu.id_specyfikacja_samochodu
            INNER JOIN uzytkownik ON uzytkownik.id_uzytkownik = samochod.id_uzytkownik
            INNER JOIN adres ON adres.id_adres = uzytkownik.id_adres     
            WHERE specyfikacja_samochodu.id_specyfikacja_samochodu = :id");
            $sth ->bindValue(":id", $_GET["idCar"],PDO::PARAM_INT);
            $sth ->execute();
            if($sth ->rowCount() != 0){   
                $response = $sth->fetchAll();
                $data = json_encode($response);
            }
            else{
                header("Location: /wynajem/samochodTemplate.php");
            }
            
        }
    }else{
        header("Location: /wynajem/samochodTemplate.php");
    }
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Samochód</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.php';?>
    <link href="css/jquery.datetimepicker.min.css" rel="stylesheet" />
    <script src="/js/newsletter.js"></script>
    <script src="js/car.js"></script>
    <script src="js/jquery.datetimepicker.full.min.js"></script>
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
            echo "<button id='zaloguj' type='submit' href='/logowanie.php' class='btn btn-outline-primary'>Zaloguj się</button>";
            echo "<button id='zarejestruj' type='submit' href='/register.php' class='btn btn-primary ml-2'>Zarejestruj się</button>" ;
            }
            else{
                if(isset($_SESSION['rodzaj_konta'])){
                    if($_SESSION['rodzaj_konta'] == 1 || $_SESSION['rodzaj_konta'] == 2){
                        echo "<button id='panelKlienta' href='/cpanel/index.php' type='submit' class='btn btn-primary'>Panel Klienta</button>";
                    }
                    if($_SESSION['rodzaj_konta'] == 3 || $_SESSION['rodzaj_konta'] == 4){
                        echo "<button id='panelKlienta' href='/cpanel/index.php' type='submit' class='btn btn-primary'>Panel Pracownika</button>";
                    }
                        
                }
                echo "<button type='button' id='wyloguj' class='btn btn-outline-primary ml-2'>Wyloguj</button>";
            }
        ?>
            </div>
        </nav>
    </section>

    <!-- Sekcja Modal -->
    <div class="modal fade" id="rezerwacjaModal" tabindex="-1" role="dialog" aria-labelledby="rezerwacjaLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rezerwacjaLabel">Potwierdź rezerwację pojazdu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <?php
                        if(!isset($_SESSION["id"])) { ?>
                    Zaloguj/Zarejestruj Się aby zarezerwować pojazd.

                    <?php }else{ ?>
                    <div>
                        <h5 class="mt-3 mb-2">Data:</h5>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <label class="input-group-text input-group-data" for="inputGroupSelect01">Od:</label>
                            </div>
                            <input type="text" class="form-control" name="DataOd" readonly>
                            <div class="input-group-prepend ml-2">
                                <label class="input-group-text input-group-data" for="inputGroupSelect01">Do:</label>
                            </div>
                            <input type="text" class="form-control" name="DataDo" readonly>
                        </div>
                        <div class="border-bottom mt-3 mb-3"></div>
                        <h5 class="mt-3 mb-2 text-center">Zsumowana kwota: <span
                                class="badge badge-danger text-wrap total-cost"></span></h5>

                    </div>

                    <?php }; ?>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Anuluj</button>
                    <?php
                            if(isset($_SESSION["id"])) {
                                echo '<button type="button" class="btn btn-success rentCarButton">Potwierdzam i rezerwuję</button>';
                            }
                        ?>
                </div>

            </div>
        </div>
    </div>
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
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" id="fotografia" src="" alt="First slide">
                            </div>
                        </div>           
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title producent-model">Ford Mondeo</h3>
                            <h5 class="card-subtitle mb-2 text-muted koszt-dzienny">160zł/dzień</h5>
                            <p class="card-text card-text-details segment-auta">Segment: klasa średnia</p>
                            <p class="card-text card-text-details rok-auta">Rok produkcji: 2014</p>
                            <p class="card-text card-text-details typ-silnika">Typ silnika: Diesel</p>
                            <p class="card-text card-text-details moc-auta">Moc: 120 KM</p>
                            <p class="card-text card-text-details pojemnosc-auta">Pojemność silnika: 1.5 L</p>
                            <p class="card-text card-text-details srednie-spalanie">Średnie spalanie: 4,0 l/100km</p>
                            <p class="card-text card-text-details skrzynia-biegow">Skrzynia biegów: Manualna 6 biegowa
                            </p>
                            <p class="card-text card-text-details ilosc-miejsc">Ilość miejsc: 5</p>
                            <p class="card-text card-text-details pojemnosc-bagaznika">Pojemność bagażnika: 383 l</p>
                            <p class="card-text card-text-details zasieg-auta">Zasięg na pełnym baku: 1520km</p>
                            <p class="card-text card-text-details sredni-koszt">Średni koszt wynajmu: 160zł/dzień</p>

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
                                <input class="form-control ulica" type="text" placeholder="Opole, ul. Prószkowska" readonly>
                            </div>
                            <h4 class="card-title mt-3 mb-2">Data:</h4>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <label class="input-group-text input-group-data"
                                        for="inputGroupSelect01">Od:</label>
                                </div>
                                <input autocomplete="off" type="text" id="picker" class="form-control">
                                <div class="input-group-prepend">
                                    <label class="input-group-text input-group-data"
                                        for="inputGroupSelect01">Do:</label>
                                </div>
                                <input autocomplete="off" type="text" id="picker2" class="form-control">
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
                                    class="badge badge-danger text-wrap total-cost">160zł</span></h4>
                            <div class="mt-3 d-flex flex-column">

                                <a href="" class="btn btn-success rezerwacja" data-toggle='modal'
                                    data-target='#rezerwacjaModal'>Rezerwuj</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <?php 
        require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php';
        
        echo "<script>loadCar(".$data.");</script>";
        echo "<script>const data = saveData(".$data.");</script>";
    ?>

</body>

</html>