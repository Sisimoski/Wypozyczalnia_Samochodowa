<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

    try{
        $sth = $db->prepare('call zaladuj_akceptacje_opinii(); ');
        $sth->execute();
        if($sth->rowCount() != 0){
            $response = $sth->fetchAll();
            $data = json_encode($response);
            echo $data;
    }
    else{
        echo 'Brak opinii do zaakceptowania';
    }
    }
    catch(Exception $e){
        echo "Wystąpił błąd"+ $e->getMessage();
    }


?>