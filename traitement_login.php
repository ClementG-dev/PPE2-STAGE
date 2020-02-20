<?php

session_start(); // demarage de la session

include "fonctions.php"; // appelle du fichier avec les fonctions
$bdd = new PDO('mysql:host=localhost;dbname=ppe2stage;charset=utf8', 'root', ''); // connection a la db

// Recuperation du form
$email = $_POST['email'];

if ($_POST['mdp']){   // si le mdp n'est pas indiqué
}else{
    //erreur(3,"login.php");
}

if ($email){ // si l'email n'est pas indiqué
}else{
    //erreur(2,"login.php");
}

// recuperation des infos de l'utilisateur en fonction de l'email
$reponseEleve = $bdd->query("SELECT mdp_etudiant FROM etudiants WHERE email_etudiant='".$email."'");
$mdpBddEleve = $reponseEleve->fetch();
$reponseEleve->closeCursor();

echo("bdd -> " . $mdpBddEleve['mdp_etudiant'] ."</br>");
echo("form -> " . $_POST['mdp'] ."</br>");

if ($mdpBddEleve['mdp_etudiant']){ // si l'email n'est pas dans la base de données alors on connecte l'eleve

    if( password_verify($_POST['mdp'], $mdpBddEleve['mdp_etudiant']) )
    { // verification du mot de passe 

        echo("tes co");// acces au site + initialisation session
        $allDonnes = $bdd->query("SELECT * FROM etudiants WHERE email_etudiant='".$email."'");
        $donnees = $allDonnes->fetch();
        
        $_SESSION["nom"] = $donnees['nom_etudiant'];
        $_SESSION["prenom"] = $donnees['prenom_etudiant'];
        $_SESSION["numTel"] = $donnees['numeroTel_etudiant'];
        $_SESSION["email"] = $donnees['email_etudiant'];
        $_SESSION["specialite"] = $donnees['specialite_etudiant'];


        header("Location: index.php");
    }

}else{

    // on cherche dans la table proffesseur
    $reponseProf = $bdd->query("SELECT mpd_proffeseur FROM professeurs WHERE email_professeur='".$email."'");
    $mdpBddProf = $reponseProf->fetch();
    $reponseEleve->closeCursor();

    if(password_verify($_POST['mdp'], $mdpBddProf)){ // verification du mot de passe 

        $allDonnes = $bdd->query("SELECT * FROM professeurs WHERE email_professeur='".$email."'");
        $donnees = $allDonnes->fetch();
        
        $_SESSION["nom"] = $donnees['nom_professeurs'];

        //header("Location: index.php");
    }
}


?>