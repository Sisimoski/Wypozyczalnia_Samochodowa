<!-- Index file for Client pannel 
W divach "komunikat" musi być miejsce na wyświetlanie tekstu do walidacji jak w rejestracji.
W spanach są umieszczone nazwy zakładek do menu z lewej strony.
Opis samochodu fajnie żeby miał większe okno.
Przy VIN i NR tablicy można by było zrobić dymek z informacja dalczego o to pytamy(dla bezpeiczensta,ubezpeiczenai itd.)
Przejście do edycji samochodu ma być w statusie nie róbcie go w menu(tylko front niego).
-->
<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Car4You - Panel klienta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/dashboardstyles.css">

    <!-- Deafult Bootstrap theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Flatly Bootstrap theme -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/flatly/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-yrfSO0DBjS56u5M+SjWTyAHujrkiYVtRYh2dtB3yLQtUz3bodOeialO59u5lUCFF" crossorigin="anonymous"> -->
    <!-- Darkly Bootstrap theme -->
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/darkly/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rCA2D+D9QXuP2TomtQwd+uP50EHjpafN+wruul0sXZzX/Da7Txn4tB9aLMZV4DZm" crossorigin="anonymous"> -->

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
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light"
            style="box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">
            <a class="navbar-brand ml-2" href="index.php">
                <img src="../images/Car4You-line-logo.png" height="50" alt="car4you logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-1" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Strona główna<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../oferty.php">Oferty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../aboutus.php">O nas</a>
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
        <div class="row" style="height: 100%;">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
                                <i class="nc-icon nc-app"></i>
                                <p>
                                    Collapse Menu
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="collapse " id="componentsExamples">
                                <ul class="nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="./components/buttons.html">
                                            <span class="sidebar-normal">Menu Default 1</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="./components/grid.html">
                                            <span class="sidebar-normal">Menu Default 2</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="./components/panels.html">
                                            <span class="sidebar-normal">Menu Default 3</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="./components/sweet-alert.html">
                                            <span class="sidebar-normal">Menu Default 4</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="./components/notifications.html">
                                            <span class="sidebar-normal">Menu Default 5</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="./components/icons.html">
                                            <span class="sidebar-normal">Menu Default 6</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="./components/typography.html">
                                            <span class="sidebar-normal">Menu Default 7</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
            </nav>
            <div class="col-md-9 ml-sm-auto col-lg-10 px-0">
                <div class="row">
                    <div class="col">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active"><a href="index.php">Panel klienta</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row px-4 mb-2">
                    <div class="col">
                        <input class="form-control form-control-sm w-100" type="text" placeholder="Szukaj"
                            aria-label="Search">
                    </div>
                </div>
                <div class="row px-4">
                    <div class="col">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom px-2">
                            <h1>Panel klienta</h1>
                        </div>
                        <div class="card border-primary">
                            <div class="card-header">
                                Powiadomienie
                            </div>
                            <div class="card-body text-primary">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            <div class="card-footer text-muted">
                                2 days ago
                            </div>
                        </div>
                        <div class="pt-2 pb-2 mb-3 border-bottom"></div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card">
                                    <img src="#" class="card-img-top" alt="Punkty klienta pic">
                                    <div class="card-body">
                                        <h5 class="card-title">Twoje punkty</h5>
                                        <p class="card-text">SPEECH 100</p>
                                        <a href="#" class="btn btn-primary">Sprawdź</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card">
                                    <img src="#" class="card-img-top" alt="Punkty klienta pic">
                                    <div class="card-body">
                                        <h5 class="card-title">Twoje samochody</h5>
                                        <p class="card-text">SAMOCHODY 100</p>
                                        <a href="#" class="btn btn-primary">Sprawdź</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card">
                                    <img src="#" class="card-img-top" alt="Punkty klienta pic">
                                    <div class="card-body">
                                        <h5 class="card-title">Twoje placeholder</h5>
                                        <p class="card-text">Ilość: 100</p>
                                        <a href="#" class="btn btn-primary">Sprawdź</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="card">
                                    <img src="#" class="card-img-top" alt="Punkty klienta pic">
                                    <div class="card-body">
                                        <h5 class="card-title">Twoje placeholder</h5>
                                        <p class="card-text">Ilość: 100</p>
                                        <a href="#" class="btn btn-primary">Sprawdź</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Special title treatment</h5>
                                        <p class="card-text">With supporting text below as a natural lead-in to
                                            additional
                                            content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>