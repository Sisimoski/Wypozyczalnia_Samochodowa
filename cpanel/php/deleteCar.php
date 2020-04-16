<?php
    session_start();
    require_once("../../php/config.php");
    $idSession = $_SESSION['id'];

    $vin= ($_POST['vin']);


    $sth = $db->prepare('SELECT id_specyfikacja_samochodu FROM samochod WHERE :vin=vin limit 1');
    $sth ->bindValue(':vin',$vin,PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    if($result){
      $id_specyfikacja_samochodu = $result['id_specyfikacja_samochodu'];
    }
    else{
        die("Something went wrong");
    }

    
    $sth = $db->prepare('DELETE FROM specyfikacja_samochodu WHERE id_specyfikacja_samochodu=:id_specyfikacja_samochodu');
    $sth ->bindValue(':id_specyfikacja_samochodu',$id_specyfikacja_samochodu,PDO::PARAM_STR);
    $sth->execute();

    $sth = $db->prepare('DELETE FROM samochod WHERE vin=:vin');
    $sth ->bindValue(':vin',$vin,PDO::PARAM_STR);
    $sth->execute();

    echo "Pomyślnie usunięto samochód";
?>