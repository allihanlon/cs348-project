<html>
<head>
	<link rel = "stylesheet" type = "text/css" href = "mystyle.css" />
</head>

<body>
<div id="Home" class="tabcontent">
	<p>	<h1> Two Peas in  a Podcast homepage YAY we did it </h1>
</div>

</body>
</html>

<?php
include "include/redirect.php";

$servername = "mydb.itap.purdue.edu";
$username = "g1117061";
$password = "!@Pod2020";
$dbname = "g1117061";

// Create connection
$conn = mysqli_connect($servername, $username, $password , $dbname);

mysqli_close($conn);
?>
