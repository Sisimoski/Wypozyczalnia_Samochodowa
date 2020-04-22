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
    <title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/jpg" href="../favicon.png"/>

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
    <script src="js/collapse.js"></script>
    <script src="/cpanel/js/logout.js"></script>
    <script src="./js/changeData.js"></script>
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
        <div class="row">
            <nav class="col-md-2 d-none d-lg-block bg-light sidebar position-fixed">
                <div class="sidebar-sticky">

                  <!-- Sidebar -->
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
                            <li class="breadcrumb-item active"><a href="index.php">Panel klienta</a></li>
                        </ol>
                    </nav>
                </div>
                <!-- <div class="row px-4 mb-2">
                    <div class="col">
                        <input class="form-control form-control-sm w-100" type="text" placeholder="Szukaj"
                            aria-label="Search">
                    </div>
                </div> -->
                <div class="row px-4">
                    <div class="col">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom px-2">
                            <h1>
                                <?php
                                    echo 'Witaj, '.$_SESSION["imie"]. ' '.$_SESSION["nazwisko"];
                                ?>
                            </h1>
                        </div>
                        <div class="card border-primary">
                            <div class="card-header">
                                Sprawdź to!
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Odbierz nagrodę</h5>
                                <p class="card-text">Dzięki Twojemu wkładowi w rozwój wypożyczalni, możesz już teraz
                                    odebrać nagrodę za lojalność.</p>
                                <a href="#" class="btn btn-primary">Odbierz nagrodę</a>
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