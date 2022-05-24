<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <title>Le Parrain-Commandes</title>
</head>

<body>
   <!-- <nav class="navbar navbar-expand-lg  ">
        <a class="navbar-brand" href="#"><img src="logo2.PNG" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="height: 100px;">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Livrées</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#"> En cours </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Echecs</a>
                </li>
            </ul>
            <form class="form-inline my-10my-lg-0">
                <a class="form-control mr-sm-2" href="" data-toggle="modal" data-target="#myModal"><i
                        class="fa fa-plus-circle" aria-hidden="true"></i></a>
                <a class="form-control mr-sm-2" href="" data-toggle="modal" data-target="#myModal"><i class="fa fa-bell"
                        aria-hidden="true"></i></a>
            </form>
        </div>
    </nav>-->

    <div class="card">
        <div class="card_top">
            <img class="card_img" src="logo2.PNG">
        </div>

        <div class="card-body">
            <hr>
            <h5 class="card-title">Connectez vous </h5>
            <p class="card-text">Veuillez remplir les champs ci-dessous avec vos cordonnées.</p>
<hr>
            <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="connexion.php">
                <?php
                    if(isset($_GET['login_err'])){
                        $err = htmlspecialchars($_GET['login_err']);
                        switch($err){
                            case 'password':
                                
                                echo "<div class='alert alert-danger' role='alert'>Le mot de passe ou l'émail est incorrecte.</div>";
                             break;
                
                            case 'email':
                                echo "<div class='alert alert-danger' role='alert'>Le mot de passe ou l'émail est incorrecte.</div>";
                              break; 
                
                            case 'nonexistant' :
                                echo "<div class='alert alert-danger' role='alert'>Le mot de passe ou l'émail est incorrecte.</div>";
                              break;
                            
                            case 'notyet' :
                                echo "<div class='alert alert-danger' role='alert'>Vous n'avez pas accès à ce compte.</div>";
                        }
                    }
                ?>
        
                <div class="form-group col-md-12 ">
                  <label class="col-sm-12 ">Adresse mail </label>
                    <div class="col-sm-12 ">
                        <input name="email" type="text " placeholder="Emai"
                            class="form-control form-control-line">
                    </div>
                </div>
                <div class="form-group col-md-12 ">
                    <label class="col-sm-12 ">Mot de passe </label>
                    <div class="col-sm-12 ">
                        <input name="mdp" type="password" placeholder="Mot de passe " class="form-control form-control-line">
                    </div>
                </div>
                <br>
                <button class="btn2" id="conn" name="submit">
							Se connecter
				</button>
                </form>
        </div>
        
    </div>
    

</body>