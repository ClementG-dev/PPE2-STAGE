<?php include('../head.php'); 
    if($_SESSION['specialite'] != "principal"){
        header("Location: ../index.php");
    }
?>
          <div class="container-fluid">
            <div class="row" >
              <div class="col-4"></div>
              <div class="col-4" >
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Ajouter un professeur</h5>
                    <p class="card-text">Entrez l'adresse mail du professeur, ce dernier recevera un email avec un mot de passe generé aleatoirement </p>
                    <form method="POST" action="ajouter_prof.php" >
                      <div class="row">
                          <div class="col">
                            <input type="mail" class="form-control etu" name="mail" placeholder="Email" requierd>
                            <input type="text" class="form-control etu" name="prenom" placeholder="Prénom" >
                            <input type="text" class="form-control etu" name="nom" placeholder="Nom" >
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
        </div>

    <?php
      if($_POST['mail']){
        
        include "fonctions.php";
        creerProf($_POST['mail'], $_POST['nom'], $_POST['prenom']);

      }else{
        
      }
      unset($_POST['mail']);
    ?>
<?php include(BASE_PATH.'/skeleton/footer.php'); ?>