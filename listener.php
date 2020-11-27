<?php
require 'rb.php';

$Ptitle = $Etitle= $user = $dateListened = $episodeID = $episodeIDQuery = $checkListen = $listenQuery = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   $user = test_input($_POST["username"]);
   $Ptitle = test_input($_POST["Ptitle"]);
   $Etitle = test_input($_POST["Etitle"]);
   $dateListened = test_input(date('Y-m-d', strtotime($_POST["dateListened"])));
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

$conn = mysqli_connect($servername, $username, $password , $dbname);

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
		mysqli_close($conn);
		//-------ORM-------//
		//establish connection to the db
		R::setup('mysql:host=mydb.itap.purdue.edu; dbname=g1117061',"g1117061", "!@Pod2020");
		R::debug(false);
		$isConnected = R::testConnection();
					
		//find the bean that has the correct username and save it
		$sql3 = 'SELECT listenerID FROM Listen WHERE username = "'.$user.'" AND episodeTitle = "'.$Etitle.'";';
		$rows = R::getRow($sql3);
		$userBean = R::convertToBean('user', $rows);
		//closes the connection used for ORM
		R::close();
		//-------ORM-------//

if (count($rows) > 0) {
	echo "You have already listened to this Podcast! ";
} else {
	$conn = mysqli_connect($servername, $username, $password , $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	// the entry does not exist in the database, so we'll need to insert it
	//try to insert a new rating into the database 
	$sql = "INSERT INTO Listen(username, episodeTitle, dateListened) VALUES (?,?,?)";
	$stmt= $conn->prepare($sql);
	$stmt->bind_param("sss", $user, $Etitle, $dateListened);	// let SQL know that you are looking for 3 string variables ("sss")
	$stmt->execute();
	
	echo "New record created successfully<br>";
	echo "Podcast Title: " . $Ptitle . "<br>";
	echo "Podcast Episode: " . $Etitle . "<br>";
	echo "Date Listened: " . $dateListened . "<br>";
	mysqli_close($conn);
}

	} else {
			echo "You may have a misspelling in your entry, or the listed episode and podcast do not exist.<br>";
	}
}
 
$home = "https://web.ics.purdue.edu/~g1117061/ListenerForms";
echo "Click <a href=$home>here</a> to return to the home page";

?>

