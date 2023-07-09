<?php
    session_start();
    include 'db_connect.php';
    require_once('functions.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
	<?php include 'navbar.php'; ?>
	<?php include 'homepage.php'; ?>

</html>
