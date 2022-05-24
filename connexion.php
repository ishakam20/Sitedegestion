<?php 
// ATTENTION !!! ne pass toucher à ce bout de code //
    session_start();              //ouverture de la séance.
    require_once 'db.php';       //appel de la database

    if(!empty($_POST['email']) && !empty($_POST['mdp']))    //si les deux champs sont remplis
    {
        $email = ($_POST['email']);
        $password = ($_POST['mdp']);

        $stmt = $bdd->prepare('SELECT * FROM comptes WHERE email = ?');  //le prepare prépare une requête à l'exécution et retourne un objet PDOStatement qui est $stmt dans ce cas.
        $stmt->execute(array($email));               //executer le pdo statement qui est stmt
        $data = $stmt->fetch();                //$data est de type Array et contient le résultat du fetch
        $row = $stmt->rowCount();         // rowCount retourne le nombre de lignes affectées par le dernier appel à la fonction PDOStatement::execute()


        if($row == 1)                //si 1 ligne est affecté c.à.d l'émail est selectionné et donc existe dans la base de donnée
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))         //vérifier qque c'est une adresse valide.
            {
                
                if($password === $data['mdp'])       //si le mot de passe est bon.
                {
                   //création des variables de session.
                    $_SESSION['user'] = $data['email'];
                    header('Location: leparrain.php');          //aller vers l'espace membre
                    die();
                }else{ header('Location: login.php?login_err=password'); die(); } //sinon, une erreur dans le mot de passe.
            }else{ header('Location: login.php?login_err=email'); die(); }    //sinon, une erreur dans l'email et die.
        }else{ header('Location: login.php?login_err=nonexistant'); die(); }   //sinon, le user n'existe pas
        //à chaque fois redériger vers la page index.
    }
?>