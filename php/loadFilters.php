<?php 
    //ładowanie filtrów dla samochodów w karcie oferty
    require_once("../php/config.php");


    $sth = $db->prepare('SELECT  DISTINCT producent,model,rok FROM specyfikacja_samochodu');
    $sth->execute();
         
    if
    ($sth ->rowCount() != 0){
        $response = $sth->fetchAll();
        $data = json_encode($response);
        echo $data;
    }


?>