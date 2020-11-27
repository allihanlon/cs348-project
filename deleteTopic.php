
<html>
<title>Delete Topic Suggestions</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	
	<link rel="icon" href="peaspod.jpeg" type="image/png" sizes="16x16">
</head>

<body>
<h1> Two Peas in a Podcast Delete Topic Suggestion Page </h1>


<?php
//ORM Redbean Library
require 'rb.php'; 

		/* Tell mysqli to throw an exception if an error occurs */
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		
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
 	
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		   $u_username = test_input($_POST["username"]);
		   $topicNum = test_input($_POST["TopicNumber"]);
		}
		
		function test_input($data) 
		{
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	
			
				
		//see if the guest ID is one that the user can delete
		$sql2 = 'SELECT topicID FROM (SELECT T.topicID FROM TopicSuggestions T JOIN Podcast P ON P.podcastTitle = T.PodcastTitle WHERE P.username = \''. $u_username . '\') as extractedTopic WHERE extractedTopic.topicID =' .$topicNum.';';
		
				
		$result2 = mysqli_query($conn, $sql2);
		if($result2){
			if(!(mysqli_num_rows($result2) > 0)){
		 		echo "You do not have permission to delete that topic suggestion";
			} else { // the result2 should have returned a single integer
						
					//now you'll want to delete the topic
					
					//-------ORM-------//
					//establish connection to the db
					R::setup('mysql:host=mydb.itap.purdue.edu; dbname=g1117061',"g1117061", "!@Pod2020");
					R::debug(false);
					
					echo "<br> please visit <a href='https://web.ics.purdue.edu/~g1117061/ManageTopics.php'>the manage topics page</a> to check if the topic $recNum has been deleted.";
					
					//find the bean that has the correct commentID and save it
					$sql3 = 'DELETE FROM TopicSuggestions WHERE topicID = '.$topicNum.';';
					$rows = R::getCell($sql3);
					$returnedBean = R::convertToBeans('TopicSuggestions', $rows);
					$topicToDel = $returnedBean[0];
					
					//delete the bean
					R::trash($topicToDel);

					//closes the connection used for ORM
					R::close();
					//-------ORM-------//


					//prepare the delete statement
					////$sql3 = 'DELETE FROM Comments WHERE commentID = '.$comNum.';';
					//send the delete statement to the DB
					////mysqli_query($conn, $sql3);
					
					//echo "<br>Record Deleted Successfully with ID = ". $recNum;

			}
					
		 } else {
 		 	echo "Error: " . $sql2 . "<br>" . mysqli_error($conn) . "<br>";
		 }
	 	
		

?>


</div> <!--end main-->


</body>
</html>