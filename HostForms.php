
<html>
<title>Host Forms</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	
	<link rel="icon" href="peaspod.jpeg" type="image/png" sizes="16x16">
	
	<script> 
	function ValidatePodcast(){ 
	    var username = document.forms["podcastForm"]["username"]; 
		var pTitle = document.forms["podcastForm"]["pTitle"]; 
		var genre = document.forms["podcastForm"]["genre"]; 
		var description = document.forms["podcastForm"]["description"]; 
   
	
		if (username.value.length < 0 || username.value.length > 20 || username.value == "")                                  
	    { 
	        window.alert("Username is either empty, too long."); 
	        email.focus(); 
	        return false; 
	    }
		
		if (pTitle.value.length < 0 || pTitle.value.length > 100 || pTitle.value == "")                                  
	    { 
	        window.alert("Podcast title is either empty, too long."); 
	        email.focus(); 
	        return false; 
	    }
		
		if (description.value.length < 0 || description.value.length > 4000 || description.value == "")                                  
	    { 
	        window.alert("Description is either empty, too long."); 
	        email.focus();
	        return false; 
	    }
	}
	
	function ValidateEpisode(){ 
	    var username = document.forms["episodeForm"]["username"]; 
		var pTitle = document.forms["episodeForm"]["pTitle"]; 
		var eTitle = document.forms["episodeForm"]["eTitle"]; 
		var description = document.forms["episodeForm"]["description"];
   
	
		if (username.value.length < 0 || username.value.length > 20 || username.value == "")                                  
	    { 
	        window.alert("Username is either empty or too long."); 
	        email.focus(); 
	        return false; 
	    }
		
		if (pTitle.value.length < 0 || pTitle.value.length > 100 || pTitle.value == "")                                  
	    { 
	        window.alert("Podcast title is either empty or too long."); 
	        email.focus(); 
	        return false; 
	    }
		
		if (eTitle.value.length < 0 || eTitle.value.length > 100 || eTitle.value == "")                                  
	    { 
	        window.alert("Episode title is either empty or too long."); 
	        email.focus(); 
	        return false; 
	    }
	
		if (description.value.length < 0 || description.value.length > 800 || description.value == "")                                  
	    { 
	        window.alert("Episode description is either empty or too long."); 
	        email.focus(); 
	        return false; 
	    }
	}

	</script>

	
</head>

<body>
<h1> Two Peas in a Podcast Host Homepage </h1>

<div id="main">

	<form action="https://web.ics.purdue.edu/~g1117061/Reports.php">
		<input type="submit" value="See Podcast Data" />
	</form> 
	<form action="https://web.ics.purdue.edu/~g1117061/ManageComments.php">
		<input type="submit" value="Manage Comments" />
	</form>
	<form action="https://web.ics.purdue.edu/~g1117061/ManageGuests.php">
		<input type="submit" value="Manage Guests" />
	</form>
	<form action="https://web.ics.purdue.edu/~g1117061/ManageTopics.php">
		<input type="submit" value="Manage Topics" />
	</form>


<div class="container"> <!-- beginning of the forms-->
<!--Start Block Comment
	<div class = "Update Podcast">
	
	<h4>Update Podcast Information:</h4>
	<form name = "podcastForm" onsubmit="return ValidatePodcast()" action="updatePodcast.php" method = "post">
	
	<table width= "50%">
	<tr><td> Your Username: <input type="text" size=20 name="username" value = "gretchenrubin">
	</td><td> Podcast Title: <input type="text" size=20 name="pTitle" value = "Happier">
	</td><td> Genre: <select id="genre", name = "genre">
						<option value = "Comedy">Comedy</option>
						<option value = "News">News</option>
						<option value = "Society and Culture">Society and Culture</option>
						<option value = "Sports">Sports</option>
						<option value = "True Crime">True Crime</option>
						<option value = "Other">Other</option></select></td>
	</td><td> Description: <input type="text" size=70 name="description"  value= "practical, manageable advice about happiness">
	</td><td><input type = "submit" name = "submit" value="Submit here" />
	</table>
	</form>
	</div> <!--end update podcast div-->
	
	<div class = "Update Episode">

	<h4>Add an Episode:</h4>
	<form name = "episodeForm" onsubmit="return ValidateEpisode()" action="updateEpisode.php" method = "post">
	
	<table width= "40%">
	<tr><td> Your Username: <input type="text" size=20 name="username" value = "gretchenrubin"> 
	</td><td> Podcast Title: <input type="text" size=20 name="pTitle" value = "Happier"> 
	</td><td> Episode Title: <input type="text" size=40 name="eTitle" value = "Little Happier - Travel Demand"> 
	</td><td> Description: <input type="text" size=70 name="description" value= "Lessons of induced travel demand applies to our lives">
	</td><td><input type = "submit" name = "submit" value="Submit here"/>
	</table>
	</form>
	</div><!--end update episode div-->

	<div class = "Podcast Episode Information">
	<h4>Enter Your Podcast to View Episodes</h4>
	<form name = "episodeDisplay" onsubmit="return ValidateEpisode()" method = "post">
	<table width= "40%">
	<tr><td> Podcast Title: <input type="text" size=20 name="pTitle" value = "Hidden Brain"> 
	</td><td><input type = "submit" name = "submit" value="Submit here"/>
	</table>
	</form>
	</div><!--end manage comment div-->		


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
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		   $pTitle = test_input($_POST["pTitle"]);
		}
		
		function test_input($data) 
		{
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
  
		  return $data;
		}
		
 		/////////////////////////////////////////////////////
 		//print Comments, Episode, and commentID related to the username
		$sql = 'SELECT E.podcastTitle, E.episodeTitle, E.description, E.totalLikes FROM Episode as E WHERE E.podcastTitle = \''. $pTitle . '\';';
		
 		$result = mysqli_query($conn, $sql);
 		if($result){
			echo '<table border = 1, class = "popular List">';
			//prints the table row by row
			if(!(mysqli_num_rows($result) > 0)){
 				echo "The podcast may not have any associated episodes.";
			} else {
				echo "<th> Podcast Title </th>";
				echo "<th> Episode Title </th>";
				echo "<th> Description </th>";
				echo "<th> Total Likes </th>";
	 			while($row = mysqli_fetch_assoc($result)) {
	 					echo "<tr style = text-align:center>"; // start row
	 					echo "<td style='height:100px, width:100px'>" . $row['podcastTitle']. "</td>";
						echo "<td style='height:100px, width:100px'>" . $row['episodeTitle']. "</td>";
						echo "<td style='height:100px, width:100px'>" . $row['description']. "</td>";
						echo "<td style='height:100px, width:100px'>" . $row['totalLikes']. "</td>";
	 					echo "</tr>"; // end row
	 			} //end while
	 			echo "</table>";
			} //end  else 
 		} else {
 			 echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
 		} // end if
?>
	
</div> <!--end of the forms -->

</div> <!--end main-->


</body>
</html>