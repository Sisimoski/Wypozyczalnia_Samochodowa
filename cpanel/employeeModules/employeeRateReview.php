<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    } 

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Akceptacje Opinii</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/include/include.php';?>
    <script src="../js/collapse.js"></script>
    <script src="/cpanel/js/logout.js"></script>
    <script src="./js/employeeModules.js"></script>
</head>

<body>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <?php
            include("../headerContent.php");
        ?>
        </nav>
    </section>
    <div class="container-fluid">
        <!-- Alert -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/alert.php';?>
        <div class="row" style="height: 100%;">
            <nav class="col-md-2 d-none d-lg-block bg-light sidebar position-fixed">
                <div class="sidebar-sticky">
                    <?php
                            include("../sidebarContent.php");
                        ?>
                </div>
            </nav>
            <div class="col-lg-10 ml-sm-auto col-lg-10">
                <div class="row" style="z-index:2; margin-bottom: 80px;">
                    <nav class="position-fixed breadcrumbStyleFixed" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Panel Pracownika</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Akceptacje Opinii</li>
                        </ol>
                    </nav>
                </div>
                <div class="row px-4 pb-3">
                    <div class="col">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2
                            mb-3 border-bottom px-2">
                            <h1>Akceptacje Opinii</h1>
                        </div>
                        <!-- Table Template -->
                        <div class="">
                            <table class="table table-striped table-hover text-center align-items-center border">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Użytkownik</th>
                                        <th scope="col">Ocena</th>
                                        <th scope="col">Komentarz</th>
                                        <th scope="col">Funkcje</th>
                                    </tr>
                                </thead>
                                <tbody class="akceptacjaOpiniiTabela" id="">
                                    
                                </tbody>
                            </table>
                            <div id="alert"></div>
                        </div>
                        <!-- End of Table Template -->
                    </div>
                </div>

            </div>
        </div>
    </div>
<script>zaladujAkceptacjeOpinii();</script>
</body>

</html>