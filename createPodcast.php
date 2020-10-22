<html>
<head>
	<link rel = "stylesheet" type = "text/css" href = "mystyle.css" />
</head>
</html>

<?php

include "include/redirect.php";

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

$servername = "mydb.itap.purdue.edu";
$username = "g1117061";
$password = "!@Pod2020";
$dbname = "g1117061";

// Create connection
$conn = mysqli_connect($servername, $username, $password , $dbname);

$sql =  'SELECT podcastTitle FROM Podcast WHERE podcastTitle = \''. $Ptitle . '\';';
$query = mysqli_query($conn, $sql);
if (mysqli_num_rows($query) != 0) {
	echo "Sorry, this podcast already exists! Please enter another podcast name.";
} else{
	$sql =  'SELECT username FROM User WHERE username = \''. $u_username . '\';';
$query = mysqli_query($conn, $sql);
	if (mysqli_num_rows($query) == 0) {
	echo "Sorry, this user does not exist! Please enter your username.";
	} else {
		$sql1 = "INSERT INTO Podcast (podcastTitle, username, genre, description) VALUES ('$pTitle','$u_username','$genre','$description');";
		$result1 = mysqli_query($conn, $sql1);
		echo "Thank you! Your Podcast has been added to our database. Click the link below to be redirected to the homepage and login: ";	
		echo "<br><a href=https://web.ics.purdue.edu/~g1117061>Home</a>";}
	}
mysqli_close($conn);

?>