<?php 
    session_start();
    require_once("../../php/config.php");
    $idSession = $_SESSION['id'];


    
    $sth = $db->prepare('DELETE FROM specyfikacja_samochodu WHERE id_specyfikacja_samochodu=:id_specyfikacja_samochodu');
    $sth ->bindValue(':id_specyfikacja_samochodu',$id_specyfikacja_samochodu,PDO::PARAM_STR);
    $sth->execute();

    $sth = $db->prepare('DELETE FROM samochod WHERE vin=:vin');
    $sth ->bindValue(':vin',$vin,PDO::PARAM_STR);
    $sth->execute();

     echo "Pomyślnie usunięto konto";

?>