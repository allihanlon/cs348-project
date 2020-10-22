<?php

$Ptitle = $user = $genre = $description = $Pquery = $updateQuery = $update = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   $user = test_input($_POST["username"]);
   $Ptitle = test_input($_POST["pTitle"]);
   $genre = test_input($_POST["genre"]);
   $description = test_input($_POST["description"]);
}

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  
  return $data;
}
 
$servername = "mydb.itap.purdue.edu";
$username = "g1117061";
$password = "!@Pod2020";
$dbname = "g1117061"; 
// Create connectioninclude 'like.php';

$conn = mysqli_connect($servername, $username, $password , $dbname);
// Check connectioninclude 'like.php';

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

//Find the podcast that matches the podcast title
$sql =  'SELECT podcastTitle FROM Podcast WHERE podcastTitle = \''. $Ptitle . '\';';
$Pquery = mysqli_query($conn, $sql);

if($Pquery){
	if (mysqli_num_rows($Pquery) == 0) {
		echo "You may have a misspelling in your entry, or the listed podcast does not exist.<br>";
	}
}

//Update the podcast description that the host chooses
$update = 'UPDATE Podcast SET genre =\''. $genre . '\', description=\''. $description . '\' WHERE podcastTitle=\''. $Ptitle . '\';';
//echo $update;
$updateQuery = mysqli_query($conn, $update);

//Print the request
if($updateQuery){
    echo "Updated record successfully<br>";
	echo "Podcast Title: " . $Ptitle . "<br>";
	echo "Genre: " . $genre . "<br>";
	echo "Description: " . $comment . "<br>";
} else {
	echo "Failed to update the podcast information. <br>";
}
 
$home = "https://web.ics.purdue.edu/~g1117061";
echo "Click <a href=$home>here</a> to return to the home page";

?>

