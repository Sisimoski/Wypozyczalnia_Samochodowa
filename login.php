<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Car4You - Logowanie</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/login.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Nunito|Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">    
</head>
<body>
    <div class="container-fluid">
      <div class="fixed-top">
        <div class="alert ml-5 mr-5 mt-2"></div>
      </div>
      
    <div class="row">
        <div class="col-lg-6 p-0">
            <a href="index.php"><img src="images/Car4You-line-logo.png" class="m-5" alt="Car4You Logo" style="width: 200px;"></a>
            <img src="images/login-man1-background.jpg" class="img-fluid d-none d-lg-block" alt="man-standing-background">
            <!-- <a href="https://www.freepik.com/free-photos-vectors/background">Background vector created by katemangostar - www.freepik.com</a> -->
        </div>
        <div class="col-md p-5 text-light" style="background-color: #8AC2F6;">
            <div>
                <h1>Witaj ponownie! Zaloguj się.</h1>
                <form class="loginForm">
                    <div class="form-group">
                      <label for="login">Login</label>
                      <input type="text" name="login" class="form-control" id="login" aria-describedby="loginHelp" placeholder="Login">
                    </div>
                    <div class="form-group">
                      <label for="password">Hasło</label>
                      <input type="password" name="password" class="form-control" id="password" placeholder="Hasło">
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" name="remember" class="form-check-input" id="rememberMe">
                      <label class="form-check-label"  for="rememberMe">Zapamiętaj mnie</label>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-xs-auto">
                        <button id="zaloguj" class="btn btn-primary">Zaloguj się</button>
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
</body>
</html>