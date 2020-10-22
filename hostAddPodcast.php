
<html>
<title>Add Your Podcast </title>

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
		
		if (genre.value.length < 0 || genre.value.length > 20 || genre.value == "")                                  
	    { 
	        window.alert("Genre is either empty, too long."); 
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
	</script>

	
</head>

<body>


<div id="main">

<div class="container"> <!-- beginning of the forms-->
	
	<div class = "Add Your Podcast">
	
	<h4>Add Your Podcast:</h4>
	<form name = "podcastForm" onsubmit="return ValidatePodcast()" action="createPodcast.php" method = "post">
	
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
	
</div> <!--end of the forms -->


</div> <!--end main-->

</body>
</html>