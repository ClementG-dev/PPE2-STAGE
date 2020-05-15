<?php include('../head.php'); ?>
<?php include "fonctions.php";
$bdd = connectionDB();
$liste_etudiant = $bdd->query("SELECT etudiants.id_etudiant,nom_etudiant,numeroTel_etudiant, specialite_etudiant, email_etudiant, COUNT(demarche.id_etudiant) AS nb_demarche
                               FROM etudiants, demarche 
                               WHERE demarche.id_etudiant = etudiants.id_etudiant
                               GROUP BY etudiants.id_etudiant");
$les_etudiants = $liste_etudiant->fetchAll();
?>
    <div class="container-fluid">

        <div class="row" >
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch1" onclick ="myFunction()">
                <label class="custom-control-label" for="customSwitch1">Activer / Désactiver l'affichage liste</label>
            </div>
        </div>

        <div id="ShowTable" style="display: none;" >
            <h1> Liste des étudiants </h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Numéro de téléphone</th>
                    <th scope="col">Spécialité de l'étudiant</th>
                    <th scope="col">Email de l'étudiant</th>
                    <th scope="col">Démarches réalisées</th>
                </tr>
                </thead>

                <tbody>
                <?php
                foreach ($les_etudiants as $tableau_etudiant)
                {
                    echo '
                <tr>
                    <td> '.$tableau_etudiant['id_etudiant'].' </td>
                    <td> '.$tableau_etudiant['nom_etudiant'] . ' ' . $tableau_etudiant['prenom_etudiant'] . ' </td>
                    <td> '.$tableau_etudiant['numeroTel_etudiant'].' </td>
                    <td> '.$tableau_etudiant['specialite_etudiant'].'</td>
                    <td> '.$tableau_etudiant['email_etudiant'].' </td>
                    <td> '.$tableau_etudiant['nb_demarche'].' </td>                           
                </tr>
                <?php
                ';
                }
                ?>
                </tbody>
            </table>
        </div>


        <div id="ShowCard" >



            <h1> Liste des étudiants </h1>
            <div class="cards col-sm">
                <div class="card-deck">

                    <?php

                    echo('<div class="row ml-2 mb-2"> ');
                    $compteur = 0;
                    for ($i=0; $i < count($les_etudiants) ; $i++) {
                        echo('

                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$les_etudiants[$i][1].'  '.$les_etudiants[$i][2].' </h5>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Numero de Télephone : '.$les_etudiants[$i][3].'</li>
                                        <li class="list-group-item">Spécialité : '.$les_etudiants[$i][4].'</li>
                                        <li class="list-group-item">Email : '.$les_etudiants[$i][5].'</li>
                                        <li class="list-group-item">Démarches réalisées : '.$les_etudiants[$i]['nb_demarche'].'</li>
                                    </ul>
                                </div>
                        ');
                        $compteur++;

                        if($compteur == 5){
                            echo('</div>');
                            echo('<div class="row ml-2 mb-2">');
                        }
                    }

                    ?>


                </div>
            </div>
        </div>




    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("ShowCard");
            var y = document.getElementById("ShowTable");

            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }

            if (y.style.display === "none") {
                y.style.display = "block";
            } else {
                y.style.display = "none";
            }
        }
    </script>
<?php include(BASE_PATH.'/skeleton/footer.php'); ?>