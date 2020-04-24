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

    <link rel="shortcut icon" type="image/jpg" href="../favicon.png" />

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
                                        <div class="form-group col-md-2">
                                            <label for="rok_produkcji">Rok produkcji</label>
                                            <input id="rok_produkcji" class="form-control" type="number" min="1960"
                                                max="2020" step="1" name="rok_produkcji" placeholder="np. 1995">
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