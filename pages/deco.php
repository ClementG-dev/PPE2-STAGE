<?php 
    // On démarre la session
    session_start();
    include("head.php"); 

    if (isset($_SESSION['email'])) 
    { // Si l'utilisateur est connecté
 
        // Supression des variables de session et de la session
        $_SESSION = array();
        session_destroy();
    }

    header('Location: ../index.php');
  
?>

