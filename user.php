<?php
    
    // mise en place des essentiels
    session_start();
    include 'db_connect.php';
    require_once('functions.php');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <title>Utilisateur</title>
</head>
    <body>

        <!-- ajouter la barre de navigation -->
        <?php include("navbar.php") ; ?>

        <main>
            <?php
                //  récupération du pseudo de l'utilisateur
                // si la page est charger sans paramétre dans l'url, la page de l'utilisateur en cour sera charger
                if ( ! isset($_GET['pseudo'] )  and  isset($_SESSION['pseudo'])) {
                    $_GET['pseudo'] = $_SESSION['pseudo'] ;
                }

                // test si l'utilisateur sur la page et celui connecté 
                if (isset($_SESSION['pseudo'])){
                    $connect_isme = $_GET['pseudo'] === $_SESSION['pseudo'] ? 0 :1 ;
                }else $connect_isme = 1;

            ?>


            <!-- Ecrit un texte diférent si l'utilisateur connecté est sur sa propre page -->
            <?php
                if ( isset($_SESSION['pseudo'])  and  $_GET['pseudo'] === $_SESSION['pseudo']){
                    $h1 = "Bienvenue sur la page regroupant tous tes posts!" ;
                }else{
                    $h1 = "Bienvenue sur la page de ".$_GET['pseudo']."!" ; 
                }
            ?>

            <p><?php echo $h1 ; ?></p>

            <!-- récupération du nombre de posts -->
            <?php
                
                $nbrP = $connect_isme ? nbrPost($_GET['pseudo'], 1) :nbrPost($_GET['pseudo'], 0);
                if ($nbrP === NULL){$nbrP = 0 ;}
            ?>
            <br>
            
            <!-- affiche le nombre de post total de l'utilisateur -->
            <p>Cet utilisateur a publié <?php echo $nbrP  ?> post(s).</p>


            <!-- test pour voir si un utilisateur à écrit des post -->
            <?php  if ((int)$nbrP === 0){
                $h2 = "Rien à voir ici." ;
                }else $h2 = "Voici tous ses posts:" ;
            ?>

            <p><?php echo $h2 ; ?></p> <br>

           
            <!-- affichage de tout les posts -->
            <?php getAllPost($_GET['pseudo'],  $connect_isme ) ?>

        </main>
        
    </body>
</html>