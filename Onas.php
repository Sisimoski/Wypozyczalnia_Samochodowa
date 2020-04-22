<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <title>Car4You - wypożyczalnia samochodów</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Nunito|Quicksand&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <!-- Boxicons -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./js/index.js"></script>
</head>

<body>
    <!-- Nagłówek Navbar -->
    <section id="header">
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light"
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
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Strona główna<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Oferty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">O nas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Kontakt</a>
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
                    if($_SESSION['rodzaj_konta'] == 3 || $_SESSION['rodzaj_konta'] = 4){
                        echo "<button id='panelKlienta' href='./cpanel/index.php' type='submit' class='btn btn-primary'>Panel Pracownika</button>";
                    }
                        
                }
                echo "<button type='button' id='wyloguj' class='btn btn-outline-primary ml-2'>Wyloguj</button>";
            }
        ?>
            </div>
        </nav>
    </section>

    <!-- Sekcja Hero -->
    <!-- Spierdolona responsywność -->
    <section id="heronas" class="d-flex align-items-center text-dark">
        <div class="container">
            <div class="row align-items-center">
                
                <div class="col-lg-6 order-1 order-lg-1">
                    <!-- Dodać cień do obrazka -->
                    <img src="images/home-hero-background.png" class="img-fluid" alt="homepage-hero-background">
                </div>
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1">
                    <br>
                    <h1>Car4You</h1>
                    <p> Car4you to jedna z pierwszych w Polsce wypożyczalni samochodów, w której Użytkownik ma możliwość wypożyczenia samochodu dla siebie (jak dzieje się w standardowych wypożyczalniach), ale również wypożyczenia komuś swojego samochodu. 
	Opcja wypożyczenia samochodu ma wiele zalet, które usprawnią życie codziennie. 
	Samochód często jest potrzebny w najmniej spodziewanym momencie - stłuczka, wypadek lub odmówienie posłuszeństwa od strony samochodu - wtedy możliwe jest wypożyczenie go w naszej wypożyczalni. 
	Ponadto wypożyczenie pozwoli na wypróbowanie innego modelu samochodu oraz zapewni szybkie przemieszczanie się do punktu docelowego, będąc niezależnym od środków masowego transportu.
        </p>
                </div>
            </div>
        </div>
    </section>
    <section id="heronas2" class="d-flex align-items-center text-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1">
                    <h2>Główne zalety car4you to:</h2>
                    <p>
<strong>Elastyczność</strong> - czyli możliwość zadecydowania zarówno o okresie wynajmu samochodu, ale także o jego marcie bądź klasie. <br>
<strong>Wygoda</strong> - czyli szybkie i niezależne przemieszczanie się z miejsca na miejsce bez konieczności korzystania z komunikacji miejskiej czy taxówek.<br>
    <strong>Mobilność</strong> - czyli swobodne poruszanie się samochodem przy oszczędności czasu i pieniędzy (co związane jest z koniecznością użycia innych środków transportu), a wybrany samochód jest dopasowany do Klienta
</p>
                </div>
                <div class="col-lg-6 order-1 order-lg-1">
                    <!-- Dodać cień do obrazka I PODMIENIĆ OBRAZEK CHUJNIEOKNO-->
                    <img src="images/home-hero-background.png" class="img-fluid" alt="homepage-hero-background">
                </div>
            </div>
        </div>
    </section>



    <footer id="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-newsletter">
                    <h4>Pozostań w kontakcie</h4>
                    <p>
                        Nie przegap żadnych informacji i zapisz się do naszego newslettera.
                    </p>
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                            <button type="submit" class="btn btn-primary">Subskrybuj</button>
                    </form>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Przydatne linki</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Strona główna</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Oferty</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">O nas</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Kontakt</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Dołącz do sieci</h4>
                    <p>Stwórz z nami najwspanialszą społeczność!</p>
                    <div class="social-links mt-3">
                        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Kontakt</h4>
                    <p>
                        ul. Prószkowska niewiemjaka <br>
                        Opole, 11-111<br>
                        Polska <br><br>
                        <strong>Telefon:</strong> +48 123 456 789<br>
                        <strong>Email:</strong> car4you@poczta.pl<br>
                    </p>
                </div>


            </div>
        </div>
    </footer>
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>Car4You © 2020. Wszystkie prawa zastrzeżone.</p>
                    </div>
                </div>
            </div>
        </div>
    

</body>

</html>