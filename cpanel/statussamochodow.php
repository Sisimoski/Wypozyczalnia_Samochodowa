<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Car4You - Status samochodów</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <script src="./js/changeData.js"></script>
    <script src="./js/carManagement.js"></script>
</head>

<body>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light"
            style="box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">
            <a class="navbar-brand ml-2" href="index.php">
                <img src="../images/Car4You-line-logo.png" height="50" alt="car4you logo">
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
                        echo "<button id='panelKlienta' href='./cpanel/index.php' type='submit' class='btn btn-primary'>Panel Klienta</button>";
                    }
                        
                }
                if(isset($_SESSION['rodzaj_pracownika'])){                   
                        echo "<button id='panelPracownika' type='submit' class='btn btn-primary'>Panel Pracownika</button>"; 
                    if($_SESSION['rodzaj_pracownika'] == 2){
                        echo "<button id='panelAdministratora' type='submit' class='btn btn-primary ml-2'>Panel Administratora</button>";
                    }
                }
                echo "<button type='button' id='wyloguj' class='btn btn-outline-primary ml-2'>Wyloguj</button>";
            }
        ?>
            </div>
        </nav>
    </section>
    <div class="container-fluid">
        <div class="fixed-top justify-content-center d-flex">
            <div class="alert ml-5 mr-5 mt-3 text-center" style="width:40%"></div>
        </div>
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="zmianahasla.php">
                                <i class="fas fa-key"></i>
                                Zmiana hasła
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="zmianadanychosobowych.php">
                                <i class="fas fa-users-cog"></i>Zmiana danych osobowych</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="zmianamaila.php">
                                <i class="fas fa-envelope"></i>Zmiana maila</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dodawaniesamochodow.php">
                                <i class="fas fa-car"></i>Dodawanie samochodów</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="statussamochodow.php">
                                <i class="fas fa-car-side"></i>Status samochodów</a>
                        </li>
                    </ul>
            </nav>
            <div class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Panel klienta</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Status samochodów</li>
                    </ol>
                </nav>
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Status samochodów</h1>
                </div>
                <div class="LoadCarTableHead">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nazwa</th>
                                <th scope="col">Nr tablicy</th>
                                <th scope="col">Status</th>
                                <th scope="col">Funkcje</th>
                            </tr>
                        </thead>
                        <tbody id="LoadCarTable">

                        </tbody>
                    </table>
                    <div id="alert"></div>
                </div>

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