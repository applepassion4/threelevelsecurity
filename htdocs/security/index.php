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

$user= $_POST['user'];
$pass=$_POST['pass'];
$pass1=md5($pass);


$se1="SELECT * FROM users where username='$user' AND attempt=3";
$rt=$conn->query($se1);
$n1=$rt->num_rows;



if($n1==0)


{


$select="SELECT * FROM users where username='$user' ";
$result=$conn->query($select);
$n=$result->num_rows;

if ($n==1)

{
$rand= rand(1,100);

$rand1=pow(($rand+2)/2,2);



$sql = "UPDATE users SET nonce='$rand1' WHERE username='$user'";
$res=$conn->query($sql);


$sql1="SELECT * FROM users where username='$user' AND password='$pass1' AND nonce=$rand1 ";
$result1=$conn->query($sql1);

$n1=$result1->num_rows;

if ( $n1==1) {

$a = "UPDATE users SET attempt=0 WHERE username='$user'";
$resa=$conn->query($a);
  
  session_start();
 $_SESSION['username']=$user;
  $_SESSION['password']=$pass;

 header('Location: pass.php');

} 

 else if ($n1==0)
  {
  
  echo "Wrong username or password";
 $a = "UPDATE users SET attempt=attempt+1 WHERE username='$user'";
$resa=$conn->query($a);
 
}

else
{

echo "Error while login";

}



	
}












}



	else if ($n1==1)

{

ECHO "Please contact admin ,your account has been blocked";


}














	}

































?>



<div class="sign" style="margin-top: 10%">

<H1>LOGIN PAGE</H1>
<form method="POST">	
<p><input type="text" name="user" placeholder="ENTER USERNAME"></p>
 <p><input type="password" name="pass"placeholder="ENTER PASSWORD"></p>

 <p><input type="submit" name="submit" value="LOGIN"></p>

</form>
</div>















</body>
</html>