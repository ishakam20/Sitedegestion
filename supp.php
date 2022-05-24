<?php 
// ATTENTION !!! ne pass toucher à ce bout de code //
    session_start();              //ouverture de la séance.
    require_once 'db.php';

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $sql = "DELETE FROM `commande` WHERE `commande`.`ncom` = '$id' " ;
        $exec = $bdd->query($sql) ;
    }

    if($exec)
    { 
      header('Location:leparrain.php?supp=oui');
    }else
    {
      header('Location:leparrain.php?supp=non');
    } 
