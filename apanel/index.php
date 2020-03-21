<!-- Index file for Admin Panel -->

<?php
    session_start();
    if(isset($_SESSION["rodzaj_klienta"])){
        if($_SESSION["rodzaj_klienta"] != 3){
            header("Location: ../index.php");
        }
    }
    else{
        header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>