<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="navbar_connecté.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <title>navbar</title>
</head>

<!-- Barre de navigation d'un utilisateur connecté-->

<body>
    <nav>
        <a class="logo" href="home.php">GamerzZZ</a>

        <!-- Différentes pages avec liens -->
        <ul>
            <li><a href="user.php"><?php echo "<span>".$_SESSION['pseudo']."</span>";?></a></li>
            <li><a href="addpost.php">Add a post</a></li>
            <li><a href="home.php">Home</a></li>
            <li><a href="search.php">Search</a></li>
        </ul>

        <!-- Bouton pour déconnecter un utilisateur  -->
        <!-- Renvoie sur la page logout.php -->
        <span>
            <?php echo "<span>".$_SESSION['pseudo']."</span>";?>
            <button onclick="location.href='logout.php'" type="button">Déconnexion</button>
        </span>
    </nav>
</body>
</html>
