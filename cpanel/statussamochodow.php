<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Status samochodów</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/include/include.php';?>
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
            <div class="col-lg-10 ml-sm-auto col-lg-10">
                <div class="row" style="z-index:2; margin-bottom: 80px;">
                    <nav class="position-fixed breadcrumbStyleFixed" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Panel klienta</a></li>
                            <li class="breadcrumb-item active">Samochody</li>
                            <li class="breadcrumb-item active" aria-current="page">Status samochodów</li>
                        </ol>
                    </nav>
                </div>
                <div class="row px-4 pb-3">
                    <div class="col">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2
                            mb-3 border-bottom px-2">
                            <h1>Status samochodów</h1>
                        </div>
                        <div class="LoadCarTableHead">
                            <table class="table table-striped table-hover text-center align-items-center border">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nazwa</th>
                                        <th scope="col">Nr tablicy</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Funkcje</th>
                                    </tr>
                                </thead>
                                <tbody class="" id="LoadCarTable">

                                </tbody>
                            </table>
                            <div id="alert"></div>
                        </div>
                    </div>
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
                    <h5 class="modal-title" id="deleteCarLabel">Usuwanie Samochodu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Czy napewno chcesz usunąć samochód?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Anuluj</button>
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
                    <h5 class="modal-title" id="editCarLabel">Edycja samochodu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="editCarForm" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="producentEdit">Producent</label>
                            <input id="producentEdit" class="form-control" name="producentEdit" >
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group">
                            <label for="modelEdit">Model</label>
                            <input id="modelEdit" class="form-control" name="modelEdit" >
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group">
                            <label for="rok_produkcjiEdit">Rok produkcji</label>
                            <input id="rok_produkcjiEdit" class="form-control" type="number" min="1960" max="2020"
                                step="1" name="rok_produkcjiEdit">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group">
                            <label for="kolorEdit">Kolor</label>
                            <input id="kolorEdit" class="form-control" type="input" name="kolorEdit">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group">
                            <label for="opisEdit">Opis</label>
                            <input id="opisEdit" class="form-control" type="input" name="opisEdit">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group">
                            <label for="cenaEdit">Cena wypożyczenia (zł/24h)</label>
                            <input id="cenaEdit" class="form-control" type="input" name="cenaEdit">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group">
                            <label for="segmentEdit">Segment</label>
                            <input id="segmentEdit" class="form-control" type="input" name="segmentEdit">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group">
                            <label for="typ_silnikaEdit">Typ silnika</label>
                            <input id="typ_silnikaEdit" class="form-control" type="input" name="typ_silnikaEdit">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group">
                            <label for="mocEdit">Moc</label>
                            <input id="mocEdit" class="form-control" type="input" name="mocEdit">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group">
                            <label for="pojemnosc_silnikaEdit">Pojemnosc silnika</label>
                            <input id="pojemnosc_silnikaEdit" class="form-control" type="input" name="pojemnosc_silnikaEdit">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group">
                            <label for="srednie_spalenieEdit">Średnie spalanie</label>
                            <input id="srednie_spalenieEdit" class="form-control" type="input" name="srednie_spalenieEdit">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group">
                            <label for="skrzynia_biegowEdit">Skrzynia biegów</label>
                            <input id="skrzynia_biegowEdit" class="form-control" type="input" name="skrzynia_biegowEdit">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group">
                            <label for="ilosc_miejscEdit">Ilość miejsc</label>
                            <input id="ilosc_miejscEdit" class="form-control" type="input" name="ilosc_miejscEdit">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group">
                            <label for="pojemnosc_bagaznikaEdit">Pojemność bagażnika</label>
                            <input id="pojemnosc_bagaznikaEdit" class="form-control" type="input" name="pojemnosc_bagaznikaEdit">
                            <div class="komunikat"> </div>
                        </div>
                        <div class="form-group">
                            <label for="zasiegEdit">Zasięg</label>
                            <input id="zasiegEdit" class="form-control" type="input" name="zasiegEdit">
                            <div class="komunikat"> </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <div class="komunikat"> </div>
                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Anuluj</button>
                            <button type="button" id="editCarButton" name="editCarButton" value=""
                                class="btn btn-success">Zatwierdź zmianę</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        zaladujSamochody();
    </script>

</body>

</html>