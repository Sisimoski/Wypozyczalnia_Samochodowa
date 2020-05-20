<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';
    
    $data = date('Y-m-d');

    $sth = $db->prepare("DELETE FROM kody_rabatowe WHERE data_waznosci < :data");
    $sth -> bindValue(":data",$data,PDO::PARAM_STR);
    $sth->execute();

    $sth = $db->prepare("SELECT * FROM kody_rabatowe");
    $sth->execute();

    if($sth->rowCount() != 0){
        $response = $sth->fetchAll();
        $data = json_encode($response);
        echo $data;
}
else{
    echo "Brak Kodów Rabatowych";
}

?>