<?php
session_start();
require_once('db_connect.php');
require_once('functions.php');
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="inscription.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="inscription.css">
</head>
<?php 

if(isset($_POST['submit'])) {
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    
    // Check if the username and password match a user in the database
    $query = "SELECT * FROM Utilisateur WHERE pseudo='$pseudo'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 0) {
        if ($_POST['mdp'] === $_POST['confirmation']) {
			$pseudo = protection($_POST['pseudo']);
			$mdp = protection($_POST['mdp']);

			$mdpHashed = password_hash($mdp, PASSWORD_DEFAULT);
			// User found, create session variables and redirect to home page
			$query = "INSERT INTO Utilisateur(pseudo,mdp) VALUES('$pseudo', '$mdp')";
        	$result = mysqli_query($conn, $query);
        	header('Location: login.php');
		} else {
			$mpdDiff = "Passwords do not match!";
		}
    }
    else {
        $mpdDiff = "Pseudo is already used";
    }
}
unset($_POST);
?>
<body>
    <?php include 'navbar.php'; ?>
	<h1>Sign up</h1>
	<form method="POST" action="">
		<label for="pseudo">Pseudo:</label>
		<input type="text" name="pseudo" required>
		<br>
		<label for="mdp">Password:</label>
		<input type="password" name="mdp" required>
		<br>
		<label for="confirmation">Confirm your password:</label>
		<input type="password" name="confirmation" required>
		<br>
		<p class="info2"><?php if (isset($mpdDiff)) echo $mpdDiff ;?></p></p>
        <?php unset($mpdDiff) ?>
		
		<input type="submit" name="submit" value="S'inscrire">
	</form>
</body>
</html>