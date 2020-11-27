<html>
<title>Forgot Password</title>
<head>
	<link rel = "stylesheet" type = "text/css" href = "mystyle.css" />
	<link rel="icon" href="peaspod.jpeg" type="image/png" sizes="16x16">
</head>
</html>
hanlona
<?php

include "include/redirect.php";
require 'rb.php';

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$u_username = test_input($_POST["username"]);
$new_password = test_input($_POST["password"]);
$question_answer = test_input($_POST["question_answer"]);

//-------ORM-------//
//establish connection to the db
R::setup('mysql:host=mydb.itap.purdue.edu; dbname=g1117061',"g1117061", "!@Pod2020");
R::debug(false);
$isConnected = R::testConnection();
					
//find the bean that has the correct commentID and save it
$sql3 = 'SELECT username FROM User WHERE username = "'.$u_username.'" AND securityQuestion = "'.$question_answer.'";';
$rows = R::getRow($sql3);
$userBean = R::convertToBean('user', $rows);
//closes the connection used for ORM
//-------ORM-------//
 
if(count($rows) == 0) {
	echo "Incorrect username or security question! Click link below to redirect to forgot password page: ";
	echo "<br><a href=https://web.ics.purdue.edu/~g1117061/forgot_password.html>Forgot Password Page</a>";
	return true;
}

// close ORM connection
R::close();

if(count($rows) !=0){
	$servername = "mydb.itap.purdue.edu";
	$username = "g1117061";
	$password = "!@Pod2020";
	$dbname = "g1117061";
  
	$conn = mysqli_connect($servername, $username, $password , $dbname);
	mysqli_query($conn, "UPDATE User SET password = '$new_password' WHERE securityQuestion = '$question_answer' AND username='$u_username'");
	echo "Password successfull updated! Click link below to redirect to the login page: ";
	echo "<br><a href=https://web.ics.purdue.edu/~g1117061/>Login Page</a>";
	mysqli_close($conn);
}
  
?>