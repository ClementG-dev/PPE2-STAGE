<?php 

    include "fonctions.php";


    creerEntreprise($_POST['nom'], $_POST['address'], $_POST['phone_number'], $_POST['mail']);
    
    //$_POST['address'];
    //$_POST['nom'];
    //$_POST['phone_number'];
    //$_POST['mail'];

    //echo($_POST['source']);

    if($_POST['source'] == "fromDemarche"){
        header('Location: ajouter_demarche.php');
    }else{
        header('Location: ajouter_entreprise.php');
    }


?>





