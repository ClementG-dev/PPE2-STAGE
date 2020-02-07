<?php





function erreur($erreurType, $page){
    header("Location: ".$page."?erreur=".$erreurType);
}

function erreurTxt($idErreur){

    $erreurTxt = array("nom", "prénom", "email", "mot de passe", "confirmation de mot de passe", "sexe", "adresse postale", "ville", "code postal", "date de naissance", "numero de Télephone", "email incorrect", "mot de passe incorrect"); //12
    return $erreurTxt[$idErreur];
    
}

?>
