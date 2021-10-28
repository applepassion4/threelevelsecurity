<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


<?php  

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "security";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}




$q1="SELECT * FROM users "


?>
















</body>
</html>