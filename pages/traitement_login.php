<?php

// demarage de la session
session_start();

// appelle du fichier avec les fonctions
include "fonctions.php";
$bdd = connectionDB();

// Recuperation du form
$email = $_POST['email'];

// recuperation des infos de l'utilisateur en fonction de l'email
$reponseEleve = $bdd->query("SELECT mdp_etudiant FROM etudiants WHERE email_etudiant='".$email."'");
$mdpBddEleve = $reponseEleve->fetch();
$reponseEleve->closeCursor();

echo("bdd -> " . $mdpBddEleve['mdp_etudiant'] ."</br>");
echo("form -> " . $_POST['mdp'] ."</br>");


// si l'email est dans la base de données alors on connecte l'eleve
if ($mdpBddEleve['mdp_etudiant']){

    // verification du mot de passe 
    if( password_verify($_POST['mdp'], $mdpBddEleve['mdp_etudiant']) )
    {

        echo("tes co");// acces au site + initialisation session
        $allDonnes = $bdd->query("SELECT * FROM etudiants WHERE email_etudiant='".$email."' AND mdp_etudiant ='". $mdpBddEleve['mdp_etudiant'] ."'");
        $donnees = $allDonnes->fetch();
        
        $_SESSION["nom"] = $donnees['nom_etudiant'];
        $_SESSION["prenom"] = $donnees['prenom_etudiant'];
        $_SESSION["numTel"] = $donnees['numeroTel_etudiant'];
        $_SESSION["email"] = $donnees['email_etudiant'];
        $_SESSION["specialite"] = $donnees['specialite_etudiant'];
        $_SESSION["id"] = $donnees['id_etudiant']; 
        $_SESSION["role"] = "etudiant";

        //echo("\n".$_SESSION["id"]);
        header("Location: ../index.php");
    }

}else{

    // on cherche dans la table professeur
    $reponseProf = $bdd->query("SELECT mdp_professeur FROM professeurs WHERE email_professeur='".$email."'");
    $mdpBddProf = $reponseProf->fetch();
    $reponseEleve->closeCursor();


    echo("\n\n\n\n\n\n\n");
    echo("bdd -> " . $mdpBddProf['mdp_professeur'] ."</br>");
    echo("form -> " . $_POST['mdp'] ."</br>");

    if(password_verify($_POST['mdp'], $mdpBddProf['mdp_professeur'])){ // verification du mot de passe 

        $allDonnes = $bdd->query("SELECT * FROM professeurs WHERE email_professeur='".$email."'");
        $donnees = $allDonnes->fetch();

        $_SESSION["nom"] = $donnees['nom_professeur'];
        $_SESSION["prenom"] = $donnees['prenom_professeur'];
        $_SESSION["email"] = $donnees['email_professeur'];
        $_SESSION["numTel"] = $donnees['numeroTel_professeur'];
        $_SESSION["specialite"] = $donnees['specialite_professeur'];
        $_SESSION["role"] = "prof";
        $_SESSION["id"] = $donnees['id_professeurs']; 

        echo("tes co en prof");
        header("Location: ../index.php");
    }
}

echo"Heu ya un bug la je crois, mauvais mdp je pense.";



?>