<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Car4You - Zmiana danych osobowych</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/dashboardstyles.css">

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
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light"
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
                                    Components
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="collapse " id="componentsExamples">
                                <ul class="nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="./components/buttons.html">
                                            <span class="sidebar-mini">B</span>
                                            <span class="sidebar-normal">Buttons</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="./components/grid.html">
                                            <span class="sidebar-mini">GS</span>
                                            <span class="sidebar-normal">Grid System</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="./components/panels.html">
                                            <span class="sidebar-mini">P</span>
                                            <span class="sidebar-normal">Panels</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="./components/sweet-alert.html">
                                            <span class="sidebar-mini">SA</span>
                                            <span class="sidebar-normal">Sweet Alert</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="./components/notifications.html">
                                            <span class="sidebar-mini">N</span>
                                            <span class="sidebar-normal">Notifications</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="./components/icons.html">
                                            <span class="sidebar-mini">I</span>
                                            <span class="sidebar-normal">Icons</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="./components/typography.html">
                                            <span class="sidebar-mini">T</span>
                                            <span class="sidebar-normal">Typography</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="zmianahasla.php">
                                <i class="fas fa-key"></i>
                                <span data-feather="home"></span>
                                Zmiana hasła <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="zmianadanychosobowych.php">
                                <i class="fas fa-users-cog"></i>
                                <span data-feather=""></span>Zmiana danych osobowych</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="zmianamaila.php">
                                <i class="fas fa-envelope"></i>
                                <span data-feather=""></span>Zmiana maila</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dodawaniesamochodow.php">
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
            <div class="col-md-9 ml-sm-auto col-lg-10 px-0">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Panel klienta</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Zmiana danych osobowych</li>
                    </ol>
                </nav>
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom px-4">
                    <h1 class="h2">Zmiana danych osobowych</h1>
                </div>
                <form class="ChangePersonalDataForm mt-3 px-4" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="imie">Imie</label>
                            <input id="imie" class="form-control" name="imie">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nazwisko">Nazwisko</label>
                            <input id="nazwisko" class="form-control" name="nazwisko">
                            <div class="komunikat"> </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="ulica">Ulica</label>
                            <input id="ulica" class="form-control" name="ulica">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="nr_domu">Nr domu</label>
                            <input id="nr_domu" class="form-control" name="nr_domu">
                            <div class="komunikat"> </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="miejscowosc">Miejsowość</label>
                            <input id="miejscowosc" class="form-control" name="miejscowosc">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="wojewodztwo">Województwo</label>
                            <select id="wojewodztwo" class="form-control" name="wojewodztwo">
                                <option value="dolnośląskie">dolnośląskie</option>
                                <option value="kujawsko-pomorskie">kujawsko-pomorskie</option>
                                <option value="lubelskie">lubelskie</option>
                                <option value="lubuskie">lubuskie</option>
                                <option value="łódzkie">łódzkie</option>
                                <option value="małopolskie">małopolskie</option>
                                <option value="mazowieckie">mazowieckie</option>
                                <option value="opolskie">opolskie</option>
                                <option value="podkarpackie">podkarpackie</option>
                                <option value="podlaskie">podlaskie</option>
                                <option value="pomorskie">pomorskie</option>
                                <option value="śląskie">śląskie</option>
                                <option value="świętokrzyskie">świętokrzyskie</option>
                                <option value="warmińsko-mazurskie">warmińsko-mazurskie</option>
                                <option value="wielkopolskie">wielkopolskie</option>
                                <option value="zachodniopomorskie">zachodniopomorskie</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="kod_pocztowy">Kod pocztowy</label>
                            <input id="kod_pocztowy" class="form-control" name="kod_pocztowy">
                            <div class="komunikat"> </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nr_kom">Nr kom.</label>
                            <input id="nr_kom" class="form-control" name="nr_kom">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="nr_tel">Nr tel.</label>
                            <input id="nr_tel" class="form-control" name="nr_tel">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fax">Fax</label>
                            <input id="fax" class="form-control" name="fax">
                            <div class="komunikat"> </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dodatkowe_informacje">Dodatkowe informacje</label>
                        <textarea id="dodatkowe_informacje" class="form-control" rows="4"
                            name="dodatkowe_informacje"></textarea>
                        <div class="komunikat"> </div>
                    </div>
                    <div class="form-group">
                        <label for="www">Strona internetowa</label>
                        <input id="www" class="form-control" name="www">
                        <div class="komunikat"> </div>
                    </div>
                    <h5><label>Dane firmowe:</label></h5>
                    <div class="form-group">
                        <label for="nazwa_firmy" id="nazwa_firmy_label">Nazwa firmy</label>
                        <input id="nazwa_firmy" class="form-control" name="nazwa_firmy">
                        <div class="komunikat"> </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="regon" id="regon_label">Regon</label>
                            <input id="regon" class="form-control" name="regon">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nip" id="nip_label">Nip</label>
                            <input id="nip" class="form-control" name="nip">
                            <div class="komunikat"> </div>
                        </div>
                    </div>
                    <div>
                        <div class="komunikat"> </div>
                        <button class="btn btn-primary" id="changePersonalData" name="changePersonalData"
                            type="button">Zatwierdź dane</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
</html>