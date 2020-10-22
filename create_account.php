<html>
<title>Create Account</title>
<head>
	<link rel = "stylesheet" type = "text/css" href = "mystyle.css" />
	<link rel="icon" href="peaspod.jpeg" type="image/png" sizes="16x16">
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

$u_username = test_input($_POST["u_username"]);
$uemail = test_input($_POST["uemail"]);
$u_password = test_input($_POST["password"]);
$u_type = test_input($_POST["type"]);
$u_answer = test_input($_POST["question_answer"]);

$servername = "mydb.itap.purdue.edu";
$username = "g1117061";
$password = "!@Pod2020";
$dbname = "g1117061";

// Create connection
$conn = mysqli_connect($servername, $username, $password , $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$query = mysqli_query($conn, "SELECT * FROM User WHERE username = '$u_username'");
if (mysqli_num_rows($query) != 0) {
	echo "Sorry, this username already exists! Click Link below to redirect to create account page: ";	
	echo "<br><a href=https://web.ics.purdue.edu/~g1117061/create_account.html>Create Account Page</a>";
}
else{
	$sql1 = "INSERT INTO User (username, password, email, userType, securityQuestion) VALUES ('$u_username','$u_password','$uemail','$u_type','$u_answer');";
	$result1 = mysqli_query($conn, $sql1);
	if ($u_type == 'host') {
		header("Location:https://web.ics.purdue.edu/~g1117061/hostAddPodcast.php");
	} else {
		header("Location:https://web.ics.purdue.edu/~g1117061");
	}
}

mysqli_close($conn);

?>