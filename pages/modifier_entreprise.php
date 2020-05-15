<?php include('../head.php'); ?>
<?php include "fonctions.php"; ?>
<?php 
// manque un if
    $bdd = connectionDB();
    $sql = "UPDATE `entreprises` 
            SET `nom_entreprise` = :name_company,
                `adresse` = :address
            WHERE `id_entreprise` = :id";
        $statement = $bdd->prepare($sql);
        $statement->bindValue(":name_company", $_POST['nom']);
        $statement->bindValue(":id", $_POST['id_entreprise']);
        $statement->bindValue(":address", $_POST['address']);

        $modif_bdd = $statement->execute();
?>
<div class="container-fluid">
    <div class="row" >
        <div class="col-sm" >
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Modifier une entreprise</h5>
                    <?php $liste_entreprise = $bdd->query("SELECT * FROM entreprises");
                    $les_entreprise = $liste_entreprise->fetchAll();?>

                    <form method="POST" action="modif_entreprise_bis.php">
                        <p>
                            <label for="modifier_entreprise"> Quelle(s) entreprise(s) voulez-vous modifier ?</label><br>
                            <select name="modifier_entreprise" id="modifier_entreprise">
                                <?php
                                foreach($les_entreprise as $tableau_entreprise)
                                {
                                    ?>

                                    <option value="<?php echo(htmlspecialchars(json_encode($tableau_entreprise))) ?>" >
                                        <?php  echo $tableau_entreprise['nom_entreprise'] ?>
                                    </option>
                                    <?php
                                }
                                ?>

                            </select>
                        </p>
                        <input class="btn btn-primary addEntreprise" type="submit" value="Valider">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(BASE_PATH.'/skeleton/footer.php'); ?>

