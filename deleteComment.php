
<html>
<title>Delete Comment</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
	
	<link rel="icon" href="peaspod.jpeg" type="image/png" sizes="16x16">
</head>

<body>
<h1> Two Peas in a Podcast Delete Comment Page </h1>


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
		   $comNum = test_input($_POST["commentNumber"]);
		}
		
		function test_input($data) 
		{
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	
			
				
		//see if the comment number is one that the user can delete
		$sql2 = 'SELECT commentID FROM (SELECT C.commentID FROM Comments C JOIN Episode E ON E.episodeID =C.episodeID JOIN Podcast P ON E.podcastTitle = P.PodcastTitle WHERE P.username = \''. $u_username . '\') as extractedComments WHERE extractedComments.commentID =' .$comNum.';';
		
				
		$result2 = mysqli_query($conn, $sql2);
		if($result2){
			if(!(mysqli_num_rows($result2) > 0)){
		 		echo "You do not have permission to delete that comment";
			} else { // the result2 should have returned a single integer
				
				/* Start transaction */
				$conn->autocommit(FALSE); //need to turn off autocommit or else this page will be sent to the db
				//set the isolation level to just lock one row
				mysqli_query($conn, "SET TRANSACTION ISOLATION LEVEL REPEATABLE READ;");  
				mysqli_query($conn, "START TRANSACTION;");
				
				try {			
					//now you'll want to delete the comment
					
					//-------ORM-------//
					//establish connection to the db
					//--//R::setup('mysql:host=mydb.itap.purdue.edu; dbname=g1117061',"g1117061", "!@Pod2020");
					//--//R::debug(false);
					
					//find the bean that has the correct commentID and save it
					//--//$sql3 = 'DELETE FROM Comments WHERE commentID = '.$comNum.';';
					//--//$rows = R::getCell($sql3);
					//--//$returnedBean = R::convertToBeans('Comments', $rows);
					//--//$comToDel = $returnedBean[0];
					
					//delete the bean
					//--//R::trash($comToDel);

					//closes the connection used for ORM
					//--//R::close();
					//-------ORM-------//


					//prepare the delete statement
					$sql3 = 'DELETE FROM Comments WHERE commentID = '.$comNum.';';
					//send the delete statement to the DB
					mysqli_query($conn, $sql3);
					
					/* If code reaches this point without errors then commit the data in the database */
					mysqli_commit($conn);
					echo "<br>Record Deleted Successfully with ID = ". $comNum;
					
				
				
				} catch (mysqli_sql_exception $exception) {
				    mysqli_rollback($conn);
					echo "<br>threw error.<br>";
				    throw $exception;
				}

				$conn->autocommit(TRUE);
				
						
			}
					
		 } else {
 		 	echo "Error: " . $sql2 . "<br>" . mysqli_error($conn) . "<br>";
		 }
	 	
		

?>


</div> <!--end main-->


</body>
</html>