<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';
    $idCar = $_POST["id"];

    $sth = $db->prepare("call zaladuj_auto(:id)");
    $sth -> bindValue(":id",$idCar,PDO::PARAM_INT);
    $sth -> execute();

    $result = $sth->fetch(PDO::FETCH_ASSOC);
    
    if($result){
        $data = json_encode($result);
        echo $data;
    }
    else{
        echo "Nie znaleziono takiego pojazdu";
    }

?>