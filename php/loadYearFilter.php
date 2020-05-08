<?php 
    //ładowanie filtrów  roku dla samochodów w karcie oferty
    require_once("../php/config.php");

        $model= ($_POST['modelFilter']);
        $sth = $db->prepare('SELECT  DISTINCT rok FROM specyfikacja_samochodu WHERE model=:model ORDER BY rok ASC');
        $sth ->bindValue(':model',$model,PDO::PARAM_STR);
        $sth->execute();
        if
        ($sth ->rowCount() != 0){
            $response = $sth->fetchAll();
            $data = json_encode($response);
            echo $data;
        }
   

?>