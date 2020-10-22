
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

<div class="container"> <!-- beginning of the forms-->
	
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

	<h4>Update or Edit Episode Information:</h4>
	<form name = "episodeForm" onsubmit="return ValidateEpisode()" action="updateEpisode.php" method = "post">
	
	<table width= "40%">
	<tr><td> Your Username: <input type="text" size=20 name="username" value = "gretchenrubin"> 
	</td><td> Podcast Title: <input type="text" size=20 name="pTitle" value = "Happier"> 
	</td><td> Episode Title: <input type="text" size=40 name="eTitle" value = "Little Happier - Travel Demand"> 
	</td><td> Description: <input type="text" size=70 name="description" value= "Lessons of 'induced travel demand' applies to our lives">
	</td><td><input type = "submit" name = "submit" value="Submit here"/>
	</table>
	</form>
	</div><!--end update episode div-->		  	 
</div> <!--end of the forms -->


</div> <!--end main-->


</body>
</html>