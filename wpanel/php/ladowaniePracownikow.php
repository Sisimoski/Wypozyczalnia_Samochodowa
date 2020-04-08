<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

    $sth = $db -> prepare("CALL zaladuj_pracownikow()");
    $sth -> execute();

    if($sth ->rowCount() != 0){
        $response = $sth->fetchAll();
        $data = json_encode($response);
        echo $data;
    }
    else{
        echo "Brak Pracownikow";
    }
?>