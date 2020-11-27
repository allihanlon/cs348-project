	<script> 
	function VALIDATE()                                    
	{ 
	    var title = document.forms["ShowEpisodeForm"]["title"];
	
   
	    if (title.value.length < 0 || title.value.length > 100 || title.value == "")
		{ 
	        window.alert("Title is either empty or too long. You may not exceed 100 characters."); 
	        name_.focus(); 
	        return false; 
	    } 
	}</script> 		
		
		<form name = "ShowEpisodeForm" onsubmit="return VALIDATE()" method = "post">
	
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
		   //header("Location:https://web.ics.purdue.edu/~g1117061/ShowEpisodes.php");
		}



		function test_input($data) 
		{
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
  
		  return $data;
		}
		
		
		//include "include/redirect.php";
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
		
		
		
		
		//$title = "Girls Gotta Eat";
	
		
 		/////////////////////////////////////////////////////
 		//print Episode table
		$sql =  'SELECT episodeTitle FROM Episode WHERE podcastTitle = \''. $title . '\' ORDER BY episodeID DESC;';
 		$result = mysqli_query($conn, $sql);
 		if($result){
			
 			echo "<h3 style= 'text-align:left;'>Episode List for $title:</h3>";
 		} else {
 			 echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
 		}
		?>
		<table class = "episodeList">
		<?php
 		//echo "<th> Episode </th>";
		

 		if (mysqli_num_rows($result) > 0) {
			echo "<th> Episode </th>";
 			while($row = mysqli_fetch_assoc($result)) {
					
 					echo "<tr style = text-align:left>"; // start row
 					echo "<td style='height:100px, width:100px'>" . $row['episodeTitle']. "</td>";
 					echo "</tr>"; // end row
 			}
 			echo "</table>";
 		} else {
 			echo "There are not results matching the title '$title' Please enter a valid podcast.";
 		}
 		?>