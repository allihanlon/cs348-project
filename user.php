<html>
<title>User Page</title>
<head>
	<link rel = "stylesheet" type = "text/css" href = "mystyle.css" />
	<link rel="icon" href="peaspod.jpeg" type="image/png" sizes="16x16">
</head>

<body>
<div id="Home" class="tabcontent">
	<p>	<h1> Two Peas in a Podcast Homepage </h1>
</div>

<?php
include "include/redirect.php";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$u_username = $u_password = $query = $sql = "";

$u_username = test_input($_POST["u_username"]);
$u_password = test_input($_POST["password"]);

$servername = "mydb.itap.purdue.edu";
$username = "g1117061";
$password = "!@Pod2020";
$dbname = "g1117061";

// Create connection
$conn = mysqli_connect($servername, $username, $password , $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql =  "SELECT * FROM User WHERE username = '$u_username' AND password='$u_password'";

$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) == 0) { //no entries match the username and password
	echo "Sorry, that username or password are incorrect or do not exist! Check your spelling, or click link below to redirect to create account page: ";
	echo "<br><a href=https://web.ics.purdue.edu/~g1117061/create_account.html>Create Account Page</a><br>";
	echo "If you have forgotten your password, click link below to redirect to forgot password page: ";
	echo "<br><a href=https://web.ics.purdue.edu/~g1117061/forgot_password.html>Forgot Password Page</a>";
} else if (mysqli_num_rows($query) > 0) { //there must be an entry that matches the username and password
	//now check if they are a listener or a host
	$sql =  "SELECT userType FROM User WHERE username = '$u_username'";
	
	$userQuery = mysqli_query($conn, $sql);
	if($userQuery){
		if (mysqli_num_rows($userQuery) > 0) { //the userType field is populated

			while($row = mysqli_fetch_assoc($userQuery)) {
				$userType = $row['userType'];
			}
			
			//echo $userType;
			if (strcmp($userType, "host") == 0) { //if the user is a 
				header("Location:https://web.ics.purdue.edu/~g1117061/HostForms.php");
			} else {
				header("Location:https://web.ics.purdue.edu/~g1117061/ListenerForms.php");
			}
			
			
		} else { //userfield may be null
			echo "Error detecting userType.";
		}
	} else {
		echo "Error";
	}
 }

mysqli_close($conn);

?>


</body>
</html>
