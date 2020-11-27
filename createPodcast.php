<html>
<head>
	<link rel = "stylesheet" type = "text/css" href = "mystyle.css" />
</head>
</html>

<?php

include "include/redirect.php";
require 'rb.php';

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$u_username = test_input($_POST["username"]);
$pTitle = test_input($_POST["pTitle"]);
$genre = test_input($_POST["genre"]);
$description = test_input($_POST["description"]);

//-------ORM-------//
//establish connection to the db
R::setup('mysql:host=mydb.itap.purdue.edu; dbname=g1117061',"g1117061", "!@Pod2020");
R::debug(false);
$isConnected = R::testConnection();
					
//find the bean that has the correct commentID and save it
$sql3 = 'SELECT podcastTitle FROM Podcast WHERE podcastTitle = "'.$pTitle.'";';
$rows = R::getRow($sql3);
$podBean = R::convertToBean('podcast', $rows);
//closes the connection used for ORM
//-------ORM-------//


if (count($rows)> 0) {
	echo "Sorry, this podcast already exists! Please enter another podcast name.";
} else {
	//-------ORM-------//				
	//find the bean that has the correct commentID and save it
	$sql3 = 'SELECT username FROM User WHERE username = "'.$u_username.'";';
	$rows = R::getRow($sql3);
	$userBean = R::convertToBean('user', $rows);
	//closes the connection used for ORM
	R::close();
	//-------ORM-------//
	if (count($rows) == 0) {
		echo "Sorry, this user does not exist! Please enter your username.";
	} else {
		$servername = "mydb.itap.purdue.edu";
		$username = "g1117061";
		$password = "!@Pod2020";
		$dbname = "g1117061";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password , $dbname);
		
		$sql = "INSERT INTO Podcast (podcastTitle, username, genre, description) VALUES (?,?,?,?)";
		$stmt= $conn->prepare($sql);
		$stmt->bind_param("ssss", $pTitle, $u_username, $genre, $description);	// let SQL know that you are looking for 4 string variables ("ssss")
		$stmt->execute();
		
		echo "Thank you! Your Podcast has been added to our database. Click the link below to be redirected to the homepage and login: ";	
		echo "<br><a href=https://web.ics.purdue.edu/~g1117061>Home</a>";}
		mysqli_close($conn);
	}
?>
