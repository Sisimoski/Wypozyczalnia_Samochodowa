<!-- Config File for connecting to database and secure session -->
<?php 
    try{
        $db = new PDO('mysql:host=localhost;dbname=website;charset=utf8mb4', 'root', 'password');
     }
     catch(PDOException $e){
         die("Nie udalo sie polaczyc do bazy danych");
     }

?>