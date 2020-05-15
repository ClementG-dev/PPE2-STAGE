<?php include('../head.php'); ?>
<?php include "fonctions.php"; ?>
<?php $bdd = connectionDB();
        $sql = "UPDATE `etudiants` 
            SET `nom_etudiant` = :lastname,
                `prenom_etudiant` = :firstname,
                `numeroTel_etudiant` = :phone_number,
                `specialite_etudiant` = :specialite,
                `email_etudiant` = :mail
            WHERE `id_etudiant` = :id";
        $statement = $bdd->prepare($sql);
        $statement->bindValue(":lastname", $_POST['nom']);
        $statement->bindValue(":id", $_POST['id_etudiant']);
        $statement->bindValue(":firstname", $_POST['prenom']);
        $statement->bindValue(":phone_number", $_POST['num_tel']);
        $statement->bindValue(":specialite", $_POST['specialite']);
        $statement->bindValue(":mail", $_POST['mail']);

        $modif_bdd = $statement->execute();
        ?>
<div class="container-fluid">
    <div class="row">
    <div class="col-4"></div>
        <div class="col-sm" >
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Modifier un étudiant</h5>
                    <?php $liste_etudiant = $bdd->query("SELECT * FROM etudiants");
                    $les_etudiants = $liste_etudiant->fetchAll();  ?>

                    <form method="POST" action="modif_eleve_bis.php">
                        <p>
                            <label for="modif_eleve"> Quel(s) élève(s) voulez-vous modifier ?</label><br>
                            <select name="modif_eleve" id="modif_eleve">
                                <?php
                                foreach($les_etudiants as $tableau_etudiant)
                                {
                                    ?>

                                    <option value="<?php echo(htmlspecialchars(json_encode($tableau_etudiant))) ?>" >
                                        <?php  echo $tableau_etudiant['nom_etudiant'] . " " . $tableau_etudiant['prenom_etudiant'] ?>
                                    </option>
                                    <?php
                                    }
                                    ?>

                            </select>
                        </p>
                        <input class="btn btn-primary addEtudiant" type="submit" value="Valider">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>
<?php include(BASE_PATH.'/skeleton/footer.php'); ?>

