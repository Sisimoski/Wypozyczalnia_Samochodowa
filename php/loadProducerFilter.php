<?php 
    //ładowanie filtrów  producentow dla samochodów w karcie oferty
    require_once("../php/config.php");

        $sth = $db->prepare('SELECT  DISTINCT producent FROM specyfikacja_samochodu ORDER BY producent ASC');
        $sth->execute();
        if
        ($sth ->rowCount() != 0){
            $response = $sth->fetchAll();
            $data = json_encode($response);
            echo $data;

        }
   

?>