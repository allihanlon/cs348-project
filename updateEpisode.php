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
	
	if (mysqli_num_rows($episodeIDQuery) > 0) { // there must be one episode that exists with these attributes, so the host must want to edit it

		while($row = mysqli_fetch_assoc($episodeIDQuery)) { //grab the appropriate episodeID
			$episode = $row['episodeID'];
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
			echo "Description: " . $description . "<br>";
		} else {
			echo "Failed to update the episode information. <br>";
		}
		
	} else { //either the episodeID doesnt exist because the host put in incorrect information, or the podcast title is wrong!
		//Find out if the podcast title exists in the database
		$sql =  'SELECT podcastTitle FROM Podcast WHERE podcastTitle = \''. $Ptitle . '\';';
		$podcastQuery = mysqli_query($conn, $sql);
		
		if($podcastQuery){
			if (mysqli_num_rows($podcastQuery) > 0) { //the podcast is valid and the user must want to add a new episode
				
				//try to insert a new episode into the database 

				$sql2 =  'INSERT INTO Episode(episodeTitle, podcastTitle, description) VALUES (\''. $Etitle . '\', \''. $Ptitle . '\', \''. $description . '\');';
				echo $sql2. "<br>";
				$result = mysqli_query($conn, $sql2);

				if ($result) {
				    echo "New record created successfully<br>";
					echo "Podcast Title: " . $Ptitle . "<br>";
					echo "Podcast Episode: " . $Etitle . "<br>";
					echo "Description: " . $description . "<br>";
				} else {
				    echo "Error inserting new episode, please remove all single quotes (')from your episode description, consider using (`) instead. <br>";
				}
			} else { //podcast title does not exist in the database
					echo "You may have a misspelling in your entry, or the podcast does not exist.<br>";
			}
		} //end if podcastQuery statement
	}//end if numrows episodeQuery statement
} // end episode ID query


$home = "https://web.ics.purdue.edu/~g1117061";
echo "Click <a href=$home>here</a> to return to the home page";

?>

