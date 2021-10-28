<!DOCTYPE html>
<html>
<head>
	<title>FIRST LOGIN PAGE</title>
	<link rel="stylesheet" type="text/css" href="sign.css">
</head>
<body>

<?php  


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "security";

$user="";
$pass="";
$attempt="";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['submit']))
{


$select="SELECT * FROM users where username=$user AND password=$pass";
$result=$conn->query($select);

$n=$result->num_rows;

if ($n==1)

{



	
}



}

	


































?>



<div class="sign">

<H1>LOGIN PAGE</H1>
<form method="POST">	
<p><input type="text" name="user" placeholder="ENTER USERNAME"></p>
 <p><input type="password" name="pass"placeholder="ENTER NEW PASSWORD"></p>

 <p><input type="submit" name="submit" value="LOGIN"></p>

</form>
</div>















</body>
</html>