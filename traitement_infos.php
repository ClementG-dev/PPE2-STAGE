<?php

session_start();

include "fonctions.php"; // appelle du fichier avec les fonctions
$bdd = new PDO('mysql:host=localhost;dbname=ppe2;charset=utf8', 'root', ''); // connection a la db

$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$email = $_POST['email'];
$sexe = $_POST['sexe'];
$adresse = htmlspecialchars($_POST['adresse']);
$ville = htmlspecialchars($_POST['ville']);
$code_pos = $_POST['code_pos'];
$date_naissance= $_POST['date_naiss'];
$num_tel = $_POST['num_tel'];

$requete = $bdd->query("SELECT user_id FROM user WHERE email='".$email."'");
$donnee = $requete->fetch();

$id = $donnee["user_id"];

// inscription dans la bdd
try {

    $req = $bdd->prepare("UPDATE user SET lastname = ? , firstname = ? , email = ? , sex = ? , address = ? , city = ? , postal_code = ? , brth_date = ? , phone_number = ? WHERE user_id = ?");

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
        $num_tel,
        $id));

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