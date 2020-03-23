<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Car4You - wypożyczalnia samochodów</title>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Nunito|Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
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
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <img src="images/Car4You-line-logo.png" height="50" alt="car4you logo">
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
            <div class="btn-group" role="group" aria-label="Login/Register Buttons">
                <button type="button" class="btn btn-outline-primary mr-sm-2">Zaloguj się</button>
                <button type="button" class="btn btn-primary my-2 my-sm-0">Zarejestruj się</button>
            </div>
        </div>
    </nav>

    

    <div class="container-fluid" style="background-color: #89CFF0;">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 text-light">
          <h1>Car4You</h1>
          <h2>Oto najlepsza wypożyczalnia w Twojej okolicy.</h2>
          <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="images/login-man1-background.jpg" class="img-fluid" alt="">
        </div>
      </div>
    </div>



    <?php
            if(!isset($_SESSION['id'])){
            echo "<a class='cta' href='logowanie.php'><button>Zaloguj się</button></a>";
            echo "<a class='cta' href='register.php'><button>Zarejestruj się</button></a>" ;
            }
            else{
                if($_SESSION['rodzaj_klienta'] == 1){
                    echo "<a class='cta' href='./cpanel/index.php'><button>Panel Klienta</button></a>";
                }
                if($_SESSION['rodzaj_klienta'] == 3){
                    echo "<a class='cta' href='./apanel/index.php'><button>Panel Administratora</button></a>"; 
                }
                echo "<a class='cta'><button id='wyloguj'>Wyloguj</button></a>";
            }
        ?>
</body>

</html>