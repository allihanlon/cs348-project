
<html>
<title>Comment</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	
	<link rel="icon" href="peaspod.jpeg" type="image/png" sizes="16x16">
</head>

<body>
<h1> Two Peas in a Podcast Comment Page </h1>

<?php
/* Tell mysqli to throw an exception if an error occurs */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$Ptitle = $Etitle= $user = $comment = $dateLiked = $episodeID = $episodeIDQuery = $checkListen = $listenQuery = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   $user = test_input($_POST["username"]);
   $Ptitle = test_input($_POST["title"]);
   $Etitle = test_input($_POST["epiTitle"]);
   $comment = test_input($_POST["comment"]);
   $dateCommented = test_input(date('Y-m-d', strtotime($_POST["dateCommented"])));
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
$check =  'SELECT commentID FROM Comments WHERE username = \''. $user . '\'AND episodeID=\''. $episode . '\';';
$checkQuery = mysqli_query($conn, $check);

//
if($checkQuery){
	if (mysqli_num_rows($checkQuery) > 0) {

		while($row = mysqli_fetch_assoc($checkQuery)) {
			$commentID = $row['commentID'];
		}
		

		/* Start transaction */
		$conn->autocommit(FALSE); //need to turn off autocommit or else this page will be sent to the db
		//set the isolation level to just lock one row
		mysqli_query($conn, "SET TRANSACTION ISOLATION LEVEL REPEATABLE READ;");
		mysqli_query($conn, "START TRANSACTION;");
	        //echo "UPDATE Comments SET description = \''. $comment . '\', dateCommented= \''. $dateCommented . '\' WHERE commentID=\''. $commentID . '\' ;";
			

		try {
			$sql = 'UPDATE Comments SET description = \''. $comment . '\', dateCommented= \''. $dateCommented . '\' WHERE commentID='. $commentID . ';';
			mysqli_query($conn, $sql);

			//$sql = "UPDATE Comments SET description=?, dateCommented=? WHERE commentID=?";
			//$stmt= $conn->prepare($sql);
			//$stmt->bind_param("ssi", $comment, $dateCommented, $commentID);	// let SQL know that you are looking for 2 strings and an integer ("si")
			//$stmt->execute();

			/* If code reaches this point without errors then commit the data in the database */
			mysqli_commit($conn);

			echo "Updated record successfully<br>";
			echo "Podcast Title: " . $Ptitle . "<br>";
			echo "Podcast Episode: " . $Etitle . "<br>";
			echo "Your Comment: " . $comment . "<br>";
			echo "Date Liked: " . $dateLiked . "<br>";

		} catch (mysqli_sql_exception $exception) {
			mysqli_rollback($conn);
			echo "<br>threw error.<br>";
			throw $exception;
			echo $exception;
		}

		$conn->autocommit(TRUE);
		
		// Will also need to add them to the Listen table, if they are not in it yet
		$checkListen =  'SELECT listenerID FROM Listen WHERE username = \''. $user . '\'AND episodeTitle=\''. $Etitle . '\';';
		$listenQuery = mysqli_query($conn, $checkListen);
		
		if ($listenQuery) {
			if (mysqli_num_rows($listenQuery) > 0) {
				// echo "already a listener";
			} else {
				// the entry does not exist in the database, so we'll need to insert it
				//try to insert a new rating into the database 
				$sql = "INSERT INTO Listen(username, episodeTitle, dateListened) VALUES (?,?,?)";
				$stmt= $conn->prepare($sql);
				$stmt->bind_param("sss", $user, $Etitle, $dateCommented);	// let SQL know that you are looking for 3 string variables ("sss")
				$stmt->execute();
			}
		}

		
	} else {
		// the entry does not exist in the database, so we'll need to insert it
		//try to insert a new comment into the database 
		$sql = "INSERT INTO Comments(username, episodeID, description, dateCommented) VALUES (?,?,?,?)";
		$stmt= $conn->prepare($sql);
		$stmt->bind_param("ssss", $user, $episode, $comment, $dateCommented);	// let SQL know that you are looking for 4 string variables ("ssss")
		$stmt->execute();

		echo "New record created successfully<br>";
		echo "Podcast Title: " . $Ptitle . "<br>";
		echo "Podcast Episode: " . $Etitle . "<br>";
		echo "Your Comment: " . $comment . "<br>";
		echo "Date Commented: " . $dateCommented . "<br>";
		
		// Will also need to add them to the Listen table, if they are not in it yet
		$checkListen =  'SELECT listenerID FROM Listen WHERE username = \''. $user . '\'AND episodeTitle=\''. $Etitle . '\';';
		$listenQuery = mysqli_query($conn, $checkListen);
		
		if ($listenQuery) {
			if (mysqli_num_rows($listenQuery) > 0) {
				// echo "already a listener";
			} else {
				// the entry does not exist in the database, so we'll need to insert it
				//try to insert a new rating into the database 
				$sql = "INSERT INTO Listen(username, episodeTitle, dateListened) VALUES (?,?,?)";
				$stmt= $conn->prepare($sql);
				$stmt->bind_param("sss", $user, $Etitle, $dateCommented);	// let SQL know that you are looking for 3 string variables ("sss")
				$stmt->execute();
			}
		}
		
	}
}

 
$home = "https://web.ics.purdue.edu/~g1117061";
echo "Click <a href=$home>here</a> to return to the home page";

?>

