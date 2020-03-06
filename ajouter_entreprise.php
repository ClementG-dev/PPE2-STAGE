<?php include('head.php'); ?>

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
<?php include(BASE_PATH . '/footer.php'); ?>