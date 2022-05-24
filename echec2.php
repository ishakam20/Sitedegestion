<?php

session_start();              //ouverture de la séance.
require_once 'db.php';

    $com = $bdd->prepare("SELECT * FROM commande WHERE etat ='Echec' AND ncom BETWEEN 26 AND 50 ");
    $com->execute();
    $data_com2 = $com->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <title>Le Parrain-Commandes</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg  ">
        <a class="navbar-brand" href="#"><img src="logo2.PNG" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="height: 100px;">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="leparrain.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="enattente.php">En attente</a>
                </li>
                <li class="nav-item">
                    <a href="liv.php" class="nav-link" >Livrées</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="encours.php"> En cours  </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="echec.php">Echecs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="mescommandes.php">Mes commandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="sedeconnecter.php">Se deconnecter</a>
                </li>
            </ul>
            <form class="form-inline my-10my-lg-0">
                <a class="form-control mr-sm-2" href="" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle" aria-hidden="true" ></i></a>
            </form>
        </div>
    </nav>
    <div class="container col-md-10 ">
        <div class="alert alert-primary" role="alert">
            Insérez vos commandes ici ! :)
        </div>
        <h2> Commandes </h2>
        <hr>
        <div class="pagnation">
            <nav aria-label="...">
            <ul class="pagination">
                    <li class="page-item ">
                        <a class="page-link" href="echec.php">Début</a>
                    </li>
                    <li class="page-item "><a class="page-link" href="echec.php">1</a></li>
               
                    <li class="page-item active "><a class="page-link" href="echec2.php">2</a></li>
                    <span class="sr-only">(cur4rent)</span>
                    <li class="page-item">
                        <a class="page-link" href="echec.php">Fin</a>
                    </li>
                </ul>

            </nav>
        </div>
        <hr>
        <table class="table table-striped table-responsive-xl">
            <thead>
                <tr id="header">
                    <th>No commande</th>
                    <th>Statut</th>
                    <th>Client</th>
                    <th>Adresse</th>
                    <th>Agent</th>
                    <th>Commentaire</th>
                    <th colspan="3">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach( $data_com2 as $d )
                {   
                    ?>
                <tr>
                    <td><?php echo $d['ncom'] ?> </td>
                    <?php if($d['etat']=='En attente')
                    {?>
                    <td><button class="btn btn-outline-dark" id="stat" value="En attente">En attente</button></td>
                    <?php }elseif($d['etat']=='Livré')
                    { ?>
                    <td><button class="btn btn-outline-dark" id="stat" value="Livré">Livré</button></td>
                    <?php }elseif($d['etat']=='En cours')
                    {  ?>
                    <td><button class="btn btn-outline-dark" id="stat" value="En cours">En cours</button></td>
                    <?php }elseif($d['etat']=='Echec')
                    {  ?>
                    <td><button class="btn btn-outline-dark" id="stat" value="Echec">Echec</button></td>
                    <?php }elseif($d['etat']=='Livré Payé')
                    { ?>
                    <td><button class="btn btn-outline-dark" id="stat" value="Livré Payé">Livré Payé</button></td>
                    <?php } ?>
                    <td><?php echo $d['nomc']."\n".$d['prec'] ?></td>
                    <td><?php echo $d['adresse'] ?></td>
                    <td><?php echo $d['agent'] ?></td>
                    <td><a href="" data-toggle="modal" data-target="#myModal4<?=$d['ncom']?>"><button type="button " class="btn btn-primary " id="save ">Commentaires</button></a></td>
                    <td><a href="" data-toggle="modal" data-target="#myModal3<?=$d['ncom']?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                    <td><a href="" data-toggle="modal" data-target="#myModal2<?=$d['ncom']?>"><i class="fa fa-pencil-square-o" aria-hidden="true" ></i></a></td>
                    <td><a href="supp.php?id=<?=$d['ncom']?>" onclick="alerte()"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                </tr>
                                <!-- POP UP DES COMMENTAIRES -->
                                <div class="modal fade" id="myModal4<?=$d['ncom']?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h5 class="modal-title ">Les commentaires de la commande</h5>
                    <button type="button " class="close " data-dismiss="modal " aria-label="Close ">
                <span aria-hidden="true ">&times;</span>
     </button>
                <?php 
                $ncom = $d['ncom'] ;
                $coment = $bdd->prepare("SELECT * FROM commentaires where ncommande = $ncom ");
                $coment->execute();
                $data_coment = $coment->fetchAll();
                ?>
                
                </div>
                <div class="modal-body ">
                    <div class="commande ">
                        <div class="form-group col-md-12 ">
                            <?php foreach($data_coment as $d1)
                            { ?>
                            <label class="col-sm-12 "><?php echo $d1['qui']."\n".$d1['date'] ?></label>
                            <div class="col-sm-12 ">
                                <input type="text"  value=<?php echo $d1['commentaire1']?> class="form-control form-control-line" disabled>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="modal-footer ">
                    <a data-toggle="modal" data-target="#myModal5<?=$d['ncom']?>"><button type="button " class="btn btn-primary " id="save ">Ajouter commentaire</button></a>
                </div>
                </div>               
            </div>
        </div>
    </div>

                    <!-- POP UP DES COMMENTAIRES2 -->
                    <div class="modal fade" id="myModal5<?=$d['ncom']?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h5 class="modal-title ">Ajouter un commentaire</h5>
                    <button type="button " class="close " data-dismiss="modal" aria-label="Close ">
                <span aria-hidden="true ">&times;</span>
     </button>
                </div>
                <div class="modal-body ">
                <form method="POST" action="ajoutcom.php?id=<?=$d['ncom']?>">
                    <div class="commande ">
                        <div class="form-group col-md-12 ">
                            <label class="col-sm-12 ">Inserez un commentaire</label>
                            <div class="col-sm-12 ">
                                <input type="text"  name="com" class="form-control form-control-line" ></input>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                    <a href="ajoutcom.php?id=<?=$d['ncom']?>"><button type="submit " class="btn btn-primary " id="save ">Enregistrer modifications</button></a>
                </div>
                </div>               
            </div>
        </div>
    </div>
                    </form>
                <!-- POP UP MODIFICATION -->
                <div class="modal fade" id="myModal2<?=$d['ncom']?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h5 class="modal-title ">Modifier une commande</h5>
                    <button type="button " class="close " data-dismiss="modal " aria-label="Close ">
                <span aria-hidden="true ">&times;</span>
     </button>
                </div>
                <div class="modal-body ">
                <form method="POST" action="modif.php?id=<?=$d['ncom']?>">
                    <div class="commande ">
                        <div class="det ">
                            <span id="det ">Détails commande</span>
                        </div><br>
                        <div class="form-group col-md-12 ">
                            <label class="col-sm-12 ">Numéro de commande </label>
                            <div class="col-sm-12 ">
                                <input type="text" placeholder="Numéro de commande" value=<?php echo $d['ncom']?> class="form-control form-control-line" disabled>
                            </div>
                        </div>
                            <div class="form-group col-md-6 ">
                                <label class="col-sm-12 ">Statut de la commande </label>
                                <select name="statut" class="form-control form-control-line">
                                <option selected="selected" value="<?=$d['etat']?>"><?=$d['etat']?></option>
                                    <option>Livré Payé</option>
                                    <option>Livré</option>
                                    <option>Echec</option>
                                    <option>En cours </option>
                                    <option>En attente</option>
                                </select>
                            </div>
                            
                        </div>
                        <hr>
                    </div>
                    <div class="client">
                        <div class="det">
                            <span id="det">Détails client</span>
                        </div><br>


                        <div class="form-group row ">
                            <div class="form-group col-md-6">
                                <label class="col-sm-12 ">Nom du client </label>
                                <div class="col-sm-12 ">
                                    <textarea type="text" name="nom" placeholder="Nom " class="form-control form-control-line"> <?php echo $d['nomc'] ?> </textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-sm-12 ">Prénom du client </label>
                                <div class="col-sm-12 ">
                                    <input type="text" name="prenom" placeholder="Prénom" value=<?php echo $d['prec'] ?>  class="form-control form-control-line">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="form-group col-md-6 ">
                                <label class="col-sm-12 ">Adresse du client </label>
                                <div class="col-sm-12 ">
                                    <textarea type="text " name="adresse" placeholder="Adresse "class="form-control form-control-line"> <?php echo $d['adresse'] ?> </textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label class="col-sm-12 ">N° Tel du client </label>
                                <div class="col-sm-12 ">
                                    <textarea type="tel" name="num" placeholder="Tel "  class="form-control form-control-line"> <?php echo $d['num'] ?> </textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="produit ">
                        <div class="det ">
                            <span id="det ">Infos commande</span>
                        </div><br>


                        <div class="form-group row ">
                            <div class="form-group col-md-12 ">
                                <label class="col-sm-12 ">Produit + taille</label>
                                <div class="col-sm-12 ">
                                    <textarea type="text" name="produit" placeholder="Produit "  class="form-control form-control-line"> <?php echo $d['prod'] ?>  </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="form-group col-md-4 ">
                                <label class="col-sm-12 ">Prix </label>
                                <div class="col-sm-12 ">
                                    <input type="number" name="prix" placeholder="Prix " value=<?php echo $d['prix'] ?>  class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group col-md-4 ">
                                <label class="col-sm-12 "> Frais de livraison </label>
                                <div class="col-sm-12 ">
                                    <input type="number" name="liv" placeholder="Frais de livraison" value=<?php echo $d['liv'] ?>  class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group col-md-4 ">
                                <label class="col-sm-12 "> Total à payer </label>
                                <div class="col-sm-12 ">
                                    <input type="number" name="total" placeholder="Total " value=<?php echo $d['total'] ?>  class="form-control form-control-line">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6 ">
                                <label class="col-sm-12 ">Commentaire </label>
                                <div class="col-sm-12 ">
                                    <textarea name="com" type="text" placeholder="Commentaire " class="form-control form-control-line"> <?php echo $d['commentaire'] ?> </textarea>
                                </div>
                            </div>
                        <div class="form-group row ">
                            <div class="form-group col-md-12 ">
                                <label class="col-sm-12 ">Agent responsable</label>
                                <div class="col-sm-12 ">
                                    <input type="text" name="agent" placeholder="Agent responsable " value=<?php echo $d['agent'] ?>  class="form-control form-control-line">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                    <a href="modif.php?id=<?=$d['ncom']?>"><button type="button " class="btn btn-primary " id="save ">Enregistrer modifications</button></a>
                    <button type="button " class="btn btn-secondary " id="annuler " data-dismiss="modal ">Annuler</button>
                </div>
                </div>
               
            </div>
        </div>
    </div>
                    </form>
    
         <!-- POP UP Consultation -->
         <div class="modal fade" id="myModal3<?=$d['ncom']?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title ">Consulter commande</h5>
                    <button type="button " class="close " data-dismiss="modal " aria-label="Close">
            <span aria-hidden="true ">&times;</span>
          </button>
                </div>
                <div class="modal-body">
                    <div class="commande">
                        <div class="det">
                            <span id="det">Détails commande</span>
                        </div><br>

                        <div class="form-group row ">
                            <div class="form-group col-md-4 ">
                                <label class="col-sm-12 ">Numéro de commande </label>
                                <div class="col-sm-12 ">
                                    <input type="text " placeholder="Numéro de commande " class="form-control form-control-line " disabled value=<?php echo $d['ncom']?>>
                                </div>
                            </div>
                            <div class="form-group col-md-4 ">
                                <label class="col-sm-12 ">Date de création </label>
                                <div class="col-sm-12 ">
                                    <input type="text " class="form-control form-control-line " aria-current="date " disabled value=<?php echo $d['datec']?>>

                                </div>
                            </div>
                        </div>

                        <hr>
                    </div>
                    <div class="client ">
                        <div class="det ">
                            <span id="det ">Détails client</span>
                        </div>
                        <br>


                        <div class="form-group row ">
                            <div class="form-group col-md-3 ">
                                <label class="col-sm-12 ">Nom du client </label>
                                <div class="col-sm-12 ">
                                <textarea type="text " placeholder="Nom " class="form-control form-control-line" disabled> <?php echo $d['nomc']?>  </textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-3 ">
                                <label class="col-sm-12 ">Prénom du client </label>
                                <div class="col-sm-12 ">
                                <textarea type="text " placeholder="Prénom " class="form-control form-control-line" disabled> <?php echo $d['prec']?> </textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-3 ">
                                <label class="col-sm-12 ">Adresse du client </label>
                                <div class="col-sm-12 ">
                                <textarea type="text " placeholder="Adresse " class="form-control form-control-line"  disabled> <?php echo $d['adresse']?></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-3 ">
                                <label class="col-sm-12 ">N° Tel du client </label>
                                <div class="col-sm-12 ">
                                <textarea type="tel " placeholder="Tel " class="form-control form-control-line"  disabled> <?php echo $d['num']?> </textarea>
                                </div>
                            </div>
                        </div>

                        <hr>
                    </div>
                    <div class="produit ">
                        <div class="det ">
                            <span id="det ">Infos commande</span>
                        </div><br>


                        <div class="form-group row ">
                            <div class="form-group col-md-6 ">
                                <label class="col-sm-12 ">Produit + taille </label>
                                <div class="col-sm-12 ">
                                    <textarea type="text " placeholder="Produit " class="form-control form-control-line" disabled> <?php echo $d['prod']?> </textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-6 ">
                                <label class="col-sm-12 ">Prix </label>
                                <div class="col-sm-12 ">
                                <textarea  type="number " placeholder="Prix " class="form-control form-control-line" disabled> <?php echo $d['prix']?> </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row ">

                            <div class="form-group col-md-4 ">
                                <label class="col-sm-12 "> Frais de livraison </label>
                                <div class="col-sm-12 ">
                                <textarea type="number " placeholder="Frais de livraison " class="form-control form-control-line" disabled> <?php echo $d['liv']?> </textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-4 ">
                                <label class="col-sm-12 "> Total à payer </label>
                                <div class="col-sm-12 ">
                                <textarea type="number " placeholder="Total " class="form-control form-control-line" disabled> <?php echo $d['total']?> </textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-4 ">
                                <label class="col-sm-12 ">Agent responsable</label>
                                <div class="col-sm-12 ">
                                <textarea type="text " placeholder="Agent responsable " class="form-control form-control-line" disabled> <?php echo $d['agent']?></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer ">
                    <button type="button " class="btn btn-primary " id="save " data-dismiss="modal">OK </button>

                </div>
            </div>
        </div>

                <?php } ?>
            </tbody>

        </table>

    </div>

    <!-- POP UP AJOUT -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h5 class="modal-title ">Ajouter une commande</h5>
                    <button type="button " class="close " data-dismiss="modal " aria-label="Close">
                <span aria-hidden="true ">&times;</span>
              </button>
                </div>
                <div class="modal-body ">
         <form method="POST" action="ajout.php">
            <div class="client ">
                <div class="det ">
                    <span id="det ">Détails client</span>
                </div><br>
   
                <div class="form-group row ">
                    <div class="form-group col-md-6 ">
                        <label class="col-sm-12 ">Nom du client </label>
                        <div class="col-sm-12 ">
                            <input type="text " name="nom" placeholder="Nom " class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label class="col-sm-12 ">Prénom du client </label>
                        <div class="col-sm-12 ">
                            <input type="text " name="prenom" placeholder="Prénom " class="form-control form-control-line">
                        </div>
                    </div>
                </div>
                <div class="form-group row ">
                    <div class="form-group col-md-6 ">
                        <label class="col-sm-12 ">Adresse du client </label>
                        <div class="col-sm-12 ">
                            <input type="text " name="adresse" placeholder="Adresse " class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group col-md-6 ">
                        <label class="col-sm-12 ">N° Tel du client </label>
                        <div class="col-sm-12 ">
                            <input type="tel" name="num" placeholder="Tel " class="form-control form-control-line">
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="produit ">
                <div class="det ">
                    <span id="det ">Infos commande</span>
                </div><br>


                <div class="form-group row ">
                    <div class="form-group col-md-12 ">
                        <label class="col-sm-12 ">Produit</label>
                        <div class="col-sm-12 ">
                            <input type="text" name="produit" placeholder="Produit " class="form-control form-control-line">
                        </div>
                    </div>
                </div>
                <div class="form-group row ">
                    <div class="form-group col-md-4 ">
                        <label class="col-sm-12 ">Prix </label>
                        <div class="col-sm-12 ">
                            <input type="number" name="prix" placeholder="Prix " class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group col-md-4 ">
                        <label class="col-sm-12 "> Frais de livraison </label>
                        <div class="col-sm-12 ">
                            <input type="number" name="liv" placeholder="Frais de livraison " class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group col-md-4 ">
                        <label class="col-sm-12 "> Total à payer </label>
                        <div class="col-sm-12 ">
                            <input type="number" name="total" placeholder="Total " class="form-control form-control-line">
                        </div>
                    </div>
                </div>
                <div class="form-group row ">
                    <div class="form-group col-md-12 ">
                        <label class="col-sm-12 ">Agent responsable</label>
                        <div class="col-sm-12 ">
                            <input type="text " name="agent" placeholder="Agent responsable " class="form-control form-control-line">
                        </div>
                        <label class="col-sm-12 ">Commentaire </label>
                        <div class="col-sm-12 ">
                            <input type="text " name="com" placeholder="Commentaire " value="aucun" class="form-control form-control-line">
                        </div>
                    </div>
                </div>
            </div>
        </div>
              
                
                <div class="modal-footer ">
                    <button type="button " class="btn btn-primary " id="save ">Ajouter commande </button>
                    <button type="button " class="btn btn-secondary " id="annuler " data-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
        </form>  
    </div>

</body>
</html>
<script>
    elt = document.getElementsByClassName('btn');
    for (let i = 0; i < elt.length; i++) {
        if (elt[i].value == "Livré") {
            elt[i].style.backgroundColor = "#77B143 ";
        } else if (elt[i].value == "Livré Payé") {
            elt[i].style.backgroundColor = "#77B143 ";
        } else if (elt[i].value == "En cours") {
            elt[i].style.backgroundColor = "#A38529 ";
        } else if (elt[i].value == "Echec") {
            elt[i].style.backgroundColor = "#E83221 ";
        }else if (elt[i].value == "En attente") {
            elt[i].style.backgroundColor = "#606060 ";
        }
    }

    function alerte() {
        window.alert("Etes vous sûrs de vouloir supprimer cette commande ? ");
    }
</script>