<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="home_connecté.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <title>Home</title>
</head>

<!-- Barre de navigation d'un utilisateur connecté-->

<body>
    <main>
        <h1>Posts récents:</h1>
        <!-- Fonction pour afficher les 10 posts les plus récents -->
        <?php getRecentPosts(10)?>
    </main>
</body>
</html>
