
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>FLD GS - Prénom nom</title>

    <!-- JS pour les notifs -->
    <script src="assets/js/notify.js"></script>

    <!-- Custom CSS  -->
    <link rel="stylesheet" type="text/css" href="assets\css\main.css">

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="navbar-top.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="#">FLD Gestion de Stages</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Entreprises</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="ajouter_entreprise.php">Ajouter une entreprise</a>
                    <a class="dropdown-item" href="liste_entreprise.php">Liste entreprise</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Etudiant</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="ajouter_etudiant.php">Ajouter étudiant</a>
                    <a class="dropdown-item" href="modifier">Modifier étudiant</a>
                    <a class="dropdown-item" href="liste_etudiant.php">Liste étudiant</a>
                </div>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="#">Stage <span class="sr-only"></span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="#">Visite <span class="sr-only"></span></a>
            </li>
        </ul>
        <div class="nav-item mt-2 mt-md-0">
            <a class="nav-link" href="#">Profil <span class="sr-only"></span></a>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row" >
        <div class="col-sm" >
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Ajouter une entreprise</h5>
                    <p class="card-text">Veuillez entrez les infos suivantes : </p>
                    <form method="POST" action="ajouter_entreprise.php" >
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control etu" name="address" placeholder="Adresse" requierd>
                                <input type="text" class="form-control etu" name="nom" placeholder="Nom">
                                <input type="text" class="form-control etu" name="phone_number" placeholder="Numéro de téléphone">
                                <input type="text" class="form-control etu" name="mail" placeholder="Mail">
                            </div>
                        </div>
                        <input class="btn btn-primary addEntreprise" type="submit" ></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</html>