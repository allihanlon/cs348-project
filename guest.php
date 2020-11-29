<?php

// ORM Redbean Library
// require 'rb.php'; 

$title = $user = $guest = $dateReq = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
   $user = test_input($_POST["username"]);
   $title = test_input($_POST["title"]);
   $guest = test_input($_POST["guest"]);
   $dateReq = test_input(date('Y-m-d', strtotime($_POST["dateRequested"])));
}

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

//-------ORM-------//
//establish connection to the db
//R::setup('mysql:host=mydb.itap.purdue.edu; dbname=g1117061',"g1117061", "!@Pod2020");
//R::debug(false);

//find the bean that has the correct commentID and save it
//--//$sql3 = 'DELETE FROM Comments WHERE commentID = '.$comNum.';';
//--//$rows = R::getCell($sql3);
//--//$returnedBean = R::convertToBeans('Comments', $rows);
//--//$comToDel = $returnedBean[0];

//delete the bean
//--//R::trash($comToDel);
//closes the connection used for ORM
//create a new bean of type UserGuestRequest
//$guestBean = R::dispense( 'UserGuestRequest' );

//add the properties of the guest to the bean
//$guestBean->username = $user;
//$guestBean->podcastTitle = $title;
//$guestBean->guest = $guest;
//$guestBean->dateRequested = $dateReq;
//store the bean in the DB (insert the row into the table)
//R::store( $guestBean );
//R::close();
//-------ORM-------//


// Prepared Statement to insert topic suggestion
$sql = "INSERT INTO UserGuestRequest(username, podcastTitle, guest, dateRequested) VALUES (?,?,?,?)";
$stmt= $conn->prepare($sql);
$stmt->bind_param("ssss", $user, $title, $guest, $dateReq);	// let SQL know that you are looking for 4 string variables ("ssss")
$stmt->execute();

echo "New record created successfully<br>";
echo "Podcast Title: " . $title . "<br>";
echo "Guest Requested: " . $guest . "<br>";
echo "Date of Request: " . $dateReq . "<br>";
 
$home = "https://web.ics.purdue.edu/~g1117061";
echo "Click <a href=$home>here</a> to return to the home page";

?>

