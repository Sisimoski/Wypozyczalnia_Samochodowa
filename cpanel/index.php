<!-- Index file for Client pannel -->
<?php
session_start();

    if(!isset($_SESSION['id'])){
    header("Location: ../index.php");
    }

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <title>Car4You - Rejestracja</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|Nunito|Quicksand&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="./js/changeData.js"></script>
    </head>
<body>

<div class="alert ml-5 mr-5 mt-3 text-center" style="width:40%"></div>
<span>Zmianna hasła</span>
    <form class="changePasswordForm" method="POST">
        <div>
            <label for="oldPswd">Stare hasło</label>
            <input id="oldPswd" name="oldPswd" type="password" placeholder="Wprowadź dotychczasowe hasło">
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="newPswd">Nowe hasło</label>
            <input id="newPswd" name="newPswd" type="password" placeholder="Wprowadź nowe hasło">
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="newPswd1">Powtórz nowe hasło</label>
            <input id="newPswd1" name="renewPswd1" type="password" placeholder="Wprowadź ponownie nowe hasło">
            <div class="komunikat"> </div>
        </div>
        <div>
            <div class="komunikat"> </div>
            <button class="btn btn-primary" id="changePassword" name="changePassword" type="button">Zmień hasło</button>
        </div>
    </form>
    <!-- <span>Dodawannie samochodu</span>
    <form class="addNewCarForm mt-3" method="POST">
        <div>
            <label for="oldPswd">VIN</label>
            <input id="vin" name="vin">
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="newPswd">Nowe hasło</label>
            <input id="newPswd" name="newPswd" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <label for="newPswd1">Powtórz nowe hasło</label>
            <input id="newPswd1" name="renewPswd1" >
            <div class="komunikat"> </div>
        </div>
        <div>
            <div class="komunikat"> </div>
            <button class="btn btn-primary" id="addCar" name="changePassword" type="button">Zmień hasło</button>
        </div>
    </form> -->

</body>