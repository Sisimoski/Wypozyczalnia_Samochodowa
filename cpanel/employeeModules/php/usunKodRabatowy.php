<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/php/config.php';
    $id = $_POST["id"];

    $sth = $db->prepare("DELETE FROM kody_rabatowe WHERE id_kodu = {$id}");   
    $sth->execute();
    echo "Usunięto Kod Rabatowy";
?>