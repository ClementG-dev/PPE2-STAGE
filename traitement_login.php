<?php

session_start(); // demarage de la session

include "fonctions.php"; // appelle du fichier avec les fonctions
$bdd = new PDO('mysql:host=localhost;dbname=ppe2stage;charset=utf8', 'root', ''); // connection a la db

// Recuperation du form
$email = $_POST['email'];
$mdp = md5($_POST['mdp']);

if ($_POST['mdp']){   // si le mdp n'est pas indiqué
}else{
    erreur(3,"login.php");
}

if ($email){ // si l'email n'est pas indiqué
}else{
    erreur(2,"login.php");
}

// recuperation des infos de l'utilisateur en fonction de l'email
$reponseEleve = $bdd->query("SELECT mpd_etudiant FROM etudiants WHERE email='".$email."'");
$mdpBddEleve = $reponseEleve->fetch();
$reponseEleve->closeCursor();

if ($mdpBddEleve){ // si l'email n'est pas dans la base de données alors on connecte l'eleve

    if($mdp == $mdpBdd['psswd']){ // verification du mot de passe 

        echo("tes co");// acces au site + initialisation session
        $allDonnes = $bdd->query("SELECT * FROM etudiants WHERE email='".$email."'");
        $donnees = $allDonnes->fetch();
        
        $_SESSION["nom"] = $donnees['lastname'];

        header("Location: index.php");
    }

}else{

    // on cherche dans la table proffesseur
    $reponseProf = $bdd->query("SELECT mpd_proffeseur FROM proffeseurs WHERE email_proffeseur='".$email."'");
    $mdpBddProf = $reponseProf->fetch();
    $reponseEleve->closeCursor();

    if($mdp == $mdpBdd['psswd']){ // verification du mot de passe 

        echo("tes co");// acces au site + initialisation session
        $allDonnes = $bdd->query("SELECT * FROM proffeseurs WHERE email_proffeseur='".$email."'");
        $donnees = $allDonnes->fetch();
        
        $_SESSION["nom"] = $donnees['lastname'];

        header("Location: index.php");
    }
}


?>