<?php include('../head.php'); ?>
<?php include "fonctions.php"; ?>
<div class="container-fluid">
    <div class="row" >
        <div class="col-sm" >
            <div class="card">
                <div class="card-body">

                    <?php $eleve = json_decode($_POST['modif_eleve'], true);?>
                    <h5 class="card-title"> Voulez vous modifier les informations de <?php echo $eleve['nom_etudiant'] . " " . $eleve['prenom_etudiant'] ?> </h5>

                    <form method="POST" action="modifier_etudiant.php" >
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control etu" name="id_etudiant" placeholder="Id" value="<?php  echo $eleve['id_etudiant']?>">
                                <input type="text" class="form-control etu" name="nom" placeholder="Nom" value="<?php  echo $eleve['nom_etudiant']?>">
                                <input type="text" class="form-control etu" name="prenom" placeholder="Prénom" value="<?php  echo $eleve['prenom_etudiant']?>">
                                <input type="text" class="form-control etu" name="num_tel" placeholder="Numéro de Téléphone" requierd value="<?php  echo $eleve['numeroTel_etudiant']?>">
                                <input type="text" class="form-control etu" name="specialite" placeholder="Spécialité" requierd value="<?php  echo $eleve['specialite_etudiant']?>">
                                <input type="mail" class="form-control etu" name="mail" placeholder="Email" requierd value="<?php  echo $eleve['email_etudiant']?>">
                            </div>
                        </div>
                        <input class="btn btn-primary addEtudiant" type="submit" >
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(BASE_PATH.'/skeleton/footer.php'); ?>