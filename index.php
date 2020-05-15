<?php 
  include('head.php');

  if(isset($_SESSION['email']))
	{

	}else{
		header('Location: pages/login.php');
  }

  if($_SESSION["role"] == "etudiant"){
  ?>    
    <main role="main" class="container">
      <div class="jumbotron">
        <h1>Il vous reste 36 jours avant de trouver un stage</h1>
        <p class="lead">Vous avez déja contacté 3 entreprises</p>
        <a class="btn btn-lg btn-primary" href="pages/ajouter_demarche.php" role="button">Ajouter démarche &raquo;</a>
      </div>
    </main>
  <?php } else{ ?>

    <main role="main" class="container">
      <div class="jumbotron">
        <h1>12 étudiants ont trouvés un stage, 21 ont fait des demarches et 2 n'ont effectués aucune demarche</h1>
        <p class="lead">12 entreprises ont été enregistrés</p>
        <a class="btn btn-lg btn-primary" href="pages/ajouter_demarche.php" role="button">Ajouter démarche</a>
      </div>
    </main>


  <?php } ?>

<?php include(BASE_PATH.'/skeleton/footer.php'); ?>