<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Zmiana danych osobowych</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Files -->
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

    <!-- Boxicons -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Nunito|Quicksand&display=swap" rel="stylesheet">

    <!-- Script Sources -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script src="./js/index.js"></script>
    <script src="./js/changeData.js"></script>
    <script src="./js/carManagement.js"></script>
</head>

<body>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <nav class="navbar navbar-expand-md fixed-top navbar-light bg-light">
            <a class="navbar-brand ml-2" href="index.php">
                <img src="../images/Car4You-line-logo.png" height="50" alt="car4you logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-1" id="navbarSupportedContent">
                <!-- <input class="form-control form-control-sm w-100 mx-4" type="text" placeholder="Szukaj" aria-label="Search"> -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item text-nowrap">
                        <a class="nav-link" href="../index.php">Strona główna<span class="sr-only">(current)</span></a>
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
                        
                    }
                        
                }
                if(isset($_SESSION['rodzaj_pracownika'])){                   
                        echo "<button id='panelPracownika' type='submit' class='btn btn-primary'>Panel Pracownika</button>"; 
                }
                echo "<button type='button' id='wyloguj' class='btn btn-outline-danger ml-2'>Wyloguj</button>";
            }
        ?>
            </div>
        </nav>
    </section>
    <div class="container-fluid">
        <div class="fixed-top justify-content-center d-none">
            <div class="alert ml-5 mr-5 mt-3 text-center" style="width:40%"></div>
        </div>
        <div class="row" style="height: 100%;">
            <nav class="col-md-2 d-none d-lg-block bg-light sidebar position-fixed">
                <div class="sidebar-sticky">
                    <ul class="list-group mb-2">
                        <a href="index.php" class="list-group-item list-group-item-action list-group-item-info">
                            <i class='bx bxs-id-card'></i>
                            Panel klienta
                        </a>
                    </ul>
                    <ul class="list-group mb-2">
                        <div>
                            <a data-toggle="collapse" href="#mojprofil"
                                class="list-group-item list-group-item-action list-group-item-primary">
                                <i class='bx bxs-user-detail'></i>
                                Mój profil
                            </a>
                        </div>
                        <div class="collapse" id="mojprofil">
                            <a href="zmianadanychosobowych.php" class="list-group-item list-group-item-action active">Zmiana
                                danych osobowych</a>
                            <a href="zmianahasla.php" class="list-group-item list-group-item-action">Zmiana hasła</a>
                            <a href="zmianamaila.php" class="list-group-item list-group-item-action">Zmiana maila</a>
                        </div>
                    </ul>
                    <ul class="list-group mb-2">
                        <div>
                            <a data-toggle="collapse" href="#samochody"
                                class="list-group-item list-group-item-action list-group-item-primary">
                                <i class='bx bxs-car'></i>
                                Samochody
                            </a>
                        </div>
                        <div class="collapse" id="samochody">
                            <a href="dodawaniesamochodow.php" class="list-group-item list-group-item-action">Dodaj
                                samochód</a>
                            <a href="statussamochodow.php" class="list-group-item list-group-item-action">Status
                                samochodów</a>
                        </div>
                    </ul>
            </nav>

            <!-- Main Dashboard -->
            <div class="col-lg-10 ml-sm-auto col-lg-10">
                <div class="row" style="z-index:2; margin-bottom: 80px;">
                    <nav class="position-fixed breadcrumbStyleFixed" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Panel klienta</a></li>
                            <li class="breadcrumb-item active">Mój profil</li>
                            <li class="breadcrumb-item active" aria-current="page">Zmiana danych osobowych</li>
                        </ol>
                    </nav>
                </div>
                <div class="row px-4">
                    <div class="col">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom px-2">
                            <h1>Zmiana danych osobowych</h1>
                        </div>
                        <div class="row">
                            <div class="col">
                                <form class="ChangePersonalDataForm" method="POST">
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
                                        <button class="btn btn-primary" id="changePersonalData"
                                            name="changePersonalData" type="button">Zatwierdź dane</button>
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