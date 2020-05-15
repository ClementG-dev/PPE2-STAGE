<?php
 
  session_start(); // start session pour recuperer l'id 
  include "fonctions.php";

  //echo($_POST["type-form"]);

  if ( $_POST["type-form"] == "choisir_entreprise" ) {

    $entreprise = json_decode($_POST["entreprise"]); // decode du json pour recuperer l'id

    //print_r($entreprise);
    print($_SESSION['id']);

    $idEntreprise = $entreprise->{'id_entreprise'}; // recuperation de lid de l'entreprise
    $TypeDemarche = "entreprise_contacte";

    $bdd = connectionDB();

    $req_demarche = $bdd->prepare('INSERT INTO demarche (id_etudiant, id_entreprise, type_demarche) VALUES (?,?,?);');
    $req_demarche_exe = $req_demarche->execute(array(
        $_SESSION['id'], // id SQL de letudiant connecté
        $idEntreprise,
        $TypeDemarche
    ));  


  }


  
?>