<?php 
    // connexion à la base de données
    include 'db_connect.php';
    require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_post.css">
    <title>Post</title>
</head>
<body>
    <?php
           

        // récéparation de toutes les données du post, ainsi que de ses commentaires, et le nombre de like
        $post = mysqli_fetch_assoc (mysqli_query ($conn, "SELECT * FROM Post WHERE id_post=".$idpost."" ));
        $pseudo = mysqli_fetch_assoc (mysqli_query($conn, "SELECT pseudo From Utilisateur WHERE id=".$post['id_posteur']."") )['pseudo'];


        // préparation de l'affichage des données
        $post_message = stripslashes($post["message"]);
        $heure_publi = substr($post["heure_date_publication"], 10, -6) . 'h' . substr($post["heure_date_publication"], 14, -3);
        $jour_publi = substr($post["heure_date_publication"], 0, 10);
        
        
    // affiche du post avec les valeurs précédentes
        echo 
        '<div class="post">
    
            <p>Publié par <a href="user.php?pseudo='.$pseudo.'">'.$pseudo.'</a> à '.$heure_publi.' le '.$jour_publi.' </p> <br>
        
            <p><a href="pagepost.php?idpost='.$idpost.'">'.$post_message.'</a></p> <br>' ;


        echo 
        '</div>';
    ?>
</body>
</html>
