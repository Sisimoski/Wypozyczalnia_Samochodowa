<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Car4You - Logowanie</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Nunito|Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="./js/login.js"></script>
</head>
<body>
    <div class="container-fluid">
      <div class="alert"></div>
    <div class="row">
        <div class="col-lg-6 p-0">
            <a href="index.php"><img src="images/Car4You-line-logo.png" class="m-5" alt="Car4You Logo" style="width: 200px;"></a>
            <img src="images/register-man1-background.eps" class="img-fluid d-none d-lg-block" alt="man-standing-background">
            <!-- <a href="https://www.freepik.com/free-photos-vectors/background">Background vector created by katemangostar - www.freepik.com</a> -->
        </div>
        <div class="col-md p-5 text-light" style="background-color: #8AC2F6;">
            <div>
                <h1>Witaj ponownie! Zaloguj się.</h1>
                <form class="loginForm">
                    <div class="form-group">
                      <label for="login">Login</label>
                      <input type="login" class="form-control" id="login" aria-describedby="loginHelp" placeholder="Login">
                    </div>
                    <div class="form-group">
                      <label for="password">Hasło</label>
                      <input type="password" class="form-control" id="password" placeholder="Hasło">
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Zapamiętaj mnie</label>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-xs-auto">
                        <button type="submit" id="zaloguj" class="btn btn-primary">Zaloguj się</button>
                      </div>
                      <div class="form-group col-xs-auto">
                        <a href="#">Zapomniałeś hasła?</a>    
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Nie masz jeszcze konta? <a href="../register.php">Zarejestruj się teraz!</a></label>
                    </div>
                  </form>
            </div>
        </div>
    </div>
    </div>

    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>