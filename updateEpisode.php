<?php

$Ptitle = $ETitle = $user = $description = $updateQuery = $episodeID  = $episode = $update = $episodeIDQuery = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   $user = test_input($_POST["username"]);
   $Ptitle = test_input($_POST["pTitle"]);
   $Etitle = test_input($_POST["eTitle"]);
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

//Find the episodeID that matches the podcast and the episode title
$sql =  'SELECT episodeID FROM Episode WHERE podcastTitle = \''. $Ptitle . '\' AND episodeTitle =  \''. $Etitle . '\';';
$episodeIDQuery = mysqli_query($conn, $sql);

if($episodeIDQuery){
	if (mysqli_num_rows($episodeIDQuery) > 0) {

		while($row = mysqli_fetch_assoc($episodeIDQuery)) {
			$episode = $row['episodeID'];
		}
	} else {
			echo "You may have a misspelling in your entry, or the listed episode and podcast do not exist.<br>";
	}
}
echo $sql;
echo $episodeIDQuery;

if($episodeIDQuery){
	if (mysqli_num_rows($episodeIDQuery) == 0) {
		echo "You may have a misspelling in your entry, or the listed podcast does not exist.<br>";
	}
}

//Update the podcast description that the host chooses
$update = 'UPDATE Episode SET episodeTitle =\''. $Etitle . '\', description=\''. $description . '\' WHERE episodeID=\''. $episode . '\';';
echo $update;
$updateQuery = mysqli_query($conn, $update);

//Print the request
if($updateQuery){
    echo "Updated record successfully<br>";
	echo "Podcast Title: " . $Ptitle . "<br>";	
	echo "Episode Title: " . $Etitle . "<br>";
	echo "Description: " . $comment . "<br>";
} else {
	echo "Failed to update the episode information. <br>";
}
 
$home = "https://web.ics.purdue.edu/~g1117061";
echo "Click <a href=$home>here</a> to return to the home page";

?>

