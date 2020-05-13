<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Zmiana maila</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/include/include.php';?>
    <script src="js/collapse.js"></script>
    <script src="/cpanel/js/logout.js"></script>
    <script src="./js/changeData.js"></script>
</head>

<body>
    <!-- Alert -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/alert.php';?>
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
                            <li class="breadcrumb-item active">Mój profil</li>
                            <li class="breadcrumb-item active" aria-current="page">Zmiana maila</li>
                        </ol>
                    </nav>
                </div>
                <div class="row px-4">
                    <div class="col">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2
                            mb-3 border-bottom px-2">
                            <h1>Zmiana maila</h1>
                        </div>
                        <form class="changeMailForm" method="POST">
                            <div class="form-group">
                                <label for="oldMail">Aktualny adres mailowy</label>
                                <input id="oldMail" class="form-control" name="oldMail" placeholder="Wprowadź aktualny mail">
                                <div class="komunikat"> </div>
                            </div>
                            <div class="form-group">
                                <label for="newMail">Nowy adres mailowy</label>
                                <input id="newMail" class="form-control" name="newMail" placeholder="Wprowadź nowy mail">
                                <div class="komunikat"> </div>
                            </div>
                            <div>
                                <div class="komunikat"> </div>
                                <button class="btn btn-primary" id="changeMail" name="changeMail" type="button">Zatwierdź
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