<?php 

function connectionDB(){
    $bdd = new PDO('mysql:host=mysql-ppe2stage.alwaysdata.net;dbname=ppe2stage_web;charset=utf8', 'ppe2stage', '1234catF'); // connection a la db
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
    //echo $mdp;

    // Connection à la db
    $bdd = connectionDB();


    //verifié si l'email n'est pas déja utilisé
    $req_emailVerif = $bdd->query("SELECT * FROM `etudiants` WHERE email_etudiant = '".$email."' ");
    $letudiant = $req_emailVerif->fetchAll();

    if($letudiant){
        return "Un utilisateur possede déja cette email.";
    }

    // inscription à la bdd
    $req_etudiant = $bdd->prepare('INSERT INTO etudiants (nom_etudiant, prenom_etudiant, email_etudiant, mdp_etudiant) VALUES (?,?,?,?);');
    $req_etudiant_exe = $req_etudiant ->execute(array(
        $nom,
        $prenom,
        $email,
        $mdp_hashed_etudiant
    ));

    //envoie de lemail à l'étudiant

    //mail($to,$subject,$txt,$headers);

         // Plusieurs destinataires
         $to = $email;

         // Sujet
         $subject = 'Compte GEST-STAGE';
    
         // message
         $message = '
         <html>
          <head>
           <p>Un compte éléve Gest-Stage vous à été créé.</p>
           <p>Ce compte vous permet de renseigner vos démarches effectué pour trouver un stage.</p>
          </head>
          <body>
           <p><b>Identifiant</b> : '.$email.'</p>
           <p><b>Mot de passe</b> : '.$mdp.'</p>
          </body>
         </html>
         ';
    
         // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
         $headers[] = 'MIME-Version: 1.0';
         $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    
         // En-têtes additionnels
         $headers[] = 'To: '.$email.'';
         $headers[] = 'From: ppe2stage@alwaysdata.net';
    
         // Envoi
         mail($to, $subject, $message, implode("\r\n", $headers));


    
}

function creerProf($email, $nom, $prenom){ 
    
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
    $mdp_hashed_prof = password_hash($mdp, PASSWORD_DEFAULT);

    //debug du mdp
    //echo $mdp;

    // Connection à la db
    $bdd = connectionDB();


    //verifié si l'email n'est pas déja utilisé
    $req_emailVerif = $bdd->query("SELECT * FROM `professeurs` WHERE email_professeur = '".$email."' ");
    $leprof = $req_emailVerif->fetchAll();

    if($leprof){
        return "Un utilisateur possede déja cette email.";
    }

    // inscription à la bdd
    $req_prof = $bdd->prepare('INSERT INTO professeurs (nom_professeur, prenom_professeur, email_professeur, mdp_professeur) VALUES (?,?,?,?);');
    $req_prof_exe = $req_prof ->execute(array(
        $nom,
        $prenom,
        $email,
        $mdp_hashed_prof
    ));

    //envoie de lemail à l'étudiant

    //mail($to,$subject,$txt,$headers);

         // Plusieurs destinataires
         $to = $email;

         // Sujet
         $subject = 'Compte GEST-STAGE';
    
         // message
         $message = '
         <html>
          <head>
           <p>Un compte professeur Gest-Stage vous à été créé.</p>
           <p>Ce compte vous permet de suivre les demarches effectuées par les éléves.</p>
          </head>
          <body>
           <p><b>Identifiant</b> : '.$email.'</p>
           <p><b>Mot de passe</b> : '.$mdp.'</p>
          </body>
         </html>
         ';
    
         // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
         $headers[] = 'MIME-Version: 1.0';
         $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    
         // En-têtes additionnels
         $headers[] = 'To: '.$email.'';
         $headers[] = 'From: ppe2stage@alwaysdata.net';
    
         // Envoi
         mail($to, $subject, $message, implode("\r\n", $headers));


    
}

function creerEntreprise($nom, $adresse, $numeroTel, $mail){

    $bdd = connectionDB();

    $req_entreprise = $bdd->prepare('INSERT INTO entreprises (nom_entreprise, adresse, phone_number_entreprise, email_entreprise) VALUES (?,?,?,?);');
    $req_entreprise_exe = $req_entreprise->execute(array(
        $nom,
        $adresse,
        $numeroTel,
        $mail
    ));

}
?>