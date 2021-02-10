<?php
error_reporting(-1);
session_start();


function error($stringError){ //issue here when echo is first the page doesnt reload and when header is first no error pops up
	$_SESSION["errorL"] = "$stringError";
	header("Location:../views/login.php");
	die();	
}

// Read variables and create connection
$mysql_servername = getenv("MYSQL_SERVERNAME");
$mysql_user = getenv("MYSQL_USER");
$mysql_password = getenv("MYSQL_PASSWORD");
$mysql_database = getenv("MYSQL_DATABASE");

// This section for DEBUGGING ONLY! COMMENT-OUT WHEN FINISHED
// echo "<p>mysql_servername: $mysql_servername</p>";
// echo "<p>mysql_user: $mysql_user</p>";
// echo "<p>mysql_password: $mysql_password</p>";
// echo "<p>mysql_database: $mysql_database</p>";

$conn = new mysqli($mysql_servername, $mysql_user, $mysql_password, $mysql_database);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 
// else {
// 	echo "Database Connection Success";
// }
$username = $_POST['username'];
$password = $_POST['password'];

// TODO: Log the user in
//if user exists
$regStatement = 'SELECT username FROM user WHERE username = ?';
$stmt = $conn->prepare($regStatement);
$stmt -> bind_param("s", $username);
$stmt -> execute();
$stmt -> bind_result($resultStmt);
$stmt -> fetch();
$stmt -> close();

if (!$resultStmt) {
	error("Username not found");
}

// $hashed_password1 = password_hash($password, PASSWORD_DEFAULT);
//pull password
$regStatement = 'SELECT password, id FROM user WHERE username = ?';
$stmt = $conn->prepare($regStatement);
$stmt -> bind_param('s', $username);
$stmt -> execute();
$stmt -> bind_result($hashed_password, $user_id);
$stmt -> fetch();
$stmt -> close();

//passwords match?

// if($hashed_password != $hashed_password1){
if (!password_verify($password, $hashed_password)) {
	error("Incorrect Password");
}
$_SESSION['username'] = $username;
//$_SESSION['user_id'] = $id;
$_SESSION['logged_in'] = 1;
$_SESSION['user_id'] = $user_id;

$regStatement = 'UPDATE user SET logged_in = ? WHERE username = ?';
$stmt = $conn->prepare($regStatement);
$stmt -> bind_param("is", $_SESSION["logged_in"], $_SESSION["username"]); //issue here but idk what. Ive tried hash_password and password
$stmt -> execute();
$stmt->close();

// $_SESSION['username'] = $username;
// $_SESSION['logged_in'] = 1;
//$_SESSION['id'] = $id;
	//Set session variables
header("Location: ../index.php");
	//send to index.php
	//set logged_in variables to true	

?>