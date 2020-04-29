<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

    $sth =$db->prepare("SELECT vin, samochod.id_specyfikacja_samochodu, producent, model, segment,cena_brutto, rok, pojemnosc_silnika, moc, typ_silnika, skrzynia_biegow, fotografia FROM samochod 
    INNER JOIN specyfikacja_samochodu ON specyfikacja_samochodu.id_specyfikacja_samochodu = samochod.id_specyfikacja_samochodu WHERE czy_posiadany = 1  ORDER BY samochod.id_specyfikacja_samochodu ASC limit 6");
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