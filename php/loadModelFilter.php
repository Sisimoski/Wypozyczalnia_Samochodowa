<?php 
    //ładowanie filtrów  modeli dla samochodów w karcie oferty
    require_once("../php/config.php");

        $producent = ($_POST['producentFilter']);
        $sth = $db->prepare('SELECT  DISTINCT model FROM specyfikacja_samochodu WHERE producent=:producent ORDER BY model ASC');
        $sth ->bindValue(':producent',$producent ,PDO::PARAM_STR);
        $sth->execute();
        if
        ($sth ->rowCount() != 0){
            $response = $sth->fetchAll();
            $data = json_encode($response);
            echo $data;
        }
   

?>