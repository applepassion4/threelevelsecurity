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

// sql to create table
$sql = "CREATE TABLE users (
username VARCHAR(30) PRIMARY KEY NOT NULL,
password VARCHAR(30) NOT NULL,
ok1 VARCHAR(30) NOT NULL,
pass text NOT NULL,
ok2 VARCHAR(30) NOT NULL,
number1 int NOT NULL,
number2 int NOT NULL,
number3 int NOT NULL,
question1 varchar(50) NOT NULL,
answer1 varchar(50) NOT NULL,
question2 varchar(50) NOT NULL,
answer2 varchar(50) NOT NULL,
attempt int NOT NULL

)";

if ($conn->query($sql) === TRUE) {
  echo "Table users  created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}




$sql1="CREATE TABLE images (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(200) NOT NULL,
  image longtext NOT NULL
) ";


if ($conn->query($sql1) === TRUE) {
  echo "Table images created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
























$conn->close();
?>
</body>
</html>