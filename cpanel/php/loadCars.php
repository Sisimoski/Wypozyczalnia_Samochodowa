<?php
     session_start();
     require_once("../../php/config.php");
     $idSession = $_SESSION['id'];

           
         $sth = $db->prepare('SELECT producent,numer_tablicy_rejestracyjnej,czy_posiadany,vin FROM samochod
         INNER JOIN specyfikacja_samochodu ON specyfikacja_samochodu.id_specyfikacja_samochodu=samochod.id_specyfikacja_samochodu
         WHERE id_klient = :id_klient');
         $sth ->bindValue(':id_klient',$idSession,PDO::PARAM_STR);
         $sth->execute();

         if
         ($sth ->rowCount() != 0){
            $response = $sth->fetchAll();
            $data = json_encode($response);
            echo $data;
        }
        else{
           // $data = array[{"producent":"brak","0":"brak","numer_tablicy_rejestracyjnej":"brak","1":"brak","czy_posiadany":"brak","2":"brak","vin":"brak","3":"brak"}];
         //  $data = json_encode($response);
         
        }

      
        
        
?>