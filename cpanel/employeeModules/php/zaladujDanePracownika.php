<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';

    $data = $_POST["id"];
    
    try{
        $sth = $db->prepare("Call zaladuj_pracownika(:id)");
        $sth ->bindValue(":id",$data,PDO::PARAM_INT);
        $sth ->execute();

        if($sth ->rowCount() != 0){
            $response = $sth->fetchAll();
            $response_data = json_encode($response);
            echo $response_data;
        }
        else{
            echo "Nie znaleziono pracownika";
        }    
    }
    catch(Exception $e){
        echo "Wystąpił błąd "+$e->getMessage();
    }
    

?>