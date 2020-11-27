
<html>
<title>Listener Forms</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	
	<link rel="icon" href="peaspod.jpeg" type="image/png" sizes="16x16">
	
	<script> 
		function ValidateListener(){ 
	    var username = document.forms["listenerForm"]["username"]; 
		var Ptitle = document.forms["listenerForm"]["Ptitle"]; 
		var ETitle = document.forms["listenerForm"]["ETitle"]; 
		var date_ = document.forms["listenerForm"]["dateListened"]; 
   
	
		if (username.value.length < 0 || username.value.length > 20 || username.value == "")                                  
	    { 
	        window.alert("Username is either empty, too long, or does not include a '@'."); 
	        email.focus(); 
	        return false; 
	    }
		
		if (Ptitle.value.length < 0 || Ptitle.value.length > 100 || Ptitle.value == "")                                  
	    { 
	        window.alert("Podcast title is either empty, too long, or does not include a '@'."); 
	        email.focus(); 
	        return false; 
	    }
		
		if (Etitle.value.length < 0 || Etitle.value.length > 100 || Etitle.value == "")                                  
	    { 
	        window.alert("Episode title is either empty, too long, or does not include a '@'."); 
	        email.focus(); 
	        return false; 
	    }
	
		if (date_.value == "" )                                  
	    { 
	        window.alert("Date is  empty."); 
	        email.focus(); 
	        return false; 
	    }
	}
	
	function ValidateGuest(){ 
	    var username = document.forms["guestForm"]["username"]; 
		var title = document.forms["guestForm"]["title"]; 
		var guest = document.forms["guestForm"]["guest"]; 
		var date_ = document.forms["guestForm"]["dateRequested"]; 
   
	
		if (username.value.length < 0 || username.value.length > 20 || username.value == "")                                  
	    { 
	        window.alert("Username is either empty, too long, or does not include a '@'."); 
	        email.focus(); 
	        return false; 
	    }
		
		if (title.value.length < 0 || title.value.length > 100 || title.value == "")                                  
	    { 
	        window.alert("Title is either empty, too long, or does not include a '@'."); 
	        email.focus(); 
	        return false; 
	    }
		
		if (guest.value.length < 0 || guest.value.length > 100 || guest.value == "")                                  
	    { 
	        window.alert("Title is either empty, too long, or does not include a '@'."); 
	        email.focus(); 
	        return false; 
	    }
	
		if (date_.value == "" )                                  
	    { 
	        window.alert("Date is  empty."); 
	        email.focus(); 
	        return false; 
	    }
	}
	
	function ValidateTopic(){ 
	    var username = document.forms["topicForm"]["username"]; 
		var title = document.forms["topicForm"]["title"]; 
		var suggestion = document.forms["topicForm"]["suggestion"]; 
		var date_ = document.forms["topucForm"]["dateSuggested"]; 
   
	
		if (username.value.length < 0 || username.value.length > 20 || username.value == "")                                  
	    { 
	        window.alert("Username is either empty or too long."); 
	        email.focus(); 
	        return false; 
	    }
		
		if (title.value.length < 0 || title.value.length > 100 || title.value == "")                                  
	    { 
	        window.alert("Title is either empty or too long."); 
	        email.focus(); 
	        return false; 
	    }
		
		if (suggestion.value.length < 0 || suggestion.value.length > 8000 || suggestion.value == "")                                  
	    { 
	        window.alert("Suggestion is either empty or too long. Please keep suggestions under 8000 characters."); 
	        email.focus(); 
	        return false; 
	    }
	
		if (date_.value == "" )                                  
	    { 
	        window.alert("Date is  empty."); 
	        email.focus(); 
	        return false; 
	    }
	}
	
	function ValidateLikes(){ 
	    var username = document.forms["likesForm"]["username"]; 
		var title = document.forms["likesForm"]["title"]; 
		var Etitle = document.forms["likesForm"]["epiTitle"]; 
		var rating = document.forms["likesForm"]["rating"]; 
		var date_ = document.forms["likesForm"]["dateCommented"]; 
   
	
		if (username.value.length < 0 || username.value.length > 20 || username.value == "")                                  
	    { 
	        window.alert("Username is either empty or too long."); 
	        email.focus(); 
	        return false; 
	    }
		
		if (title.value.length < 0 || title.value.length > 100 || title.value == "")                                  
	    { 
	        window.alert("Podcast title is either empty or too long."); 
	        email.focus(); 
	        return false; 
	    }
		
		if (Etitle.value.length < 0 || Etitle.value.length > 100 || Etitle.value == "")                                  
	    { 
	        window.alert("Episode title is either empty or too long."); 
	        email.focus(); 
	        return false; 
	    }
		
		if (rating.value.length < 0 || rating.value < 1 || rating.value > 5 || rating.value == "")                                  
	    { 
	        window.alert("Comment is either empty or not withing the 1-5 range. Please enter a valid value."); 
	        email.focus(); 
	        return false; 
	    }
	
		if (date_.value == "" )                                  
	    { 
	        window.alert("Date is  empty."); 
	        email.focus(); 
	        return false; 
	    }
	}
	
	function ValidateComment(){ 
	    var username = document.forms["commentForm"]["username"]; 
		var title = document.forms["commentForm"]["title"]; 
		var Etitle = document.forms["commentForm"]["epiTitle"]; 
		var rating = document.forms["commentForm"]["rating"]; 
		var date_ = document.forms["commentForm"]["dateCommented"]; 
   
	
		if (username.value.length < 0 || username.value.length > 20 || username.value == "")                                  
	    { 
	        window.alert("Username is either empty or too long."); 
	        email.focus(); 
	        return false; 
	    }
		
		if (title.value.length < 0 || title.value.length > 100 || title.value == "")                                  
	    { 
	        window.alert("Podcast title is either empty or too long."); 
	        email.focus(); 
	        return false; 
	    }
		
		if (Etitle.value.length < 0 || Etitle.value.length > 100 || Etitle.value == "")                                  
	    { 
	        window.alert("Episode title is either empty or too long."); 
	        email.focus(); 
	        return false; 
	    }
		
		if (comment.value.length < 0 || comment.value.length > 8000 || comment.value == "")                                  
	    { 
	        window.alert("Comment is either empty or too long. Please keep comments under 8000 characters."); 
	        email.focus(); 
	        return false; 
	    }
	
		if (date_.value == "" )                                  
	    { 
	        window.alert("Date is  empty."); 
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
<h1> Two Peas in a Podcast Listener Homepage </h1>

<div id="main">


<div class="container"> <!-- beginning of the forms-->

	<div class = "Listeners">
	
	<h4>Mark a Podcast Episode as 'Listened':</h4>
	<form name = "listenerForm" onsubmit="return ValidateListener()" action="listener.php" method = "post">
	
	<table width= "40%">
	<tr><td> Your Username: <input type="text" size=20 name="username" value = "johnsmith"> 
	</td><td> Podcast Title: <input type="text" size=20 name="Ptitle" value = "Girls Gotta Eat"> 
	</td><td> Episode Title: <input type="text" size=20 name="Etitle" value = "Does Age Matter?"> 
	</td><td> Date Listened: <input type="date" size=12 name="dateListened"  value="<?php echo date('Y-m-d'); ?>">
	</td><td><input type = "submit" name = "submit" value="Submit here" />
	</table>
	</form>
	</div> <!--end guest request div-->
	
	<div class = "Guest Request">
	
	<h4>Enter a Guest Request:</h4>
	<form name = "guestForm" onsubmit="return ValidateGuest()" action="guest.php" method = "post">
	
	<table width= "40%">
	<tr><td> Your Username: <input type="text" size=20 name="username" value = "johnsmith"> 
	</td><td> Podcast Title: <input type="text" size=20 name="title" value = "Girls Gotta Eat"> 
	</td><td> Guest Name: <input type="text" size=20 name="guest" value = "Elizabeth Warren"> 
	</td><td> Today's Date: <input type="date" size=12 name="dateRequested"  value="<?php echo date('Y-m-d'); ?>">
	</td><td><input type = "submit" name = "submit" value="Submit here" />
	</table>
	</form>
	</div> <!--end guest request div-->
	
	
	<div class = "Topic Suggestion">

	<h4>Enter a Topic Suggestion:</h4>
	<form name = "topicForm" onsubmit="return ValidateTopic()" action="topic.php" method = "post">
	
	<table width= "40%">
	<tr><td> Your Username: <input type="text" size=20 name="username" value = "johnsmith"> 
	</td><td> Podcast Title: <input type="text" size=20 name="title" value = "Girls Gotta Eat"> 
	</td><td> Your Suggestion: <input type="text" size=40 name="suggestion" value = "COVID Mental Health Tips"> 
	</td><td> Today's Date: <input type="date" size=12 name="dateSuggested" value="<?php echo date('Y-m-d'); ?>">
	</td><td><input type = "submit" name = "submit" value="Submit here"/>
	</table>
	</form>
	</div><!--end topic suggestion div-->
	
	
	<div class = "Likes">

	<h4>Rate your favorite episodes here!</h4>
	<form name = "likesForm" onsubmit="return ValidateLikes()" action="like.php" method = "post">
	
	<table width= "40%">
	<tr><td> Your Username: <input type="text" size=20 name="username" value = "johnsmith"> 
	</td><td> Podcast Title: <input type="text" size=20 name="title" value = "Girls Gotta Eat"> 
	</td><td> Episode Title: <input type="text" size=20 name="epiTitle" value = "Does Age Matter?"> 
	</td><td> Rating (1-5): <input type="integer" size=15 name="rating" value = "3"> 
	</td><td> Today's Date: <input type="date" size=12 name="dateLiked" value="<?php echo date('Y-m-d'); ?>">
	</td><td><input type = "submit" name = "submit" value="Submit here"/>
	</table>
	</form>
	</div><!--end likes table div-->
	
	<div class = "Comment">

	<h4>Leave comments on your recent listens</h4>
	<form name = "commentsForm" onsubmit="return ValidateComment()" action="comment.php" method = "post">
	
	<table width= "40%">
	<tr><td> Your Username: <input type="text" size=20 name="username" value = "johnsmith"> 
	</td><td> Podcast Title: <input type="text" size=20 name="title" value = "Girls Gotta Eat"> 
	</td><td> Episode Title: <input type="text" size=20 name="epiTitle" value = "Does Age Matter?"> 
	</td><td> Comment: <input type="text" size=40 name="comment" value = "I really enjoyed this week's episode!"> 
	</td><td> Today's Date: <input type="date" size=12 name="dateCommented" value="<?php echo date('Y-m-d'); ?>">
	</td><td><input type = "submit" name = "submit" value="Submit here" />
	</table>
	</form>
	</div><!--end comments table div-->
	
	
	
	<div class = "Generate Suggestions">
	
	<h4>Search Podcasts by Genre:</h4>
	<form name = "podcastGenre" method = "post">
	
	<table width= "50%">
	<tr><td> Genre: <select id="genre", name = "genre">
						<option value = "Comedy">Comedy</option>
						<option value = "News">News</option>
						<option value = "Society and Culture">Society and Culture</option>
						<option value = "Sports">Sports</option>
						<option value = "True Crime">True Crime</option>
						<option value = "Other">Other</option></select></td>
	</td><td><input type = "submit" name = "submit" value="Submit here" />
	</table>
	</form>
	
	</div><!--end comments table div-->
		  	 
</div> <!--end of the forms -->

		<?php
		
		$genre = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		   $genre = test_input($_POST["genre"]);
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
		
 		/////////////////////////////////////////////////////
 		//print Podcast by Genre table
		$sql =  'SELECT podcastTitle FROM Podcast WHERE genre = \''. $genre . '\' ORDER BY podcastTitle DESC;';
 		$result = mysqli_query($conn, $sql);
 		if($result){
			
 			echo "<h3 style= 'text-align:left;'>Podcast List for category: '$genre':</h3>";
 		} else {
 			 echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
 		}
		?>
        <table border = 1,class = "genreList">
		<?php
 		

 		if (mysqli_num_rows($result) > 0) {
			echo "<th> Podcasts: </th>";
 			while($row = mysqli_fetch_assoc($result)) {
					
 					echo "<tr style = text-align:left>"; // start row
 					echo "<td style='height:100px, width:100px'>" . $row['podcastTitle']. "</td>";
 					echo "</tr>"; // end row
 			}
 			echo "</table>";
 		} else {
 			echo "There are not results matching the genre '$genre'.";
 		}
 		?>
	

</div> <!--end main-->


</body>
</html>