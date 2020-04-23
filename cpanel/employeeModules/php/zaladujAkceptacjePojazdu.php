<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

    $vin = $_POST["vin"];

    try{
        $sth = $db->prepare('CALL zaladuj_akceptacje_kontrola(:vin)');
        $sth ->bindValue(":vin",$vin,PDO::PARAM_STR);
        $sth->execute();
        if($sth->rowCount() != 0){
            $response = $sth->fetchAll();
            $data = json_encode($response);
            echo $data;
    }
    else{
        echo 'Błąd załadowanie pojazdu';
    }
    }
    catch(Exception $e){
        echo "Wystąpił błąd"+ $e->getMessage();
    }


?>


