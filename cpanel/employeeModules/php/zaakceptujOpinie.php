<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';
    $id = $_POST["id"];
    try{
    $sth = $db->prepare("UPDATE opinia SET czy_zatwierdzona = 1 WHERE id_opinia = {$id}");
    $sth->execute();
    echo "Zaakceptowano Opinie";    
    
    }
    catch(Exception $e){
        echo "Wystąpił błąd"+ $e->getMessage();
    }

?>