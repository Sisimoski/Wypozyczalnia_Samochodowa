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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">  
    <title>Panel Administratora</title>
</head>
<body>
    <div class=container-fluid>
       <!-- 
           
           Jak będziecie robić to polecam
           
        Menu góra :
        https://getbootstrap.com/docs/4.4/components/navbar/
        https://getbootstrap.com/docs/4.4/components/navs/
        

        Dobre jako side menu:
        https://getbootstrap.com/docs/4.4/components/collapse/

        Tagi każdej zakładki : 
        https://getbootstrap.com/docs/4.4/components/breadcrumb/


        -->


    </div>  
</body>
</html>