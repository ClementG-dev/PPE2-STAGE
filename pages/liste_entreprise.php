<?php include('../head.php'); ?>
<?php include "fonctions.php";
    $bdd = connectionDB();
    $liste_entreprise = $bdd->query("SELECT * FROM entreprises");
    $les_entreprise = $liste_entreprise->fetchAll();
?>

<div class="container-fluid">

    <div class="row" >
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch1" onclick ="myFunction()">
            <label class="custom-control-label" for="customSwitch1">Activer / Désactiver l'affichage liste</label>
        </div>
    </div>

        <div id="ShowTable" style="display: none;" >
            <h1> Liste des entreprises </h1>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Numéro de téléphone</th>
                </tr>
                </thead>

                <tbody>
                <?php
                foreach ($les_entreprise as $tableau_entreprise)
                {
                    echo '
                <tr>
                    <td> '.$tableau_entreprise['id_entreprise'].' </td>
                    <td> '.$tableau_entreprise['nom_entreprise'].' </td>
                    <td> '.$tableau_entreprise['adresse'].' </td>
                    <td> '.$tableau_entreprise['phone_number_entreprise'].' </td>                        
                </tr>
                <?php
                ';
                }
                ?>
                </tbody>
            </table>
        </div>


        <div id="ShowCard" >


        
            <h1> Liste des entreprises </h1>
            <div class="cards col-sm">
                <div class="card-deck">

                    <?php

                        echo('<div class="row ml-2 mb-2"> ');
                        $compteur = 0;
                        for ($i=0; $i < count($les_entreprise) ; $i++) { 
                            echo('

                                <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$les_entreprise[$i][1].'</h5>
                                        <p class="card-text">détails:</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Adresse : '.$les_entreprise[$i][2].'</li>
                                        <li class="list-group-item">Numero de Télephone : '.$les_entreprise[$i][3].'</li>
                                        <li class="list-group-item">Email : '.$les_entreprise[$i][4].'</li>
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