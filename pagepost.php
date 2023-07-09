<?php
    // mise en place des essentielles
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
    <link rel="stylesheet" href="pagepost.css">
    <title>Post</title>
</head>
<body>
        <!-- Ajout de la barre de navigation -->
        <?php include 'navbar.php'; ?>
    <main>

        <?php
            
            // récupération de l'identifiant du post dans l'url
            $id_post = $_GET['idpost'] ; 

            // affiche le post avec tous les commentaires
            getPost($id_post, -1) ;
        ?>

        <!-- formulaire ajout de com -->
            <?php 

               //  si l'utilisateur n'est pas connecté la page est fini ici  
                if (! isset($_SESSION['pseudo'])){
                    echo '</body>
                    </html>' ;
                    exit ;
                }
            ?>
        
    </main>
</body>
</html>


