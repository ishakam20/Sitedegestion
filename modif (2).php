<?php 
// ATTENTION !!! ne pass toucher à ce bout de code //
    session_start();              //ouverture de la séance.
    require_once 'db.php';

    if(isset($_GET['id']))
    {
    $id=$_GET['id'];
    $nom = ($_POST['nom']);
    $prenom = ($_POST['prenom']);
    $statut = ($_POST['statut']);
    $adresse = ($_POST['adresse']);
    $num = ($_POST['num']);
    $produit = ($_POST['produit']);
    $prix = ($_POST['prix']);
    $liv = ($_POST['liv']);
    $total = ($_POST['total']);
    $agent = ($_POST['agent']);

    $sql2 = "UPDATE commande SET `nomc`='".$nom."',`prec`='".$prenom."',`adresse`='".$adresse."',`num`='".$num."',`prod`='".$produit."', 
    `prix`='".$prix."',`total`='".$total."',`agent`='".$agent."',`liv`='".$liv."',`etat`='".$statut."' WHERE ncom ='".$id."'";
    $exec2 = $bdd->query($sql2) ;

    }

    if($exec2)
    { 
      if($id>25 and $id<51)
      {header('Location:leparrain2.php?modif=oui'); 
      }else if($id>50)
      {header('Location:leparrain3.php?modif=oui'); 
      }else{
      header('Location:leparrain.php?modif=oui');
      }
    }else
    {
      header('Location:leparrain.php?modif=non');
    } 


?>