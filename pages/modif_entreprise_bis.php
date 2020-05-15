<?php include('../head.php'); ?>
<?php include "fonctions.php"; ?>
<div class="container-fluid">
    <div class="row" >
        <div class="col-sm" >
            <div class="card">
                <div class="card-body">

                    <?php $entreprise = json_decode($_POST['modifier_entreprise'], true); ?>

                    <h5 class="card-title"> Voulez vous modifier les informations de <?php echo $entreprise['nom_entreprise'] ?> ?</h5>

                    <form method="POST" action="modifier_entreprise.php" >
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control etu" name="id_entreprise" placeholder="Id" value="<?php  echo $entreprise['id_entreprise']?>">
                                <input type="text" class="form-control etu" name="nom" placeholder="Nom" value="<?php  echo $entreprise['nom_entreprise']?>">
                                <input type="text" class="form-control etu" name="address" placeholder="Adresse" value="<?php  echo $entreprise['adresse']?>">
                            </div>
                        </div>
                        <!--  --> <button href="modifier_entreprise.php" class="btn " >Annuler</button>
                        <input class="btn btn-primary addEntreprise" type="submit" >
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(BASE_PATH.'/skeleton/footer.php'); ?>

