<?php
session_start();

function error($stringError){ //issue here when echo is first the page doesnt reload and when header is first no error pops up
	$_SESSION["error"] = "$stringError";
	header("Location:../views/register.php");
	die();
}

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
//else {
// 	echo "Database Connection Success";
//}


//create new user in the database
$username = $_POST['username'];
$password = $_POST['password'];
$confPassword = $_POST['confirmation_password'];


//username taken?
$regStatement = 'SELECT username FROM user WHERE username = ?';
$stmt = $conn->prepare($regStatement);
$stmt -> bind_param("s", $username);
$stmt -> execute();
$stmt -> bind_result($resultStmt);
$stmt -> fetch();

if ($resultStmt) {
	error("Username taken");
	//send to register page
}
//passwords match?
if($password != $confPassword){
	error("Passwords dont match");
	//send to register page
}
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$logged_in = 1;

$sqlInsert = "INSERT INTO user (username, password, logged_in)
VALUES (?, ?, ?)"; //do each of these need single quotes?
$stmt = $conn->prepare($sqlInsert);
$stmt -> bind_param("ssi", $username, $hashed_password, $logged_in);
$stmt -> execute();
$user_id = $stmt->insert_id;
$stmt -> close();

//session variables
$_SESSION["username"] = $username;
$_SESSION["logged_in"] = 1;
$_SESSION["user_id"] = $user_id;


header("Location:../index.php");

?>
