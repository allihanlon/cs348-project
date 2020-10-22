<html>
<head>
	<link rel = "stylesheet" type = "text/css" href = "mystyle.css" />
</head>
</html>

<?php

include "include/redirect.php";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$u_username = test_input($_POST["username"]);
$new_password = test_input($_POST["password"]);
$question_answer = test_input($_POST["question_answer"]);


$servername = "mydb.itap.purdue.edu";
$username = "g1117061";
$password = "!@Pod2020";
$dbname = "g1117061";
  
$conn = mysqli_connect($servername, $username, $password , $dbname);
 
$query = mysqli_query($conn, "SELECT * FROM User WHERE username='$u_username'");
if(mysqli_num_rows($query) == 0) {
	echo "Incorrect username! Click link below to redirect to forgot password page: ";
	echo "<br><a href=https://web.ics.purdue.edu/~g1117061/forgot_password.html>Forgot Password Page</a>";
	return true;
}
if(mysqli_num_rows($query) !=0){
	mysqli_query($conn, "UPDATE User SET password = '$new_password' WHERE securityQuestion = '$question_answer' AND username='$u_username'");
	header("Location:https://web.ics.purdue.edu/~g1117061");
}

mysqli_close($conn);
  
  ?>