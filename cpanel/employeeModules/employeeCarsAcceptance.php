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

    <link rel="shortcut icon" type="image/jpg" href="../../favicon.png" />

    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="../css/dashboardstyles.css">

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
    <script src="../js/index.js"></script>
    <script src="../js/collapse.js"></script>
    <script src="/cpanel/js/logout.js"></script>
    <script src="js/employeeModules.js"></script>
</head>

<body>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <?php
            include("../headerContent.php");
        ?>
    </section>
    <div class="container-fluid">
        <!-- Alert -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/alert.php';?>
        <div class="row">
            <nav class="col-md-2 d-none d-lg-block bg-light sidebar position-fixed">
                <div class="sidebar-sticky">

                    <!-- Sidebar -->
                    <?php
                        include("../sidebarContent.php");
                    ?>

                </div>
            </nav>
            <!-- Main Dashboard -->
            <div class="col-lg-10 ml-sm-auto col-lg-10">
                <div class="row" style="z-index:2; margin-bottom: 80px;">
                    <nav class="position-fixed breadcrumbStyleFixed" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="index.php">Panel pracownika</a></li>
                            <li class="breadcrumb-item active">Pojazdy</li>
                            <li class="breadcrumb-item active" aria-current="page">Akceptacje pojazdów</li>
                        </ol>
                    </nav>
                </div>
                <!-- <div class="row px-4 mb-2">
                    <div class="col">
                        <input class="form-control form-control-sm w-100" type="text" placeholder="Szukaj"
                            aria-label="Search">
                    </div>
                </div> -->
                <div class="row px-4 pb-3">
                    <div class="col">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2
                            mb-3 border-bottom px-2">
                            <h1>Akceptacje pojazdów</h1>
                        </div>
                        <div class="acceptContent table-responsive">
                            <h3>Pojazdy do zaakceptowania przez pracowników:</h3>
                            <table class="table table-striped table-hover text-center align-items-center border">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Imie</th>
                                        <th scope="col">Nazwisko</th>
                                        <th scope="col">Miejscowosc</th>
                                        <th scope="col">Ulica</th>
                                        <th scope="col">Pojazd</th>
                                        <th scope="col">Funkcje</th>
                                    </tr>
                                </thead>
                                <tbody class="" id="acceptStatus">

                                </tbody>
                            </table>
                            <div id="alert"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Akceptacja Pojazdu -->
    <div class="modal fade" id="acceptCarModal" tabindex="-1" role="dialog" aria-labelledby="acceptCarLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acceptCarLabel">Kontrola Pojazdu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="acceptCarData">
                    <div class="modal-body">
                        <img src="" id="acceptCarPicture" style="width: 100%; height: 15vh; object-fit: contain;" />
                        <div class="form-group">
                            <label for="">Producent</label>
                            <input class="form-control" type="text" name="producent" id="acceptCarProducent" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="">Model</label>
                            <input class="form-control "type="text" name="model" id="acceptCarModel" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="">Rok produkcji</label>
                            <input class="form-control type=" text" name="rok_produkcji" id="acceptCarRok"
                                placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="">Kolor</label>
                            <input class="form-control type=" text" name="kolor" id="acceptCarKolor" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="">Opis</label>
                            <textarea class="form-control type=" text" name="opis" id="acceptCarOpis" placeholder=""></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Numer tablicy rejestracyjnej</label>
                            <input class="form-control type=" text" name="numer_tablicy" id="acceptCarNumerTablicy"
                                placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="">VIN</label>
                            <input class="form-control type=" text" name="VIN" id="acceptCarVIN" placeholder="" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Zamknij</button>
                            <button type="button" id="declineCarButton" value="" class="btn btn-danger">Odrzuć
                                pojazd</button>
                            <button type="button" id="acceptCarButton" value="" class="btn btn-success">Zaakceptuj
                                Pojazd</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script>
        zaladujAkceptacje()
    </script>

</body>

</html>