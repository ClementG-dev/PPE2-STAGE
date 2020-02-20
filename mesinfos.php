<!DOCTYPE html>

<?php session_start(); 

if ($_SESSION['email'] == "" ){

  header("Location: index.php");

}

?>

<html lang="fr">
  <head>
    <title>PPE2</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets\css\main.css">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark navbar-dark">
        <a class="navbar-brand" href="#">PPE2</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo(BASE_URL) ?>/pages/main.php">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo(BASE_URL) ?>/pages/mesinfos.php">Mes informations</a>
                    </li>
                </ul>
              <span class="navbar-text" ><a href="<?php echo(BASE_URL) ?>/pages/deconnexion.php" >
            Déconnexion
            </a></span>
        </div>
    </nav>

  <div class="container-fluid" >
    <div class="card">
      <h5 class="card-header">Voici vos informations</h5>
      <div class="card-body">
        <h5 class="card-title"></h5>
        <form method="POST" action="traitement_infos.php" >

          <div class="form-row">

            <div class="form-group col-md-3">
              <label for="Nom">Nom</label>
              <input type="text" class="form-control" id="Nom" name="nom" size="50" value="<?php echo $_SESSION['nom']; ?>" required>
            </div>

            <div class="form-group col-md-3">
              <label for="Prenom">Prénom</label>
              <input type="text" class="form-control" id="Prenom" name="prenom" value="<?php echo $_SESSION['prenom']; ?>" required>
            </div>

            <div class="form-group col-md-3">
              <label for="Date_naissance">Date de naissance</label>
              <input type="date" class="form-control" name="date_naiss" id="Date_naissance" value ="<?php echo $_SESSION['date_naissance'] ?>">
            </div>

            <div class="form-group col-md-3">
              <label for="sexe">Sexe</label>
              <br>
              <input name="sexe" type="radio" id="sexe" value="M" <?php if ( $_SESSION['sexe'] == "M" ) { echo("checked"); } ?> >
              <label for="sexe">M.</label>
              <input name="sexe" type="radio" id="sexe" value="F" <?php if ( $_SESSION['sexe'] == "F" ) { echo("checked"); } ?> >
              <label for="sexe">Mme</label>
            </div>
            
          </div> 
          <div class="form-row">

            <div class="form-group col-md-3">
              <label for="Email">Mail</label>
              <input type="text" name="email" class="form-control" id="Email" value="<?php echo $_SESSION['email']; ?>" required>
            </div>

            <div class="form-group col-md-3">
              <label for="Adresse">Adresse</label>
              <input type="text" name="adresse" class="form-control" id="Adresse" value ="<?php echo $_SESSION['adresse'] ?>">
            </div>

            <div class="form-group col-md-3">
              <label for="Ville">Ville</label>
              <input type="text" class="form-control" name="ville" id="Ville" value ="<?php echo $_SESSION['ville'] ?>">
            </div>

            <div class="form-group col-md-3">
              <label for="Code_pos">Code postal</label>
              <input type="text" class="form-control" name="code_pos" id="Code_pos" value ="<?php echo $_SESSION['code_pos'] ?>">
            </div>

          </div>
          <div class="form-row">

            <div class="col-md-3 mb-3">
              <label for="Num_tel">Numéro de téléphone</label>
              <input type="text" class="form-control" id="Num_tel" name="num_tel" value ="<?php echo $_SESSION['num_tel'] ?>">
            </div>

          </div>

          <button class="btn btn-primary" type="submit">Valider</button>
          <button type="button" class="btn btn-outline-warning" href="" >Effacer mon profil</button>
        </form>
        </div>
      </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
  <foot>
    <div class="container-fluid footer">
      <div class="row">
      </div>
    </div>
  </foot>
</html>
