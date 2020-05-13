<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';
    $vin = $_POST['vin'];
    $user = $_SESSION['id'];
    $data = date("Y-m-d");
    $dataOd = $_POST['dataOd'];
    $dataDo = $_POST['dataDo'];
    $kwota = $_POST['kwota'];
    

    $sth = $db->prepare("SELECT samochod.id_specyfikacja_samochodu FROM samochod 
    JOIN specyfikacja_samochodu ON samochod.id_specyfikacja_samochodu = specyfikacja_samochodu.id_specyfikacja_samochodu
    WHERE specyfikacja_samochodu.czy_posiadany = 1 AND samochod.vin = '{$vin}'");
    $sth->execute();

    if($sth->rowCount() == 1){
        $result = $sth->fetchAll();
        $idCar = $result[0]['id_specyfikacja_samochodu'];

        $sth = $db->prepare("UPDATE specyfikacja_samochodu SET specyfikacja_samochodu.czy_posiadany = 2
           WHERE id_specyfikacja_samochodu = {$idCar} ");
        $sth ->execute();

        $sth = $db->prepare("INSERT INTO wypozyczenie (id_uzytkownik, data_zlozenia, czy_przyjeto, data_przyjecia,kwota, czy_oplacono, data_odbioru, data_zwrotu, czy_zrealizowano)
         VALUES(:id,:data,:przyjecie,:data2,:kwota,:oplacenie,:data3,:data4,:realizacja)");
        $sth ->bindValue(':id',$user,PDO::PARAM_INT);
        $sth ->bindValue(':data',$data,PDO::PARAM_STR);
        $sth ->bindValue(':przyjecie',1,PDO::PARAM_INT);
        $sth ->bindValue(":kwota",$kwota,PDO::PARAM_STR);
        $sth ->bindValue(':oplacenie',0,PDO::PARAM_INT);
        $sth ->bindValue(':realizacja',0,PDO::PARAM_INT);
        $sth ->bindValue(':data2',$data,PDO::PARAM_STR);
        $sth ->bindValue(':data3',$dataOd,PDO::PARAM_STR);
        $sth ->bindValue(':data4',$dataDo,PDO::PARAM_STR);
        $sth -> execute();

        $idRent = $db->lastInsertID();

        $sth = $db->prepare("INSERT INTO wypozyczony_samochod (id_wypozyczenia, vin) VALUES (:id, :vin)");
        $sth -> bindValue(':id',$idRent,PDO::PARAM_INT);
        $sth -> bindValue(':vin',$vin,PDO::PARAM_STR);
        $sth ->execute();

        echo "Success";
    }else{
        echo "Pojazd jest już wypożyczony";
    }
    



?>