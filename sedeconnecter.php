<?php 
    session_destroy();                   //la détruire
    header('Location:login.php');        //Redériger vers login.php
    die();
?>