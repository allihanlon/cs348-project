<html>
<title>Create Account</title>
<head>
	<link rel = "stylesheet" type = "text/css" href = "mystyle.css" />
	<link rel="icon" href="peaspod.jpeg" type="image/png" sizes="16x16">
</head>
</html>

<?php

include "include/redirect.php";
require 'rb.php';

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$u_username = test_input($_POST["u_username"]);
$uemail = test_input($_POST["uemail"]);
$u_password = test_input($_POST["password"]);
$u_type = test_input($_POST["type"]);
$u_answer = test_input($_POST["question_answer"]);

//-------ORM-------//
//establish connection to the db
R::setup('mysql:host=mydb.itap.purdue.edu; dbname=g1117061',"g1117061", "!@Pod2020");
R::debug(false);
$isConnected = R::testConnection();
					
//find the bean that has the correct username and save it
$sql3 = 'SELECT username FROM User WHERE username = "'.$u_username.'";';
$rows = R::getRow($sql3);
$userBean = R::convertToBean('user', $rows);
//closes the connection used for ORM
R::close();
//-------ORM-------//

if (count($rows) == 0) {
	// Insert with RedBeans ORM
	//$newUserBean = R::dispense('user', 1);
	//$newUserBean->username = $u_username;
	//$newUserBean->password = $u_password;
	//$newUserBean->email = $uemail;
	//$newUserBean->userType = $u_type;
	//$newUserBean->securityQuestion = $u_answer;
	//R::store($newUserBean);
	
	// establish SQLi
	$servername = "mydb.itap.purdue.edu";
	$username = "g1117061";
	$password = "!@Pod2020";
	$dbname = "g1117061"; 
	
	// Create connectioninclude 'like.php';
	$conn = mysqli_connect($servername, $username, $password , $dbname);
	
	// Check connectioninclude 'like.php';
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	// Insert using prepared statements
	$sql = "INSERT INTO User (username, password, email, userType, securityQuestion) VALUES (?,?,?,?,?)";
	$stmt= $conn->prepare($sql);
	$stmt->bind_param("sssss", $u_username, $u_password, $uemail, $u_type, $u_answer);	// let SQL know that you are looking for 5 string variables ("sssss")
	$stmt->execute();
	mysqli_close($conn);
	
	if ($u_type == 'host') {
		header("Location:https://web.ics.purdue.edu/~g1117061/hostAddPodcast.php");
	} else {
		echo "Thanks for creating your account! Click Link below to redirect to the login page: ";	
		echo "<br><a href=https://web.ics.purdue.edu/~g1117061/>Login Page</a>";
	}
} else {
	echo "Sorry, this username already exists! Click Link below to redirect to create account page: ";	
	echo "<br><a href=https://web.ics.purdue.edu/~g1117061/create_account.html>Create Account Page</a>";
}
//-------ORM-------//
?>