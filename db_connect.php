<?php

// Set database credentials
$host = "localhost";
$username = "admin";
$password = "admin";
$database = "base";

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check for errors
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
