<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Car4You - Dodawanie samochodów</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/jpg" href="../favicon.png"/>

    <link rel="stylesheet" type="text/css" href="../css/logowanie.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Nunito|Quicksand&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
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
        <div class="fixed-top justify-content-center d-flex">
            <div class="alert ml-5 mr-5 mt-3 text-center" style="width:40%"></div>
        </div>
        <div class="row" style="height: 100%;">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="zmianahasla.php">
                                <i class="fas fa-key"></i>
                                <span data-feather="home"></span>
                                Zmiana hasła <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="zmianadanychosobowych.php">
                                <i class="fas fa-users-cog"></i>
                                <span data-feather=""></span>Zmiana danych osobowych</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="zmianamaila.php">
                                <i class="fas fa-envelope"></i>
                                <span data-feather=""></span>Zmiana maila</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="dodawaniesamochodow.php">
                                <i class="fas fa-car"></i>
                                <span data-feather=""></span>Dodawanie samochodów</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="statussamochodow.php">
                                <i class="fas fa-car-side"></i>
                                <span data-feather=""></span>Status samochodów</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="col-md-9 ml-sm-auto col-lg-10 p-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Panel klienta</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dodawanie samochodów</li>
                    </ol>
                </nav>
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom px-4">
                    <h1 class="h2">Dodawanie samochodów</h1>
                </div>
                <form class="addCarForm mt-3 px-4" id="addCarForm" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="producent">Producent</label>
                            <input id="producent" class="form-control" name="producent" placeholder="np. Audi">
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
                            <input id="kolor" class="form-control" type="input" name="kolor" placeholder="np. Czerwony">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="rok_produkcji">Rok produkcji</label>
                            <input id="rok_produkcji" class="form-control" type="number" min="1960" max="2020" step="1"
                                name="rok_produkcji" placeholder="np. 1995">
                            <div class="komunikat"> </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="opis">Opis</label>
                        <textarea class="form-control" rows="4" id="opis" type="input" name="opis"
                            placeholder="Wprowadź opis samochodu"></textarea>
                        <div class="komunikat"> </div>
                    </div>
                    <div class="form-group">
                        <label for="cena">Cena wypożyczenia(zł/24h)</label>
                        <input id="cena" class="form-control" type="input" name="cena" placeholder="np. 200">
                        <div class="komunikat"> </div>
                    </div>
                    <div class="alert alert-warning" role="alert">
                        Ze względów bezpieczeństwa oraz kwestii ubezpieczeń – prosimy o dodanie numeru VIN oraz numeru
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


    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////// -->
    <div class="modal fade" id="deleteCarModal" tabindex="-1" role="dialog" aria-labelledby="deleteCarLabe;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteCarLabel">Usuwanie Konta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Czy napewno chcesz usunąć samochód?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Wracam</button>
                    <button type="button" id="deleteCarButton" name="deleteCarButton" value=""
                        class="btn btn-danger">Usuwam</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editCarModal" tabindex="-1" role="dialog" aria-labelledby="editCarLabe;"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCarLabel">Usuwanie Konta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Edycja samochodu
                </div>
                <div class="modal-footer">
                    <form class="editCarForm mt-3" method="POST">
                        <span><b>Edycja samochodu</b></span>
                        <div>
                            <label for="producentEdit">Producent</label>
                            <input id="producentEdit" name="producentEdit" placeholder="np. Audi">
                            <div class="komunikat"> </div>
                        </div>
                        <div>
                            <label for="modelEdit">Model</label>
                            <input id="modelEdit" name="modelEdit" placeholder="np. RS5">
                            <div class="komunikat"> </div>
                        </div>
                        <div>
                            <label for="rok_produkcjiEdit">Rok produkcji</label>
                            <input id="rok_produkcjiEdit" type="number" min="1960" max="2020" step="1"
                                name="rok_produkcjiEdit" placeholder="np. 1995">
                            <div class="komunikat"> </div>
                        </div>
                        <div>
                            <label for="kolorEdit">Kolor</label>
                            <input id="kolorEdit" type="input" name="kolorEdit" placeholder="czerwony">
                            <div class="komunikat"> </div>
                        </div>
                        <div>
                            <label for="opisEdit">Opis</label>
                            <input id="opisEdit" type="input" name="opisEdit" placeholder="czerwony">
                            <div class="komunikat"> </div>
                        </div>
                        <div>
                            <label for="cenaEdit">Cena wypożyczenia (zł/24h)</label>
                            <input id="cenaEdit" type="input" name="cenaEdit" placeholder="np. 200zł">
                            <div class="komunikat"> </div>
                        </div>
                        <div>
                            <div class="komunikat"> </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Wracam</button>
                            <button type="button" id="editCarButton" name="editCarButton" value=""
                                class="btn btn-success">Zatwierdź zmianę</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</body>

</html>