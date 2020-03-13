<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <a class="navbar-brand" href="#">FLD Gestion de Stages</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo(BASE_URL) ?>/index.php">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Entreprises</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo(BASE_URL) ?>/pages/ajouter_entreprise.php">Ajouter une entreprise</a>
                    <a class="dropdown-item" href="<?php echo(BASE_URL) ?>/pages/liste_entreprise.php">Liste entreprise</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Stage <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <div class="form-inline mt-2 mt-md-0">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="<?php echo(BASE_URL) ?>/pages/profil.php" role="button" aria-haspopup="true" aria-expanded="false">Profil</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#"></a>
                <a class="dropdown-item" href="#"></a>
                <a class="dropdown-item" href="#"></a>
            </div>
        </div>
    </div>
</nav>