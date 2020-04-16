<?php
        session_start();
        require_once("../../php/config.php");
        $idSession = $_SESSION['id'];
        $vin= ($_POST['vin']);
        $producentEdit= ($_POST['producentEdit']);
        $modelEdit= ($_POST['modelEdit']);
        $rok_produkcjiEdit= ($_POST['rok_produkcjiEdit']);
        $kolorEdit= ($_POST['kolorEdit']);
        $opisEdit= ($_POST['opisEdit']);

        $sth = $db->prepare('SELECT  id_specyfikacja_samochodu FROM samochod WHERE vin=:vin');
        $sth ->bindValue(':vin',$vin,PDO::PARAM_STR);
        $sth->execute();
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        $id_specyfikacja_samochodu = $result['id_specyfikacja_samochodu'];
  

        $sth = $db->prepare('UPDATE specyfikacja_samochodu SET producent=:producentEdit,model=:modelEdit,rok=:rok_produkcjiEdit,kolor=:kolorEdit,opis=:opisEdit       
         WHERE id_specyfikacja_samochodu=:id_specyfikacja_samochodu');
        $sth ->bindValue(':producentEdit',$producentEdit,PDO::PARAM_STR);
        $sth ->bindValue(':modelEdit',$modelEdit,PDO::PARAM_STR);
        $sth ->bindValue(':rok_produkcjiEdit',$rok_produkcjiEdit,PDO::PARAM_STR);
        $sth ->bindValue(':kolorEdit',$kolorEdit,PDO::PARAM_STR);
        $sth ->bindValue(':opisEdit',$opisEdit,PDO::PARAM_STR);
        $sth ->bindValue(':id_specyfikacja_samochodu',$id_specyfikacja_samochodu,PDO::PARAM_STR);
        $sth->execute();
?>