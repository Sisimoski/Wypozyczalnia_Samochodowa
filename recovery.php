<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("Location: /index.php");
        }
?>

<!DOCTYPE html>
<html lang="pl">

<head>
  <title>Zapomniałeś hasła?</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="shortcut icon" type="image/jpg" href="favicon.png"/>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Nunito|Quicksand&display=swap" rel="stylesheet">

  <!-- Custom CSS Files -->
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="css/logowanie.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="../js/login.js"></script>
</head>

<body>
  <div class="container-fluid">
    <!-- Alert -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/include/alert.php';?>

    <div class="row" style="height: 100%;">
      <div class="col-lg-6 p-0">
        <a href="index.php"><img src="images/Car4You-line-logo.png" class="m-5" alt="Car4You Logo"
            style="width: 200px;"></a>
        <img src="images/bg/login-man1-background.png" class="img-fluid d-none d-lg-block" alt="man-standing-background">
        <!-- <a href="https://www.freepik.com/free-photos-vectors/background">Background vector created by katemangostar - www.freepik.com</a> -->
      </div>
      <div class="col-md p-5 text-light" style="background-color: #8AC2F6;">
        <div>
          <h1>Zapomniałeś hasła?</h1>
          <form class="loginForm">
              <div class="my-4">
                  <h5>Aby zresetować hasło, wprowadź poniżej swój adres e-mail.</h5>
                    <p>
                        Jeżeli uda nam się znaleźć Twoje dane w bazie danych, zostanie wysłana wiadomość na Twój
                        adres e-mail z linkiem do zmiany hasła.
                    </p>
              </div>
               <div class="form-group">
              <label for="loginRecovery"> Wyszukaj po nazwie użytkownika:</label>
              <input type="text" name="loginRecovery" class="form-control" id="loginRecovery" placeholder="Nazwa użytkownika">
              <div id="loginInfo" class="form-text font-weight-normal"> </div>
            </div>
            <div class="form-row">
              <div class="form-group col-xs-auto">
                <button id="loginRecoveryButton" name="loginRecoveryButton" class="btn btn-primary" value="login"
                  type="button">Wyszukaj</button>
              </div>
            </div>
            <div class="form-group">
              <label for="">Wyszukaj po adresie e-mail:</label>
              <input type="text" name="emailRecovery" class="form-control" id="emailRecovery" placeholder="Email">
              <div id="loginInfo" class="form-text font-weight-normal"> </div>
            </div>
            <div class="form-row">
              <div class="form-group col-xs-auto">
                <button id="emailRecoveryButton" class="btn btn-primary" value="email"
                                    type="button">Wyszukaj</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if(isset($_GET["aktywacja"])){
      if(!empty($_GET["aktywacja"])){
        echo "<script> AktywacjaKonta('".$_GET["aktywacja"]."');</script>";
      }
    }

    ?>

</body>

</html>