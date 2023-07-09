<?php

    // mise en place des essentiels
    session_start();
    include 'db_connect.php';
    require_once('functions.php') ;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addpost.css">
    <title>Poster</title>
</head>
<body>
    <!-- Ajout de la barre de navigation -->
    <?php include 'navbar.php'; ?>
    
    <main>
        <div>
            

            <!-- traitement des données -->
            <?php
                if (isset($_POST['post']))  {
                    $post = $_POST['post']  ;

                    //  Pour déterminer si le post est en privé ou public
                    if ( ! isset($_POST['private'])) $public = 1 ;
                    else $public  =  0 ;
                     
                    $user_id = (int)$_SESSION['user_id'];
                    
                    // ajouter le post 
                    addPost($user_id, $post, $public) ;


                    // pop-up pour informer l'utilisateur que le post est en ligne
                    // pour eviter le renvoie du formulaire 
                    echo '
                    <script >
                        alert("Votre post a bien été mis en ligne !") ;
                        window.location.href="addpost.php"
                    </script>   ';
                }
            ?>

            <h1>Post</h1>

            <!-- formulaire pour enregistrer un post -->
            <form method="post" >
                <section>
                    <label for="post"></label>
                    <textarea rows="10" cols="50" name="post" placeholder="Partage ici tes envies ! &hearts;" maxlength="300" required autofocus></textarea>
                    <p class="info">Nb: Votre post ne doit pas faire plus de 300 caractères.</p>
                </section>


                <!-- checkbox privé ou public -->
                <section>
                    <input type="checkbox" name="private">
                    <label for="private">Post privé</label>
                </section>

                <!-- Bouton d'envoie du formulaire -->
                <section>
                    <button type="submit" id="submit">Publier</button>
                </section>
            </form>

        </div>
    </main>
    
</body>
</html>