<?php

session_start(); // demarage de la session

include "fonctions.php"; // appelle du fichier avec les fonctions
$bdd = new PDO('mysql:host=localhost;dbname=ppe2;charset=utf8', 'root', ''); // connection a la db

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
$reponse = $bdd->query("SELECT psswd FROM user WHERE email='".$email."'");

$mdpBdd = $reponse->fetch();

$reponse->closeCursor();

if ($mdpBdd){ // si l'email n'est pas dans la base de données

    if($mdp == $mdpBdd['psswd']){ // verification du mot de passe 

        echo("tes co");// acces au site + initialisation session
        $allDonnes = $bdd->query("SELECT * FROM user WHERE email='".$email."'");
        $donnees = $allDonnes->fetch();
        
        $_SESSION["nom"] = $donnees['lastname'];
        $_SESSION["prenom"] = $donnees['firstname'];
        $_SESSION["email"] = $donnees['email'];
        $_SESSION["sexe"] = $donnees['sex'];
        $_SESSION["adresse"] = $donnees['address'];
        $_SESSION["ville"] = $donnees['city'];
        $_SESSION["code_pos"] = $donnees['postal_code'];
        $_SESSION["date_naissance"] = $donnees['brth_date'];
        $_SESSION["num_tel"] = $donnees['phone_number'];

        header("Location: index.php");

    }

}else{
    erreur(2,"login.php"); 
}


?>