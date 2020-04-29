<?php 
    session_start();
    require_once("../php/config.php");
    $idSession = $_SESSION['id'];

    $searchResult= ($_POST['searchResult']);

    $searchLink = '/oferty.php?page=1&searchResult='.$searchResult;
    echo $searchLink;
?>