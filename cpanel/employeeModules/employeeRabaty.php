<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: /index.php");
    }

    if(isset($_SESSION["rodzaj_konta"])){
        if($_SESSION["rodzaj_konta"] != 3 && $_SESSION["rodzaj_konta"] != 4)
          header("Location: ../index.php");
    }
    else{
        header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Car4You - Panel klienta</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/include/include.php';?>
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
        <!-- ALERT -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/alert.php';?>
        <!-- SideBar -->
        <div class="row">
            <nav class="col-md-2 d-none d-lg-block bg-light sidebar position-fixed">
                <div class="sidebar-sticky">
                    <?php
                        include("../sidebarContent.php");
                    ?>
                </div>
            </nav>

            <!-- Content -->

            <div class="col-lg-10 ml-sm-auto col-lg-10">
                <div class="row" style="z-index:2; margin-bottom: 80px;">
                    <nav class="position-fixed breadcrumbStyleFixed" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="index.php">Panel Pracownika</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Rabaty</li>
                        </ol>
                    </nav>
                </div>
                <div class="row px-4 pb-3">
                    <div class="col">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2
                            mb-3 border-bottom px-2">
                            <h1>Rabaty</h1>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <button type='button' class='btn btn-success btn-block mb-3' data-toggle='modal' data-target='#dodawanieRabatuModal' id='dodajRabatButton'>Dodaj Rabat</button>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <!-- Table Template -->
                                <div class="tabelaRabatyHead table-responsive">
                                    <table class="table table-striped table-hover text-center align-items-center border">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Kod Rabatowy</th>
                                                <th scope="col">Ilość Kodów</th>
                                                <th scope="col">Procent Rabatu</th>
                                                <th scope="col">Data Ważności</th>
                                                <th scope="col">Funkcje</th>
                                            </tr>
                                        </thead>
                                        <tbody class="" id="tabelaRabaty">
        
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End of Table Template -->

                                <div class="modal fade" id="dodawanieRabatuModal" tabindex="-1" role="dialog" aria-labelledby="Rabaty" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="">Dodawanie rabatu</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form class="dodawanieRabatuForm">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Kod</label>
                                                        <input id="kod_rabatowy" class="form-control" name="kod" placeholder="Kod Rabatowy">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Ilość Kodów</label>
                                                        <input id="ilosc_kodow" class="form-control" name="ilosc" placeholder="Ilość Kodów">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Procent Rabatu</label>
                                                        <input id="procent_rabatu" class="form-control" name="procent" placeholder="Procent Rabatu">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Data Ważności</label>
                                                        <input type="date" id="data_waznosci" class="form-control" name="data">
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Anuluj</button>
                                                <button type="button" id="dodajRabatBtn" class="btn btn-primary">Dodaj Rabat</button>
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
    </div>
    </div>

    <script>
        zaladujKodyRabatowe();
    </script>
</body>

</html>