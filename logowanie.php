<?php
    session_start();
    if(isset($_SESSION['id'])){
        header("Location: /index.php");
        }
?>

<!DOCTYPE html>
<html lang="pl">

<head>
  <title>Logowanie</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
    <div class="fixed-top justify-content-center d-flex">
      <div class="alert ml-5 mr-5 mt-3 text-center" style="width:40%"></div>
    </div>

    <div class="row" style="height: 100%;">
      <div class="col-lg-6 p-0">
        <a href="index.php"><img src="images/Car4You-line-logo.png" class="m-5" alt="Car4You Logo"
            style="width: 200px;"></a>
        <img src="images/bg/login-man1-background.png" class="img-fluid d-none d-lg-block" alt="man-standing-background">
        <!-- <a href="https://www.freepik.com/free-photos-vectors/background">Background vector created by katemangostar - www.freepik.com</a> -->
      </div>
      <div class="col-md p-5 text-light" style="background-color: #8AC2F6;">
        <div>
          <h1>Witaj ponownie! Zaloguj się.</h1>
          <form class="loginForm">
            <div class="form-group">
              <label for="login">Login/Email</label>
              <input type="text" name="login" class="form-control" id="login" aria-describedby="loginHelp"
                placeholder="Login/Email">
              <div id="loginInfo" class="form-text font-weight-normal"> </div>
            </div>
            <div class="form-group">
              <label for="password">Hasło</label>
              <input type="password" name="password" class="form-control" id="password" placeholder="Hasło">
              <div id="passwordInfo" class="form-text font-weight-normal"> </div>
            </div>
            <div class="form-group form-check custom-checkbox">
              <input type="checkbox" name="rememberMe" class="custom-control-input" id="rememberMe">
              <label class="custom-control-label" for="rememberMe">Zapamiętaj mnie</label>
            </div>
            <div class="form-row">
              <div class="form-group col-xs-auto">
                <button id="zaloguj" class="btn btn-primary" type="submit">Zaloguj się</button>
              </div>
              <div class="form-group col-xs-auto">
                <a href="#">Zapomniałeś hasła?</a>
              </div>
            </div>
            <div class="form-group">
              <label>Nie masz jeszcze konta? <a href="register.php">Zarejestruj się teraz!</a></label>
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