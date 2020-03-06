<?php include('head.php'); ?>
          <div class="container-fluid">
            <div class="row" >
              <div class="col-sm" >
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Ajouter un étudiant</h5>
                    <p class="card-text">Entrez l'adresse mail de l'étudiant, ce dernier recevera un email avec un mot de passe generé aleatoirement </p>
                    <form method="POST" action="<?php echo(BASE_PATH) ?>/ajouter_etudiant.php">
                      <div class="row">
                          <div class="col">
                            <input type="mail" class="form-control etu" name="mail" placeholder="Email" requierd>
                            <input type="text" class="form-control etu" name="prenom" placeholder="Prénom">
                            <input type="text" class="form-control etu" name="nom" placeholder="Nom">
                          </div>
                        </div>
                        <input class="btn btn-primary addEtudiant" type="submit" ></input>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

    <?php
      if(isset($_POST['mail'])){

        include "fonctions.php";
        creerEtudiant($_POST['mail'], $_POST['nom'], $_POST['prenom']);

        unset($_POST['mail'], $_POST['nom'], $_POST['prenom']);

      }
    ?>
<?php include(BASE_PATH . '/footer.php'); ?>