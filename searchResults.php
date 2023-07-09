<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_resRecherche.css">
    <title>searchResults</title>
</head>
<body>
    <div id="res">
        <h1>Utilisateurs trouvés: </h1>
        <br>
        <p>
            <?php

                $rechercher = (string)$rechercher;
                $commandUser = "SELECT pseudo FROM Utilisateur WHERE pseudo LIKE '%{$rechercher}%'" ;
                $resUser = getArraySQL($commandUser) ;

                // si il y des résultats ils sont afficher
                if (isset($resUser[0])){
                    for ($i = 0 ; $i < count($resUser) ; $i++){
                        $page = "user.php?pseudo=".$resUser[$i]['pseudo'] ;
                        echo "<a href=".$page.">".$resUser[$i]['pseudo']."</a> <br>";
                    }
                } else {// message pour dire que il n'y a pas de résultat
                    echo "<p>Il n'y a pas de résultats pour votre recherche.</p>";
                }
            ?>
        </p>
    </div>
</body>
</html>