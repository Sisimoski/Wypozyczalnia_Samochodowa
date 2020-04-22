<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

    $dataOd = $_POST["dataOd"];
    $dataDo = $_POST["dataDo"];
    $data[] = array();

    $sth = $db->prepare('CALL status_pojazdow(:od,:do)');
    $sth ->bindValue(':od',$dataOd,PDO::PARAM_STR);
    $sth ->bindValue(':do',$dataDo,PDO::PARAM_STR);
    $sth->execute();
    if($sth->rowCount() != 0){
        $response = $sth->fetchAll();
        var_dump($response);
        $data = json_encode($response);
        echo $data;
    }
    else{
        echo 'Brak pojazdow';
    }
   
    //$idAdres = $db->lastInsertID();




?>