<?php 
    session_start();
    require_once("../php/config.php");



    if(isset(($_POST['yearFilter'])))
    {
        $producent= ($_POST['producentFilter']);
        $model= ($_POST['modelFilter']);
        $rok= ($_POST['yearFilter']);
        $searchResult= $producent.'&modelF='.$model.'&rokF='.$rok;
 
    }
    else if(isset($_POST['modelFilter']) ){
        $producent= ($_POST['producentFilter']);
        $model= ($_POST['modelFilter']);
        $searchResult= $producent.'&modelF='.$model;
    }
    else{
        $producent= ($_POST['producentFilter']);
        $searchResult= $producent;
    }

    $searchLink = '/oferty.php?page=1&producentF='.$searchResult;
   
    echo $searchLink;
?>