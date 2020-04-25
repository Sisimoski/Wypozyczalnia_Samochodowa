<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

    $sth =$db->prepare("SELECT vin, id_specyfikacja_samochodu, producent, model, segment, sredni_koszt_wynajmu, rok, pojemnosc_silnika, moc, typ_silnika, skrzynia_biegow FROM samochod 
    INNER JOIN specyfikacja_samochodu ON specyfikacja_samochodu.id_specyfikacja_samochodu = samochod.id_specyfikacja_samochodu limit 6 ASC ");
    $sth -> execute();

    if($sth ->rowCount() != 0){
        $response = $sth->fetchAll();
        $data = json_encode($response);
        echo $data;
    }
    else{
        echo "Brak Pojazdów w Bazie!";
    }



?>