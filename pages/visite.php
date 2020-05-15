<?php include('../head.php'); ?>
<?php include "fonctions.php"; ?>
<?php $bdd = connectionDB();


$visite = $bdd->query("SELECT * from visites");
$la_visite = $visite->fetchAll();
?>

    <h1> Demande de visite </h1>
    <table class="table">
        <thead>
        <form method="POST" action="<?php $bdd->query("UPDATE visites SET validate == 1 WHERE validate == null");?>">
        <tr>
            <th scope="col">Élève</th>
            <th scope="col">Professeur</th>
            <th scope="col">Lieu</th>
            <th scope="col">Date</th>
            <th scope="col">Valider</th>
        </tr>
        </thead>

        <tbody>
<?php
foreach ($la_visite as $one_visit) {
    $etudiant = $bdd->query('SELECT * from etudiants INNER JOIN visites ON etudiants.id_etudiant = visites.id_etudiant WHERE etudiants.id_etudiant =' . $one_visit['id_etudiant']);
    $l_etudiant = $etudiant->fetchAll();
    $professeur = $bdd->query('SELECT * from professeurs INNER JOIN visites ON professeurs.id_professeurs = visites.id_professeurs WHERE professeurs.id_professeurs =' . $one_visit['id_professeurs']);
    $le_professeur = $professeur->fetchAll();

    echo('
                    <tr>
                        <td scope="row"> ' . $one_visit['nom_etudiant'] . ' ' . $l_etudiant['prenom_etudiant'] . ' </td>
                        <td scope="row"> ' . $le_professeur['nom_professeur'] . ' ' . $le_professeur['prenom_professeur'] . ' </td>
                        <td scope="row"> ' . $one_visit['lieu'] . '</td>
                        <td scope="row"> ' . $one_visit['date_visite'] . '</td>
                        <td scope="row"> ');
    if ($one_visit['validate'] == 1) {
        echo('<div>Accepté</div>');
    } else if ($one_visit['validate'] === 0) {
        echo('<div>Refusé</div>');
    }
    else {
        echo('<input class="btn btn-primary addStage" type="submit" value="Valider">  ');
        echo('<input class="btn btn-primary addRefuseStage" type="submit" value="Refuser">');
    }
    echo('
                        </td>
                    </tr>');
}
echo('
        </tbody>
        </form>
    </table>
</body>
');

include(BASE_PATH . '/skeleton/footer.php'); ?>