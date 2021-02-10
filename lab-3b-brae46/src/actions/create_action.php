<?php
error_reporting(-1);
session_start();


function error($stringError){ //issue here when echo is first the page doesnt reload and when header is first no error pops up
	$_SESSION["errorC"] = "$stringError";
	header("Location:../index.php");
	die();	
}

// Read variables and create connection
$mysql_servername = getenv("MYSQL_SERVERNAME");
$mysql_user = getenv("MYSQL_USER");
$mysql_password = getenv("MYSQL_PASSWORD");
$mysql_database = getenv("MYSQL_DATABASE");

$conn = new mysqli($mysql_servername, $mysql_user, $mysql_password, $mysql_database);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
} 

$text = $_POST['text'];
$date = $_POST['date'];
$user_id = $_SESSION['user_id'];
$done = 0;

//insert data into table
if ($text != '' && $date != '') {
	$sqlInsert = "INSERT INTO task (user_id, text, date, done)
    VALUES (?, ?, ?, ?)"; //or ? and add fourth param to line 39
    $stmt = $conn->prepare($sqlInsert);
    $stmt -> bind_param("issi", $user_id, $text, $date, $done /*$user_id (is this necessary?)*/);
    $stmt -> execute();
    $stmt -> close();

// OR THIS?? 
// $regStatement = 'UPDATE task SET text = ? AND date = ? AND done = ? WHERE user_id = $user_id';
// $stmt = $conn->prepare($regStatement);
// $stmt -> bind_param("ssii", $_SESSION["text"], $_SESSION["date"]);
// $stmt -> execute();
// $stmt->close();
// $_SESSION["text"] = $text;
// $_SESSION["date"] = $date;
// $_SESSION["user_id"] = $user_id; 
//$_SESSION["id"] = $id;

header("Location:../index.php");
}

else{
    error("Please fill in both inputs");
}
?>