<?php
     session_start();
     require_once("../../php/config.php");
     $idSession = $_SESSION['id'];

           
         $sth = $db->prepare('SELECT specyfikacja_samochodu.producent, specyfikacja_samochodu.model, wypozyczenie.id_wypozyczenia, wypozyczenie.data_zlozenia, wypozyczenie.czy_oplacono, wypozyczenie.data_odbioru, wypozyczenie.data_zwrotu, wypozyczenie.czy_zrealizowano  
         FROM wypozyczenie
                 INNER JOIN wypozyczony_samochod ON wypozyczony_samochod.id_wypozyczenia = wypozyczenie.id_wypozyczenia
                 INNER JOIN samochod ON  samochod.vin = wypozyczony_samochod.vin
                 INNER JOIN specyfikacja_samochodu ON specyfikacja_samochodu.id_specyfikacja_samochodu = samochod.id_specyfikacja_samochodu
                  WHERE wypozyczenie.id_uzytkownik = :id_klient AND wypozyczenie.czy_zrealizowano = 0');
         $sth ->bindValue(':id_klient',$idSession,PDO::PARAM_STR);
         $sth->execute();
         

        if
         ($sth ->rowCount() != 0){
            $response = $sth->fetchAll();
            $data = json_encode($response);
            echo $data;
        }
       
?>