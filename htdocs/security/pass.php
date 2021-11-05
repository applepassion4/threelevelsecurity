<!DOCTYPE html>
<html>
<head>
	<title>PASSPHRASE PAGE</title>
	<link rel="stylesheet" type="text/css" href="sign.css">
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


session_start();

 if(!isset($_SESSION['username'])){
        header('Location: login1.php');
        exit;
    } 

    else {

if (isset($_POST['submit']))
{

$user= $_SESSION['username'];
$pass=$_POST['pass'];
$pass1=md5($pass);

$select="SELECT * FROM users where username='$user'";
$result=$conn->query($select);

$n=$result->num_rows;

if ($n==1)

{
$rand= rand(1,100);

$rand1=pow(($rand+2)/2,2);



$sql = "UPDATE users SET nonce='$rand1' WHERE username='$user'";
$res=$conn->query($sql);


$sql1="SELECT * FROM users where username='$user' AND pass='$pass1' AND nonce=$rand1 ";
$result1=$conn->query($sql1);

$n1=$result1->num_rows;

if ( $n1==1) {
  
 $a = "UPDATE users SET attempt=0 WHERE username='$user'";
$resa=$conn->query($a);
 $_SESSION['username']=$user;
  $_SESSION['pass']=$pass;

 header('Location: images.php');



} 

 else if ($n1==0)
  {
 

$a = "UPDATE users SET attempt=attempt+1 WHERE username='$user'";
$resa=$conn->query($a);
session_destroy();
header('Location: login1.php');

 
}





	
}



}

	





        
    }

















  ?>



<div class="sign" style="margin-top: 10%">

<H1>LOGIN PAGE</H1>
<form method="POST">	

 <p><input type="password" name="pass"placeholder="ENTER PASSPHRASE"></p>

 <p><input type="submit" name="submit" value="LOGIN"></p>

</form>
</div>

















</body>
</html>