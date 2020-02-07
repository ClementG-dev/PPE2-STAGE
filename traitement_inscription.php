<?php

session_start(); // demarrage de la session
include "fonctions.php"; // appelle du fichier avec les fonctions
$bdd = new PDO('mysql:host=localhost;dbname=ppe2;charset=utf8', 'root', ''); // connection a la db

// RECUPERATION DES INFO DU FORM 
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$email = $_POST['email'];
$mdp = md5($_POST['mdp']);
$confirm_mdp = md5($_POST['confirm_mdp']);
$sexe = $_POST['sexe'];
$adresse = htmlspecialchars($_POST['adresse']);
$ville = htmlspecialchars($_POST['ville']);
$code_pos = $_POST['code_pos'];
$date_naissance= $_POST['date_naiss'];
$num_tel = $_POST['num_tel'];

$infos = array($nom, $prenom, $email, $mdp, $confirm_mdp, $sexe, $adresse, $ville, $code_pos, $date_naissance, $num_tel);

// detection d'erreurs
for ($i=0; $i < 10; $i++) {  // boucle pour savoir qu'elle sont les valeurs vides

    if ($infos[$i]){
        echo("     |     ");
        echo($infos[$i]);
    }else{
        
        erreur($i, "inscription.php"); // erreur, renvoie vers la page index.php avec l'erreur de la variable i
    }
}

// verif mdp et confirm mdp
if ($mdp != $confirm_mdp){

    erreur(4, "inscription.php"); // erreur, renvoie vers la page index.php avec l'erreur 4

}

// verification de l'email
$reponse = $bdd->query("SELECT user_id FROM user WHERE email='".$email."'");
$emailExist = $reponse->fetch();

if ($emailExist){ // si l'email n'est pas dans la base de données

    erreur(2,"inscription.php"); // email existe deja

}

// inscription dans la bdd
try {

    $req = $bdd->prepare('INSERT INTO user (lastname, firstname, email, psswd, sex, address, city, postal_code, brth_date, phone_number) VALUES (?,?,?,?,?,?,?,?,?,?);');

    $test = $req->execute(array(
        $nom,
        $prenom,
        $email,
        $mdp,
        $sexe,
        $adresse,
        $ville,
        $code_pos,
        $date_naissance,
        $num_tel));

            echo("<br>");
            echo "\nPDO::errorInfo():\n";
            print_r($req->errorInfo());
            echo date($date_naissance);

} catch (PDOException $e) {
    echo 'Échec de la connexion : ' . $e->getMessage();
    exit;
}

$_SESSION["nom"] = $nom;
$_SESSION["prenom"]= $prenom;
$_SESSION["email"] = $email;
$_SESSION["sexe"] = $sexe;
$_SESSION["adresse"] = $adresse;
$_SESSION["ville"] = $ville;
$_SESSION["code_pos"] = $code_pos;
$_SESSION["date_naissance"] = $date_naissance;
$_SESSION["num_tel"] = $num_tel;

header("Location: index.php");

?>