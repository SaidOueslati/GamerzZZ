<?php
session_start();
require_once('db_connect.php');

if(isset($_POST['submit'])) {
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    
    // Check if the username and password match a user in the database
    $query = "SELECT * FROM Utilisateur WHERE pseudo='$pseudo' AND mdp='$mdp'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 1) {
        // User found, create session variables and redirect to home page
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['pseudo'] = $row['pseudo'];
        $_SESSION['admin'] = $row['admin'];
        header('Location: home.php');
    }
    else {
        echo "<p>Incorrect username or password.</p>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <?php include 'navbar.php'; ?>
	<h1>Login</h1>
	<form method="POST" action="">
		<label for="pseudo">Pseudo:</label>
		<input type="text" name="pseudo" required>
		<br>
		<label for="mdp">Password:</label>
		<input type="password" name="mdp" required>
		<br>

		<input type="submit" name="submit" value="Se connecter">
	</form>
</body>
</html>
