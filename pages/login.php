<!DOCTYPE html>
<?php session_start(); ?>
<html lang="fr">
  <head>
    <title>SIO Bank - Connexion</title>
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
          <h2 id="conntitle" class="maint-title" >SIO Bank</h2>
          <div class="card">
            <div class="card-body">
              <form method="post" action="../traitement_login.php" >
                <div class="form-row-col">
                    <div class="form-group col-md-">
                      <label for="inputEmail">Email</label>
                      <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group col-md-">
                      <label for="inputPassword">Mot de passe</label>
                      <input type="password" class="form-control" id="mdp" name="mdp" required>
                    </div>
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <div class="inscription" >
                      <p>Pas de compte ? <a href="inscription.php" >Inscription</a></p>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btnLogin">Connexion</button>
              </form>
            </div>
          </div>
        </div> 
      </div>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>  
</html>


