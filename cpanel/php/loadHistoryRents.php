<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

    $dataOd = $_POST["dataOd"];
    $dataDo = $_POST["dataDo"];
    $id = $_SESSION["id"];

    $sth = $db->prepare('CALL historia_pojazdow(:od,:do, :id)');
    $sth ->bindValue(':od',$dataOd,PDO::PARAM_STR);
    $sth ->bindValue(':do',$dataDo,PDO::PARAM_STR);
    $sth ->bindValue(':id',$id,PDO::PARAM_INT);
    $sth->execute();
    if($sth->rowCount() != 0){
        $response = $sth->fetchAll();
        $data = json_encode($response);
        echo $data;
    }
    else{
        echo 'Brak pojazdow';
    }


?>