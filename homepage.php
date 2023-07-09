<!-- Ajout de la barre de navigation -->


<!-- Test pour savoir si l'utilisateur est connecter ou non -->
<!-- Renvoie sur la page adequate -->
<?php
    if ( ! isset($_SESSION['pseudo'] )) include 'home_invite.php';
    else include 'home_connecté.php';
?>