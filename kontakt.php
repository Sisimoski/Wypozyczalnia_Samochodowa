<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Kontakt</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/include.php';?>

    <script src="./js/contact.js"></script>
    <script src="./js/index.js"></script>
    <script src="./js/newsletter.js"></script>
</head>

<body>
    <!-- Alert -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/alert.php';?>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <nav class="navbar navbar-expand-md fixed-top navbar-light bg-light"
            style="box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">
            <a class="navbar-brand ml-2" href="index.php">
                <img src="images/Car4You-line-logo.png" height="50" alt="car4you logo">
                <!-- <a href="https://www.freepik.com/free-photos-vectors/background">Background vector created by katemangostar - www.freepik.com</a> -->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-1" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Strona główna<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="oferty.php">Oferty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aboutus.php">O nas</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="kontakt.php">Kontakt</a>
                    </li>
                </ul>
                <?php
            if(!isset($_SESSION['id'])){
            echo "<button id='zaloguj' type='submit' class='btn btn-outline-primary'>Zaloguj się</button>";
            echo "<button id='zarejestruj' type='submit' class='btn btn-primary ml-2'>Zarejestruj się</button>" ;
            }
            else{
                if(isset($_SESSION['rodzaj_konta'])){
                    if($_SESSION['rodzaj_konta'] == 1 || $_SESSION['rodzaj_konta'] == 2){
                        echo "<button id='panelKlienta' href='./cpanel/index.php' type='submit' class='btn btn-primary'>Panel Klienta</button>";
                    }
                    if($_SESSION['rodzaj_konta'] == 3 || $_SESSION['rodzaj_konta'] == 4){
                        echo "<button id='panelKlienta' href='./cpanel/index.php' type='submit' class='btn btn-primary'>Panel Pracownika</button>";
                    }
                        
                }
                echo "<button type='button' id='wyloguj' class='btn btn-outline-primary ml-2'>Wyloguj</button>";
            }
        ?>
            </div>
        </nav>
    </section>

    <section id="herous" class="text-light">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-12 pt-lg-0 order-2 order-lg-1">
                    <h1>Kontakt</h1>
                    <h2>Potrzebujesz informacji? Skontaktuj się z nami.</h2>
                </div>
            </div>
        </div>
    </section>
    <section id="highlight" class="highlight highlight-bg text-light">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-12 col-md-4">
                    <h4>Kontakt</h4>
                    <p>
                        ul. Prószkowska niewiemjaka <br>
                        Opole, 11-111<br>
                        Polska <br><br>
                        <strong>Telefon:</strong> +48 123 456 789<br>
                        <strong>Email:</strong> car4you@poczta.pl<br>
                    </p>
                </div>
                <div class="col">
                    <section id="map">
                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d80902.88709892464!2d17.836246159044936!3d50.678829943229296!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47105306456db34b%3A0x25c66487400c346e!2sOpole!5e0!3m2!1spl!2spl!4v1585259764522!5m2!1spl!2spl"
                                frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                                tabindex="0"></iframe>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="text-center">Formularz kontaktowy</h2>
                    <form class="contactForm" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="imie">Imię oraz nazwisko</label>
                                <input data-toggle="tooltip" data-placement="top" 
                                    class="form-control" id="imie" placeholder="Wprowadź imie" name="imie">
                                    <small class="form-text text-muted">To pole jest wymagane.</small>
                                <div class="komunikat"> </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="email">Adres e-mail</label>
                                <input data-toggle="tooltip" data-placement="top" 
                                    class="form-control" id="email" placeholder="Wprowadź email" name="email">
                                    <small class="form-text text-muted">To pole jest wymagane.</small>
                                <div class="komunikat"> </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="content">Treść wiadomości</label>
                                <textarea type="textarea" rows="5" data-toggle="tooltip" data-placement="top" 
                                    class="form-control" id="content" placeholder="Wprowadź treść wiadomości"
                                    name="content"></textarea>
                                    <small class="form-text text-muted">To pole jest wymagane.</small>
                                <div class="komunikat"></div>
                            </div>
                            <!-- <div class="form-group col-md-12">
                                <p class="text-danger">*pole wymagane</p>
                            </div> -->
                            <div class="form-group col-xs-auto">
                                <button class="btn btn-primary" id="contact" type="button">Wyślij wiadomość</button>
                            </div>
                        </div>
                    </form>
    
                </div>
            </div>
        </div>
    </section>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/footer.php';?>
</body>

</html>