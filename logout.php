
<!-- Permet de déconnecter l'utilisateur du site web -->

<?php 
    session_start();

    // détruit la supervariable $_SESSION
    $_SESSION = array();
    session_destroy();

    // renvoie à l'accueil
    header("location:home.php");
?>