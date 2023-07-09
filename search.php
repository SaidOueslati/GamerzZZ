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
    <link rel="stylesheet" href="search.css">
    <title>Recherche</title>
</head>
<body>
    <!-- affiche de la nav bar -->
    <?php include 'navbar.php'; ?>

    <main>
        <br>
        <br>
        <div id="conteneur">
            <h1>Fonction de recherche</h1>
            <!-- Formulaire de recherche -->
            <form method="get" >
                    <section id="choix">
                        <label for="type">Que recherchez-vous ?</label>
                        <section>
                            <input type="radio" id="post" name="type" value="post" checked>
                            <label for="post">Post</label>
                        </section>

                        
                        <section>
                            <input type="radio" id="user" name="type" value="user">
                            <label for="user">Utilisateur</label>
                        </section>
                    </section>

                    <section id="entrée">
                        <label for="rechercher"></label>
                        <input type="text" name="rechercher" placeholder="Mot clef ou pseudonyme"  required autofocus>
                    </section>

                    
                    <section id="bouton">
                        <button>Rechercher</button>
                    </section>
            </form>
        </div>
        <?php

            // teste si le formulaire a déjà été rempli
            if (isset($_GET['rechercher'])){ 

                $pasderes = true ;
                $rechercher = protection( $_GET['rechercher']) ;


                // test pour savoir dans quelle table de donnée rechercher
                if ($_GET['type'] === 'user' ){ 

                    // On gère le résultat de la recherche dans un autre fichier pour le styling, pour une recherhce sur un utilisateur
                    include 'searchResults.php';
                    $pasderes = false ;
                        
                } else {

                    // commande pour la recherche d'un post comprennant le mots clé
                    $commandPost = "SELECT id_post, public, id_posteur FROM Post WHERE message LIKE '%".$rechercher."%'  " ;
                    
                    
                    $resEX = getArraySQL($commandPost) ;
                    
                    // test pour savoir si il y a des résultats
                    if ($resEX !== NULL){
                        for ($i = 0 ; $i < count($resEX) ; $i++){
                            
                            // test pour savoir si l'utilisateur connecter est bien propriétaire du post 
                            // dans le cas où le post est privé
                            $print = isset ($_SESSION['id_user']) ? $resEX[$i]['public'] == 1 
                                        or $_SESSION['id_user'] == $resEX[$i]['id_posteur'] : $resEX[$i]['public'] == 1 ;

                            if ($print){
                                getPost($resEX[$i]['id_post'], 0);
                                $pasderes = false ;
                            }
                        }
                    }
                }
                
                if ($pasderes){ // cas où aucun résultat n'est trouvé. Style très basique mis au sein de la balise.
                    echo "<p style='color:white;margin-left:150px'>Il n'y a pas de résultats pour votre recherche.</p>" ;
                }
            }
        ?>
    </main>
</body>
</html>

