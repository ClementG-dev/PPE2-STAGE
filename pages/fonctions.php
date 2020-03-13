<?php 

function connectionDB(){
    $bdd = new PDO('mysql:host=localhost;dbname=ppe2stage;charset=utf8', 'root', ''); // connection a la db
    return $bdd;
}

function creerEtudiant($email, $nom, $prenom){ 
    
    // generation de mot de passe aleatoirement à 8 characteres
    $Alphabet = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];
    $AlphabetMaj = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    $Special = ["&","/","*","@","$","!","?"]; // 7

    $mdp = "";

    for ($i=0; $i < 8 ; $i++) { 

        $selection = rand(1,4);

        switch ($selection) {

            case 1:
                $random1 = rand(0,25);
                $mdp = $mdp . $Alphabet[$random1];
                break;

            case 2:
                $random2 = rand(0,25);
                $mdp = $mdp . $AlphabetMaj[$random2];
                break;

            default:
                $random3 = rand(0,9);
                $mdp = $mdp . $random3;
                break;
        }
    }
    $random4 = rand(0,6);
    $mdp = $mdp . $Special[$random4];
    // hashage du mot de passe
    $mdp_hashed_etudiant = password_hash($mdp, PASSWORD_DEFAULT);

    //debug du mdp
    echo $mdp;

    //verifié si l'email n'est pas déja utilisé

    $bdd = connectionDB();
    // inscription à la bdd
    $req_etudiant = $bdd->prepare('INSERT INTO etudiants (nom_etudiant, prenom_etudiant, email_etudiant, mdp_hashed_etudiant) VALUES (?,?,?,?);');
    $req_etudiant_exe = $req_etudiant ->execute(array(
        $nom,
        $prenom,
        $email,
        $mdp_hashed_etudiant
    ));

    //envoie de lemail à l'étudiant
}

function creerEntreprise($nom, $adresse, $numeroTel){

    $bdd = connectionDB();

    $req_entreprise = $bdd->prepare('INSERT INTO etudiants (nom_etudiant, prenom_etudiant, email_etudiant, mdp_etudiant) VALUES (?,?,?,?);');
    $req_entreprise_exe = $req_entreprise->execute(array(
        $nom,
        $prenom,
        $email,
        $mdp
    ));

}
?>