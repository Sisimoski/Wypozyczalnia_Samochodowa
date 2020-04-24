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

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/cpanel/include/include.php';?>
    <script src="js/collapse.js"></script>
    <script src="/cpanel/js/logout.js"></script>
    <script src="./js/changeData.js"></script>
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