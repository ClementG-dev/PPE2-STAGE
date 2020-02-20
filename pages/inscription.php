<!DOCTYPE html>
<?php session_start(); ?>
<html lang="fr">
  <head>
    <title>Connexion</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets\css\main.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
  </head>
  <body class="bodybg">
    <div class="container" >
      <div class="row justify-content-md-center">
        <div class="col-md-6 login">
          <h2 class="maint-title" style="text-align: center;" >Inscription</h2>
          <div class="card">
            <div class="card-body">
              <form action="../traitement_inscription.php" method="post" >

                <div class="form-row-col">

                    <div class="form-group col-md-">
                      <label for="inputNom">Nom</label>
                      <input name="nom" type="text" class="form-control" id="inputNom" required>
                    </div>

                    <div class="form-group col-md-">
                      <label for="inputPrenom">Prénom</label>
                      <input name="prenom" type="text" class="form-control" id="inputPrenom" required>
                    </div>

                    <div class="form-group col-md-">
                      <label for="inputEmail">Email</label>
                      <input name="email" type="text" class="form-control" id="inputEmail" required >
                    </div>

                    <div class="form-group col-md-">
                      <label for="inputPassword">Mot de passe</label>
                      <input name="mdp" type="password" class="form-control" id="inputPassword" required minlength="6">
                    </div>

                    <div class="form-group col-md-">
                      <label for="inputConfirmPassword">Confirmation mot de passe</label>
                      <input name="confirm_mdp" type="password" class="form-control" id="inputConfirmPassword" invalid>
                    </div>

                    <div class="form-group col-md-">
                      <label for="sexe">Sexe  :  </label>
                      <input name="sexe" type="radio" id="sexe" value="M" checked>
                      <label for="sexe">M.</label>
                      <input name="sexe" type="radio" id="sexe" value="F">
                      <label for="sexe">Mme</label>
                    </div>

                    <div class="form-group col-md-">
                      <label for="adresse">Adresse</label>
                      <input name="adresse" type="text" class="form-control" id="inputAdresse">
                    </div>

                    <div class="form-group col-md-">
                      <label for="ville">Ville</label>
                      <input name="ville" type="text" class="form-control" id="inputAdresse">
                    </div>

                    <div class="form-group col-md-">
                      <label for="code_pos">Code Postal</label>
                      <input name="code_pos" type="text" class="form-control" id="inputAdresse">
                    </div>

                    <div class="form-group col-md-">
                      <label for="date_naiss">Date de naissance</label>
                      <input name="date_naiss" type="date" min="1920-01-01" max="2007-12-31" class="form-control" id="inputDateNaissance">
                    </div>

                    <div class="form-group col-md-">
                      <label for="num_tel">Numéro de telephone</label>
                      <input name="num_tel" type="text" class="form-control" id="inputNumeroPhone">
                    </div>

                </div>

                <div class="form-group">
                  <div class="form-check">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btnLogin">Inscription</button>
              </form>
            </div>
          </div>
        </div> 
      </div>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
  <foot>
    <div class="container-fluid footer">
      <p>©2020 SIO BANK All right reserved.</p>
    </div>
  </foot>
</html>


