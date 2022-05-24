<?php
  try 
  {
      $bdd = new PDO("mysql:host=localhost;dbname=lpcomm03_lpcommande;charset=utf8", "lpcomm03_lpcommande", "Elj]T!eSaA1K)rZJ*,a0ALPvA");
      //$bdd est une instance PDO qui représente la connexion à la base 
  }
  catch(PDOException $e)                                    //capturer l'exception en cas d'erreur
  {
      die('Connexion Erreur : '.$e->getMessage());            //et afficher uniquement l'erreur 
  }
 
  //le try catch est fait afin d'éviter un affichage complet de l'erreur ce qui revelerai le mot de passe de la databasse et ainsi que son nom d'utilisateur.
  ?>