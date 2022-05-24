<?php 
session_start();              //ouverture de la séance.
require_once 'db.php';

$nom = ($_POST['nom']);
$prenom = ($_POST['prenom']);
$adresse = ($_POST['adresse']);
$num = ($_POST['num']);
$produit = ($_POST['produit']);
$prix = ($_POST['prix']);
$liv = ($_POST['liv']);
$total = ($_POST['total']);
$agent = ($_POST['agent']);

$ajout = $bdd->prepare("INSERT INTO commande (`datec`,`nomc`,`prec`,`adresse`,`num`,`prod`,`prix`,`total`,`agent`,`liv`,`etat`) VALUES (now(),'$nom ','$prenom','$adresse','$num','$produit','$prix','$total','$agent','$liv','En attente') ;");
$res=$ajout->execute();

if($res)
{ 
$destinataire = 'ishakamine76@gmail.com';
$expediteur = 'leparrain.contact@gmail.com';
$copie = 'yacinehaired@yahoo.fr';
$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
$headers .= 'From: "Le Parrain"<'.$expediteur.'>'."\n"; // Expediteur
$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire   
$headers .= 'Cc: '.$copie."\n"; // Copie Cc
$message = 'Une commande a été ajouté sur le site lpcommande.com/login !';
$objet = 'Ajout de commande' ; // Objet du message
mail($destinataire, $objet, $message, $headers);
header('Location:leparrain.php?depot=oui');
}else
{
  header('Location:leparrain.php?depot=non');
} 



