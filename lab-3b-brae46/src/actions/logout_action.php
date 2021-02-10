<?php
session_start();
// ./actions/logout_action.php

// Read variables and create connection
$mysql_servername = getenv("MYSQL_SERVERNAME");
$mysql_user = getenv("MYSQL_USER");
$mysql_password = getenv("MYSQL_PASSWORD");
$mysql_database = getenv("MYSQL_DATABASE");
$conn = new mysqli($mysql_servername, $mysql_user, $mysql_password, $mysql_database);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
// else {
// 	echo "Database Connection Success";
// }

// TODO: Log the user out
$logged_in = 0;
$_SESSION["logged_in"] = 0;

$regStatement = 'UPDATE user SET logged_in = ? WHERE username = ?';
$stmt = $conn->prepare($regStatement);
$stmt -> bind_param("is", $_SESSION["logged_in"], $_SESSION["username"]); //issue here but idk what. Ive tried hash_password and password
$stmt -> execute();
$stmt->close();

session_unset();
session_destroy();
header("Location:../views/login.php");


?>
