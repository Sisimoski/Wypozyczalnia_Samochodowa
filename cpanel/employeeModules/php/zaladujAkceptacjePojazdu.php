<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

    $id = $_POST["id"];

    try{
        $sth = $db->prepare('CALL zaladuj_akceptacje_kontrola(:id)');
        $sth ->bindValue(":id",$id,PDO::PARAM_INT);
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


