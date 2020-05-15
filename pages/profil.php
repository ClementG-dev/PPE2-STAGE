<?php include('../head.php'); ?>
<?php include "fonctions.php"; ?>
<?php session_start();?>

<!DOCTYPE html>

<?php

$bdd = connectionDB();
if ($_SESSION["role"] == "prof") {
    $sql = "UPDATE `professeurs`
SET `nom_professeur` = :name_teacher,
`prenom_professeur` = :firstname_teacher
`email_professeur` = :mail_teacher
`numeroTel_professeur` = :phone_teacher
`specialite_professeur` = :spe_teacher";
    $statement = $bdd->prepare($sql);
    $statement->bindValue(":name_teacher", $_POST['nom']);
    $statement->bindValue(":firstname_teacher", $_POST['prenom']);
    $statement->bindValue(":mail_teacher", $_POST['email']);
    $statement->bindValue(":phone_teacher", $_POST['numTel']);
    $statement->bindValue(":spe_teacher", $_POST['specialite']);
    $modif_bdd = $statement->execute();
} else {
    $sql = "UPDATE `etudiants`
SET `nom_etudiant` = :name_student,
`prenom_etudiant` = :firstname_student
`email_etudiant` = :mail_student
`numeroTel_etudiant` = :phone_student
`specialite_etudiant` = :spe_student";
    $statement = $bdd->prepare($sql);
    $statement->bindValue(":name_student", $_POST['nom']);
    $statement->bindValue(":firstname_student", $_POST['prenom']);
    $statement->bindValue(":spe_student", $_POST['specialite']);
    $statement->bindValue(":mail_student", $_POST['email']);
    $statement->bindValue(":phone_student", $_POST['numTel']);
    $modif_bdd = $statement->execute();
}
if ($_SESSION['email'] == "" ){
    header("Location: index.php");
}

?>
<body>

<div class="container-fluid" >
    <div class="card">
        <h5 class="card-header">Voici vos informations</h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <?php ?>
            <form method="POST" action="/pages/profil_bis.php" >
                <p>
                    <label for="profil"> Voulez-vous modifier des informations ?</label><br>

                <div class="form-row">

                    <div class="form-group col-md-3">
                        <label for="Nom">Nom</label>
                        <input type="text" class="form-control" id="Nom" name="nom" size="50" value="<?php echo $_SESSION['nom']; ?>" required>
                    </div>

                    <div class="form-group col-md-3">
                        <label for="Prenom">Prénom</label>
                        <input type="text" class="form-control" id="Prenom" name="prenom" value="<?php echo $_SESSION['prenom']; ?>" required>
                    </div>

                </div>
                <div class="form-row">

                    <div class="form-group col-md-3">
                        <label for="Email">Mail</label>
                        <input type="text" name="email" class="form-control" id="email" value="<?php echo $_SESSION['email']; ?>" required>
                    </div>

                </div>
                <div class="form-row">

                    <div class="form-group col-md-3">
                        <label for="Specialite">Spécialité du professeur</label>
                        <input type="text" name="specialite" class="form-control" id="specialite" value="<?php echo $_SESSION['specialite']; ?>" required>
                    </div>

                </div>
                <div class="form-row">

                    <div class="col-md-3 mb-3">
                        <label for="Num_tel">Numéro de téléphone</label>
                        <input type="text" class="form-control" id="Num_tel" name="numTel" value ="<?php echo $_SESSION['numTel'] ?>">
                    </div>

                </div>
                    </select>
                </p>
                <button class="btn btn-primary modifProfil" type="submit">Modifier</button>
            </form>
        </div>
    </div>
</div>
<?php include(BASE_PATH.'/skeleton/footer.php'); ?>
