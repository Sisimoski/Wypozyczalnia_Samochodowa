<?php 
    session_start();
    require_once("../php/config.php");
    $idSession = $_SESSION['id'];

    $searchResult= ($_POST['searchResult']);

    $searchLink = '/oferty.php?page=1&searchResult='.$searchResult;
    echo $searchLink;
 
    
//     $sth = $db->prepare('SELECT vin FROM samochod
//     INNER JOIN specyfikacja_samochodu ON specyfikacja_samochodu.id_specyfikacja_samochodu=samochod.id_specyfikacja_samochodu WHERE producent LIKE ‘%.'$'.%’ OR
//     model LIKE ‘%di%’ OR producent LIKE ‘%di%’ OR producent LIKE ‘%di%’;');
//     $sth ->bindValue(':id_klient',$idSession,PDO::PARAM_STR);
//     $sth->execute();
    

//    if
//     ($sth ->rowCount() != 0){
//        $response = $sth->fetchAll();
//        $data = json_encode($response);
//        echo $data;
//    }



?>