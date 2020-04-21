<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';


    $id = $_POST["id"];
    //USUWANIE KONTA
    try{
        $sth = $db->prepare("Call usun_pracownika(:id)");
        $sth -> bindValue(":id",$id,PDO::PARAM_INT);
        $sth -> execute();
        echo "Usunięto pracownika";
    }
    catch(Exception $e){
        echo "Wystąpił błąd"+ $e->getMessage();
    }


    

?>

