<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';
    $data = array();

    $sth = $db->prepare('SELECT ilosc_punktow, COUNT(samochod.id_specyfikacja_samochodu) AS ilosc_aut  FROM uzytkownik 
    INNER JOIN samochod ON samochod.id_uzytkownik = uzytkownik.id_uzytkownik
    INNER JOIN specyfikacja_samochodu ON specyfikacja_samochodu.id_specyfikacja_samochodu = samochod.id_specyfikacja_samochodu 
    WHERE uzytkownik.id_uzytkownik = :id');
    $sth->bindValue(":id",$_SESSION["id"],PDO::PARAM_INT);
    $sth ->execute();
    $result = $sth ->fetchAll();
    $points = $result[0]["ilosc_punktow"];
    $cars  = $result[0]["ilosc_aut"];

    $sth = $db->prepare('SELECT COUNT(samochod.id_specyfikacja_samochodu) AS ilosc_aut FROM samochod
    INNER JOIN specyfikacja_samochodu ON specyfikacja_samochodu.id_specyfikacja_samochodu = samochod.id_specyfikacja_samochodu
    WHERE id_uzytkownik = :id AND czy_posiadany = 2');
    $sth->bindValue(":id",$_SESSION["id"],PDO::PARAM_INT);
    $sth ->execute();
    $result2 = $sth ->fetchAll();
    $rentedCars = $result2[0]["ilosc_aut"];
    
    
    $data[] = $points;
    $data[] = $cars;
    $data[] = $rentedCars;

    $response = json_encode($data);
    echo $response;
?>