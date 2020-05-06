<?php
    session_start();
     require_once("../../php/config.php");
     $idSession = $_SESSION['id'];
     $id = $_POST["id"];
     
    $sth = $db->prepare("UPDATE wypozyczenie SET czy_zrealizowano = 1 WHERE id_wypozyczenia = {$id} AND czy_oplacono = 1");
    $sth ->execute();
    echo "Oddano pojazd";


?>