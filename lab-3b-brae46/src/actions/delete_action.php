<?php
error_reporting(-1);
session_start();

// Read variables and create connection
$mysql_servername = getenv("MYSQL_SERVERNAME");
$mysql_user = getenv("MYSQL_USER");
$mysql_password = getenv("MYSQL_PASSWORD");
$mysql_database = getenv("MYSQL_DATABASE");

$conn = new mysqli($mysql_servername, $mysql_user, $mysql_password, $mysql_database);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$id = $_POST['id'];

// $regStatement = "SELECT done FROM task WHERE id = $id";
// $idStmt = $conn->query($regStatement);

$regStatement = "DELETE FROM task WHERE id = ?";
$stmt = $conn->prepare($regStatement);
$stmt -> bind_param("i", $id); 
$stmt -> execute();
$stmt->close();

header("Location:../index.php");

?>