<?php 
session_start();              //ouverture de la séance.
require_once 'db.php';

if(!isset($_SESSION['user']))
{
    header('Location:index3.php'); 
    die();
}

$email = $_SESSION['user'];
$prof = $bdd->prepare('SELECT * FROM comptes WHERE email = ?');
$prof->execute(array($email));
$data_prof = $prof->fetch();

$prenom = $data_prof['prénom'] ;
$com = ($_POST['com']); 
$ncom = $_GET['id'];

$ajout = $bdd->prepare("INSERT INTO commentaires (`commentaire1`,`ncommande`,`date`,`qui`) VALUES ('$com','$ncom',now(),'$prenom');");
$res=$ajout->execute();

if($res)
{ 
  header('Location:leparrain.php?com=oui');
}else
{
  header('Location:leparrain.php?com=non');
} 