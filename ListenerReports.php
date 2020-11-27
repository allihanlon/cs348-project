<html>
<title>Podcast Reports</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	
	<link rel="icon" href="peaspod.jpeg" type="image/png" sizes="16x16">
</head>

<body>
<h1> Two Peas in a Podcast Podcast Reports </h1>


		<?php
		
		$servername = "mydb.itap.purdue.edu";
 		$username = "g1117061";
 		$password = "!@Pod2020";
 		$dbname = "g1117061"; 
 		// Create connection
 		$conn = mysqli_connect($servername, $username, $password , $dbname);
 		// Check connection
 		if (!$conn) {
 		die("Connection failed: " . mysqli_connect_error());
 		}
 		//echo "Connected successfully<br><br>";
		
		// For storing episode title
		$epTitle = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		   $epTitle = test_input($_POST["epTitle"]);
		}

		function test_input($data) 
		{
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
		
		// Query to get the correct host username for this episode
		$sql =  'SELECT username FROM Episode as E JOIN Podcast as P on E.podcastTitle = P.podcastTitle WHERE episodeTitle = \''. $epTitle . '\';';
		$userQuery = mysqli_query($conn, $sql);
		if($userQuery){
			if (mysqli_num_rows($userQuery) > 0) { //the username field is populated
				while($row = mysqli_fetch_assoc($userQuery)) {
					$username = $row['username'];
				}
			//sends the title of the podcast to the R script so that the plot can be generated.
			$out = shell_exec("Rscript --verbose reportGeneration_Listeners.R '$epTitle'");
			$showimage = '<img src= \''. $username . 'ListenersOverTime.jpeg\' alt=\'Listeners\'>';
			echo $showimage;
			} else { //userfield may be null
				echo "Error detecting username for specificed podcast.";
			}
		} else {
			echo $sql;
			echo "Error";
		}
		
	
		?>
		