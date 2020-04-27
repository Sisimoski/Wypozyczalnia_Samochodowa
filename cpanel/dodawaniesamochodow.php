<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Dodawanie samochodów</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/include/include.php';?>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="js/collapse.js"></script>
    <script src="/cpanel/js/logout.js"></script>
    <script src="./js/carManagement.js"></script>
</head>

<body>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <?php
            include("headerContent.php");
        ?>
    </section>
    <div class="container-fluid">
        <div class="fixed-top justify-content-center d-none">
            <div class="alert ml-5 mr-5 mt-3 text-center" style="width:40%"></div>
        </div>
        <div class="row" style="height: 100%;">
            <nav class="col-md-2 d-none d-lg-block bg-light sidebar position-fixed">
                <div class="sidebar-sticky">
                    <?php
                            include("sidebarContent.php");
                        ?>
                </div>
            </nav>
            <div class="col-lg-10 ml-sm-auto col-lg-10">
                <div class="row" style="z-index:2; margin-bottom: 80px;">
                    <nav class="position-fixed breadcrumbStyleFixed" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Panel klienta</a></li>
                            <li class="breadcrumb-item active">Samochody</li>
                            <li class="breadcrumb-item active" aria-current="page">Dodaj samochód</li>
                        </ol>
                    </nav>
                </div>
                <div class="row px-4 pb-3">
                    <div class="col">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2
                            mb-3 border-bottom px-2">
                            <h1>Dodawanie samochodów</h1>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form class="addCarForm" id="addCarForm" method="POST" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="producent">Producent</label>
                                            <input id="producent" class="form-control" name="producent"
                                                placeholder="np. Audi">
                                            <div class="komunikat"> </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="model">Model</label>
                                            <input id="model" class="form-control" name="model" placeholder="np. RS5">
                                            <div class="komunikat"> </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-10">
                                            <label for="kolor">Kolor</label>
                                            <input id="kolor" class="form-control" type="input" name="kolor"
                                                placeholder="np. Czerwony">
                                            <div class="komunikat"> </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="rok_produkcji">Rok produkcji</label>
                                            <input id="rok_produkcji" class="form-control" type="number" min="1960"
                                                max="2020" step="1" name="rok_produkcji" placeholder="np. 1995">
                                            <div class="komunikat"> </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                            <label for="segment">Segment</label>
                                            <input id="segment" class="form-control" type="input" 
                                                name="segment" placeholder="A">
                                            <div class="komunikat"> </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="typ_silnika">Typ silnika</label>
                                            <input id="typ_silnika" class="form-control" type="input" name="typ_silnika" placeholder="Diesel">
                                            <div class="komunikat"> </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="moc">Moc</label>
                                            <input id="moc" class="form-control" type="input" name="moc" placeholder="150">
                                            <div class="komunikat"> </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="pojemnosc_silnika">Pojemność silnika</label>
                                            <input id="pojemnosc_silnika" class="form-control" type="input" name="pojemnosc_silnika" placeholder="2.0">
                                            <div class="komunikat"> </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="srednie_spalanie">Średnie spalanie L/100km</label>
                                            <input id="srednie_spalanie" class="form-control" type="input" name="srednie_spalanie" placeholder="6">
                                            <div class="komunikat"> </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="skyrzynia_biegow">Skrzynia biegów</label>
                                            <input id="skyrzynia_biegow" class="form-control" type="input" name="skrzynia_biegow" placeholder="manualna">
                                            <div class="komunikat"> </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="ilosc_miejsc">Ilość miejsc</label>
                                            <input id="ilosc_miejsc" class="form-control" type="input" name="ilosc_miejsc" placeholder="5">
                                            <div class="komunikat"> </div>
                                        </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="pojemnosc_bagaznika">Pojemność bagażnika</label>
                                            <input id="pojemnosc_bagaznika" class="form-control" type="input" name="pojemnosc_bagaznika" placeholder="1200l">
                                            <div class="komunikat"> </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="zasieg">Zasięg</label>
                                            <input id="zasieg" class="form-control" type="input" name="zasieg" placeholder="5">
                                            <div class="komunikat"> </div>
                                        </div>
                                    <div class="form-group">
                                        <label for="opis">Opis</label>
                                        <textarea class="form-control" rows="4" id="opis" type="input" name="opis"
                                            placeholder="Wprowadź opis samochodu"></textarea>
                                        <div class="komunikat"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cena">Cena wypożyczenia(zł/24h)</label>
                                        <input id="cena" class="form-control" type="input" name="cena"
                                            placeholder="np. 200">
                                        <div class="komunikat"> </div>
                                    </div>
                                    <div class="alert alert-warning" role="alert">
                                        Ze względów bezpieczeństwa oraz kwestii ubezpieczeń – prosimy o dodanie numeru
                                        VIN oraz numeru
                                        tablicy rejestracyjnej.
                                    </div>
                                    <div class="form-group">
                                        <label for="">VIN</label>
                                        <input id="vin" class="form-control" type="input" name="vin">
                                        <div class="komunikat"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nr tablicy rejestracyjnej</label>
                                        <input id="nr_tablicy" class="form-control" type="input" name="nr_tablicy"
                                            placeholder="OK 99999">
                                        <div class="komunikat"> </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="zdjecie">Dodaj zdjęcie</label>
                                        <div class="custom-file">
                                            <label class="custom-file-label" for="zdjecie">Wybierz plik:</label>
                                            <input id="zdjecie" class="custom-file-input" type="file" name="zdjecie">
                                            <div class="komunikat"> </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn btn-primary" type="submit">Dodaj samochód</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>