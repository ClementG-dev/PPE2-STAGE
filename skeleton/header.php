<header>   
    <?php 
        if(isset($_SESSION['email']))
        {
            if($_SESSION["role"] == "etudiant")
            {
                include(BASE_PATH.'/skeleton/menu_etudiant.php');

            }elseif($_SESSION["role"] == "prof")
            {
                include(BASE_PATH.'/skeleton/menu_prof.php'); 

            }else
            {

            }

        }else{
            
            header('Location: pages/login.php');
        }

    ?>
</header>