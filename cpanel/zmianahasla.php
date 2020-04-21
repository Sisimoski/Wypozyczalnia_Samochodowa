<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Zmiana hasła</title>
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
                    <?php
                            include("sidebarContent.php");
                        ?>
                </div>
            </nav>
            <!-- Main Dashboard -->
            <div class="col-lg-10 ml-sm-auto col-lg-10">
                <div class="row" style="z-index:2; margin-bottom: 80px;">
                    <nav class="position-fixed breadcrumbStyleFixed" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Panel klienta</a></li>
                            <li class="breadcrumb-item active">Mój profil</li>
                            <li class="breadcrumb-item active" aria-current="page">Zmiana hasła</li>
                        </ol>
                    </nav>
                </div>
                <div class="row px-4">
                    <div class="col">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom px-2">
                            <h1>Zmiana hasła</h1>
                        </div>
                        <form class="changePasswordForm" method="POST">
                            <div class="form-group">
                                <label for="oldPswd">Stare hasło</label>
                                <input id="oldPswd" class="form-control" name="oldPswd" type="password"
                                    placeholder="Wprowadź dotychczasowe hasło">
                                <div class="komunikat"> </div>
                            </div>
                            <div class="form-group">
                                <label for="newPswd">Nowe hasło</label>
                                <input id="newPswd" class="form-control" name="newPswd" type="password"
                                    placeholder="Wprowadź nowe hasło">
                                <div class="komunikat"> </div>
                            </div>
                            <div class="form-group">
                                <label for="newPswd1">Powtórz nowe hasło</label>
                                <input id="newPswd1" class="form-control" name="renewPswd1" type="password"
                                    placeholder="Wprowadź ponownie nowe hasło">
                                <div class="komunikat"> </div>
                            </div>
                            <div>
                                <div class="komunikat"> </div>
                                <button class="btn btn-primary" id="changePassword" name="changePassword"
                                    type="button">Zatwierdź
                                    zmianę</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>