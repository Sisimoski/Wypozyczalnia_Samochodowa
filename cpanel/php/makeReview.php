<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

    if(isset($_POST["rate"])){
        $rate = $_POST["rate"];
    }
    else{
        $rate = 1;
    }
    $comment = $_POST["comment"];
    $id =$_POST["id"];

    $sth = $db->prepare("SELECT vin from wypozyczony_samochod WHERE id_wypozyczenia = {$id}");
    $sth ->execute();

    $result = $sth->fetchAll();

    $vin = $result[0]["vin"];
    
    $sth = $db->prepare("INSERT INTO opinia (vin, id_uzytkownik, ocena, komentarz, czy_zatwierdzona) VALUES (:vin, :idUser,:rate,:komentarz,0)");
    $sth ->bindValue(":vin",$vin,PDO::PARAM_STR);
    $sth ->bindValue(":idUser",$_SESSION["id"],PDO::PARAM_INT);
    $sth ->bindValue(":rate",$rate,PDO::PARAM_INT);
    $sth ->bindValue(":komentarz",$comment,PDO::PARAM_STR);
    $sth ->execute();

    $idOpinia = $db ->lastInsertId();

    $sth = $db->prepare("UPDATE wypozyczenie SET czy_opinia = 1 , id_opinia = {$idOpinia} WHERE id_wypozyczenia = {$id}");
    $sth ->execute();

    echo "Przesłano Opinię"
    
?>