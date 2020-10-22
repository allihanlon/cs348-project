
<html>
<title>Listener Forms</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	
	<link rel="icon" href="peaspod.jpeg" type="image/png" sizes="16x16">
	
	<script> 
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
	</script>

	
</head>

<body>


<div id="main">


<div class="container"> <!-- beginning of the forms-->
	
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
	
		  	 
</div> <!--end of the forms -->
	
	



</div> <!--end main-->


</body>
</html>