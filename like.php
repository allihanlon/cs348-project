<?php


$Ptitle = $Etitle= $user = $rating = $dateLiked = $episodeID = $episodeIDQuery = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   $user = test_input($_POST["username"]);
   $Ptitle = test_input($_POST["title"]);
   $Etitle = test_input($_POST["epiTitle"]);
   $rating = test_input($_POST["rating"]);
   $dateLiked = test_input(date('Y-m-d', strtotime($_POST["dateLiked"])));
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
//echo "Connected successfully<br><br>";

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

//check if the entry already exists in the db
$check =  'SELECT ratingID FROM Likes WHERE username = \''. $user . '\'AND episodeID=\''. $episode . '\';';
$checkQuery = mysqli_query($conn, $check);

//
if($checkQuery){
	if (mysqli_num_rows($checkQuery) > 0) {

		while($row = mysqli_fetch_assoc($checkQuery)) {
			$ratingID = $row['ratingID'];
		}
		
		//there must be at least one row in the result, so we can update the entry in the DB
		$update = 'UPDATE Likes SET rating =\''. $rating . '\' WHERE ratingID=\''. $ratingID . '\';';
		//echo $update;
		$updateQuery = mysqli_query($conn, $update);
		//grab the rating ID
		if($updateQuery){
		    echo "Updated record successfully<br>";
			echo "Podcast Title: " . $Ptitle . "<br>";
			echo "Podcast Episode: " . $Etitle . "<br>";
			echo "Your Rating: " . $rating . "<br>";
			echo "Date Liked: " . $dateLiked . "<br>";
		} else {
			echo "Failed to update the rating. <br>";
		}
		
	} else {
		// the entry does not exist in the database, so we'll need to insert it
		
		//try to insert a new rating into the database 

		$sql2 =  'INSERT INTO Likes(username, episodeID, rating, dateLiked) VALUES (\''. $user . '\', \''. $episode . '\', \''. $rating . '\', \''. $dateLiked . '\')';

		$result = mysqli_query($conn, $sql2);

		if ($result) {
		    echo "New record created successfully<br>";
			echo "Podcast Title: " . $Ptitle . "<br>";
			echo "Podcast Episode: " . $Etitle . "<br>";
			echo "Your Rating: " . $rating . "<br>";
			echo "Date Liked: " . $dateLiked . "<br>";
		} else {
		    echo "";
		}
		
	}
}





 
$home = "https://web.ics.purdue.edu/~g1117061";
echo "Click <a href=$home>here</a> to return to the home page";

?>

