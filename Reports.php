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
		
	
 		/////////////////////////////////////////////////////
 		//print Top 5 Episodes table
		$sql = 'SELECT L.episodeTitle as Episode, E.podcastTitle as Title, COUNT(L.listenerID) as Listens FROM Listen L JOIN Episode E ON E.episodeTitle =L.episodeTitle GROUP BY (E.podcastTitle) ORDER BY COUNT(L.ListenerID) DESC LIMIT 5';
		//$sql =  'SELECT episodeTitle FROM Episode WHERE podcastTitle = \''. $title . '\' ORDER BY episodeID DESC;';
 		$result = mysqli_query($conn, $sql);
 		if($result){
			
 			echo "<h3 style= 'text-align:left;'>Top 5 Most Popular Episodes:</h3>";
 		} else {
 			 echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
 		}
		?>
		<table border = 1, class = "popular List">
		<?php

		//prints the table row by row
 		if (mysqli_num_rows($result) > 0) {
			echo "<th> Episode </th>";
			echo "<th> Podcast </th>";
			echo "<th> Total Listens </th>";
 			while($row = mysqli_fetch_assoc($result)) {
					
 					echo "<tr style = text-align:center>"; // start row
 					echo "<td style='height:100px, width:100px'>" . $row['Episode']. "</td>";
					echo "<td style='height:100px, width:100px'>" . $row['Title']. "</td>";
					echo "<td style='height:100px, width:100px'>" . $row['Listens']. "</td>";
 					echo "</tr>"; // end row
 			}
 			echo "</table>";
 		} else {
 			echo "There was a error.";
 		}
 		?>	
		
		<!--asks the user for a podcast to see ratings over time-->
		<form name = "PodcastForm" method = "post">
		<table width= "100%">
		<tr><td> Podcast Title: <input type="text" size=40 name="title" value = "Girls Gotta Eat"> 
		</td><td> <input type = "submit" name = "submit" value="Submit here" style = "float:right;"/>
		</table>
		</form>
		
		
		<?php
		
		$title = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		   $title = test_input($_POST["title"]);
		   $epTitle = test_input($_POST["epTitle"]);
		}

		function test_input($data) 
		{
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
  
		  return $data;
		}
		
		$sql =  'SELECT username FROM Podcast WHERE podcastTitle = \''. $title . '\';';
		$userQuery = mysqli_query($conn, $sql);
		if($userQuery){
			if (mysqli_num_rows($userQuery) > 0) { //the username field is populated

				while($row = mysqli_fetch_assoc($userQuery)) {
					$username = $row['username'];
				}
			
			} else { //userfield may be null
				echo "Error detecting username for specificed podcast.";
			}
		} else {
			echo "Error";
		}
				
		//sends the title of the podcast to the R script so that the plot can be generated.
		//echo $title;
		//$out = shell_exec("Rscript --verbose writeTrafficTimes.R $region $edgeNum");
		$out = shell_exec("Rscript --verbose reportGeneration.R '$title'");
		//sends the title of the podcast to the R script so that the plot can be generated.
		$out2 = shell_exec("Rscript --verbose reportGeneration_Listeners.R '$title'");
		//return value of the script is the outputs from the R script
		//Example:
		//echo "<img src='raynaGreenRatingsOverTime.jpeg' alt='Ratings'>";
		//echo $out;
		//echo $username;
		//echo 'img src= \''. $username . '\'RatingsOverTime.jpeg\' alt=\'Ratings\'';
		$showimage = '<img src= \''. $username . 'RatingsOverTime.jpeg\' alt=\'Ratings\'>';
		$showimage2 = '<img src= \''. $username . 'ListenersOverTime.jpeg\' alt=\'Listeners\'>';
		echo $showimage;
		echo $showimage2;
		
	
		?>
		