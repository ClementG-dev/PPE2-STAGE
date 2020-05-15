<?php include('../head.php');

  include "fonctions.php";
  $bdd = connectionDB();
  $ls_entreprise = $bdd->query("SELECT * FROM entreprises");
  $entreprises = $ls_entreprise->fetchAll();

  //var_dump($entreprises);


?>
<div class="container-fluid">
  <div class="row " > 
    <div class="col-4" ></div>
    <div class="col-4" >
      <div class="card shadow-sm bg-white rounded">
        <div class="card-body">
          <h5 class="card-title">Ajouter de démarches</h5>
          <p class="card-text"></p>
          <i class="fas fa-user-md"></i>
          <form method="POST">
            <label for="choisir_demarche"> Quelles sont les nouvelles demarches réalisé ?</label><br>
            <select name="choisir_demarche" id="modif_eleve" onchange="changeDisplay();">
              <option value="1" name="" >Entreprise Contacté</option>
              <option value="2" name="" >Convention de stage annulé</option>
              <option value="3" name="" >Conventions de stage signées</option>
              <option value="4" name="" >Conventions de stage signées</option>
            </select>
          </form>
        </div>
      </div>
    </div>
    <div class="col-4"></div>  
  </div>

  <!--1-->
  <div class="row mt-md-3" style="display:flex;" id="opt1">
    <div class="col-4" ></div>
    <div class="col-4" >
      <div class="card">
        <div class="card-body ">
          <h5 class="card-title">Entreprise Contacté</h5>
          <p class="card-text">Inserer l'entreprise contacté</p>

          <form method="POST" action="ajouter_demarche_bis.php">
            <input style="display: none;" value="choisir_entreprise" name="type-form" />
            <select name="entreprise" >
              
              <?php

                print_r($entreprise);

                for ($i=0; $i < count($entreprises) ; $i++) { 
                  echo('<option value="'.htmlspecialchars(json_encode($entreprises[$i])).'" name="" >'.$entreprises[$i][1].'</option>');
                }  
              ?>
            </select>

              <div class="groupe-entre" >
                <p id="addEntreprise" class="mt-3 mr-3" > Entreprise pas encore renseigné ? </p>
                <button type="button" class="btn btn-sm btn btn-link" data-toggle="modal" data-target="#exampleModal"> Ajouter une entreprise </button>
              </div>

              <div class="row" >
                <input class="btn btn-primary mt-2 ml-3" type="submit"/>
              </div>

          </form>

        </div>
      </div>
    </div>
    <div class="col-4"></div>  
  </div>

  <!--fin 1-->

    <!--2-->
  <div class="row mt-md-3" style="display: none;" id="opt2">
    <div class="col-4" ></div>
    <div class="col-4" >
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Convention de stage annulé</h5>
          <p class="card-text">Selectionner la convention de stage annulé</p>
          <form method="POST">
            <select>
              <option>Stage du 27/02/2020</option>
            </select>
          </form>
          <p class="card-text">Pas de conventions signé enregistré.</p>');
        </div>
      </div>
    </div>
  <div class="col-4"></div>  
  </div>
  <!--fin 2-->

  <!--3-->
  <div class="row mt-md-3" style="display: none;" id="opt3">
    <div class="col-4" ></div>
    <div class="col-4" >
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Convention de stage signé</h5>

          <?php if(isset($stage)){
            echo('
          <p class="card-text">Selectionner la convention de stage à signé</p>
          <form method="POST">
            <select>
              <option>Stage du 27/02/2020</option>
            </select>
          </form>');
          }else{
            echo('<p class="card-text">Pas de satges prévue pour le moment</p>');
          }
          
          ?>

        </div>
      </div>
    </div>
  <div class="col-4"></div>  
  </div>
  <!--fin 3-->

  <!--4-->
  <div class="row mt-md-3" style="display: none;" id="opt4">
    <div class="col-4" ></div>
    <div class="col-4" >
      <div class="card shadow-sm rounded">
        <div class="card-body">
          <h5 class="card-title">4</h5>
          <p class="card-text"></p>

          <form method="POST">
            <input type="text" >insereé la raison</input>
          </form>

        </div>
      </div>
    </div>
    <div class="col-4"></div>  
  </div>
  <!--fin 4-->
</div>




  <!-- MODAL CREATION ENTREPRISE -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter une entreprise</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="modal-text">Veuillez entrez les infos suivantes : </p>
          <form method="POST" action="ajouter_entreprise_bis.php" id="ad_entreprise">
            <div class="col">
              <input type="text" class="form-control etu" name="address" placeholder="Adresse" />
              <input type="text" class="form-control etu" name="nom" placeholder="Nom">
              <input type="text" class="form-control etu" name="phone_number" placeholder="Numéro de téléphone"/>
              <input type="text" class="form-control etu" name="mail" placeholder="Mail"/>
            </div>
            <input type="text" name="source" style="display: none;" value="fromDemarche"/>
            <!-- <input class="btn btn-primary addEntreprise" type="submit" ></input> -->
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Annuler</button>
        <button type="submit" form="ad_entreprise" class="btn btn-success">Ajouter Entreprise</button>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

  function changeDisplay() {

    var select = document.getElementById("modif_eleve");

    var opt1 = document.getElementById("opt1");
    var opt2 = document.getElementById("opt2");
    var opt3 = document.getElementById("opt3");
    var opt4 = document.getElementById("opt4");
    switch (select.value) {
      case '1':
        opt1.style.display = "flex";
        opt2.style.display = "none";
        opt3.style.display = "none";
        opt4.style.display = "none";
      break;
      case '2':
        opt1.style.display = "none";
        opt2.style.display = "flex";
        opt3.style.display = "none";
        opt4.style.display = "none";
      break;
      case '3':
        opt1.style.display = "none";
        opt2.style.display = "none";
        opt3.style.display = "flex";
        opt4.style.display = "none";
      break;
      default:
        opt1.style.display = "none";
        opt2.style.display = "none";
        opt3.style.display = "none";
        opt4.style.display = "flex";
    }
 }
</script>

<?php include(BASE_PATH.'/skeleton/footer.php'); ?>




