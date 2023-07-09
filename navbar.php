<!-- Ajout de la barre de navigation -->


<!-- Test pour savoir si l'utilisateur est connecter ou non -->
<!-- Renvoie sur la page adequate -->
<?php
    if ( ! isset($_SESSION['pseudo'] )) include 'navbar_invite.php';
    else include 'navbar_connecté.php';
?>