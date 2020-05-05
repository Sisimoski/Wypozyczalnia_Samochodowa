<?php
    session_start();
    require_once("../../php/config.php");
    $idSession = $_SESSION['id'];
    $vin= ($_POST['vin']);

  
    $sth = $db->prepare('SELECT producent,model,rok,kolor,opis,cena_netto,segment,typ_silnika,moc,pojemnosc_silnika,srednie_spalenie,skrzynia_biegow,ilosc_miejsc,pojemnosc_bagaznika,zasieg FROM specyfikacja_samochodu 
    INNER JOIN samochod ON specyfikacja_samochodu.id_specyfikacja_samochodu=samochod.id_specyfikacja_samochodu
     WHERE :vin=vin');
    $sth ->bindValue(':vin',$vin,PDO::PARAM_STR);
    $sth->execute();

    if
    ($sth ->rowCount() != 0){
       $response = $sth->fetchAll();
       $data = json_encode($response);
       echo $data;
   }
    
?>