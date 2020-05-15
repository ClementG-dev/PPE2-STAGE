<?php include('../head.php'); ?>

<div class="container-fluid">
    <div class="row" >
        <div class="col-sm" >
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">STAGE</h5>

                    <table>
                        
                    </table>

                    <form method="post" action="modifier_etudiant.php">
                        <p>
                            <label for="modif_eleve"></label><br />
                            <select name="modif_eleve" id="modif_eleve">
                            </select>
                        </p>
                        <input class="btn btn-primary addEtudiant" type="submit" ></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include(BASE_PATH.'/skeleton/footer.php'); ?>

