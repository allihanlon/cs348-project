<?php


$title = $user = $suggestion = $dateSuggest = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   $user = test_input($_POST["username"]);
   $title = test_input($_POST["title"]);
   $suggestion = test_input($_POST["suggestion"]);
   $dateSuggest = test_input(date('Y-m-d', strtotime($_POST["dateSuggested"])));
}


//echo $title;
//echo "<br>". $author;

function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  
  return $data;
}
 
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
//echo "Connected successfully<br><br>";


$sql =  'INSERT INTO TopicSuggestions(username, podcastTitle, description, dateSuggested) VALUES (\''. $user . '\', \''. $title . '\', \''. $suggestion . '\', \''. $dateSuggest . '\')';

$result = mysqli_query($conn, $sql);

if ($result) {
    echo "New record created successfully<br>";
	echo "Podcast Title: " . $title . "<br>";
	echo "Your Suggestion: " . $suggestion . "<br>";
	echo "Date of Request: " . $dateSuggest . "<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
}
 
$home = "https://web.ics.purdue.edu/~g1117061";
echo "Click <a href=$home>here</a> to return to the home page";

?>

