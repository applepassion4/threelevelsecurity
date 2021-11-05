<!DOCTYPE html>
<html>
<head>
	<title>IMAGES PAGE</title>
	<link rel="stylesheet" type="text/css" href="im.css">
	<link rel="stylesheet" type="text/css" href="sign.css">
</head>
<body>
	<h2 style="text-align: center">THIRD LOGIN PAGE</h2>

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



else
	{
$n1=0;
$n2=0;
$n3=0;

$i=0;
$numbers=array();
$images=array();

for ($i=0; $i <=6 ; $i++) { 
	$user=rand(1,7);
	array_push($numbers, $user);

}






$user=$_SESSION['username'];

$sql="SELECT * FROM users WHERE username='$user' ";
$res=$conn->query($sql);

$sql1="SELECT * FROM images";
$res1=$conn->query($sql1);


while ($row=$res->fetch_assoc()) {

$n1=2*(sqrt($row['number1']))-2;
$n2=2*(sqrt($row['number2']))-2;
$n3=2*(sqrt($row['number3']))-2;

array_push($numbers, $n1,$n2,$n3);


}



while ($row=$res1->fetch_assoc()) {

$im=$row['name'];

array_push($images, $im);

}
 


for ($i=0; $i <=2 ; $i++) { 




echo "<img src='$images[$i]'>";
echo $numbers[$i];


}

echo "</br>";
echo "</br>";
echo "</br>";

for ($i=3; $i <=5 ; $i++) { 




echo "<img src='$images[$i]'>";
echo $numbers[$i];


}

echo "</br>";
echo "</br>";
echo "</br>";



for ($i=5; $i <=7 ; $i++) { 




echo "<img src='$images[$i]'>";

echo $numbers[$i];


}
echo "</br>";
echo "</br>";
echo "</br>";


for ($i=8; $i <=9 ; $i++) { 



echo "<img src='$images[$i]'>";
echo $numbers[$i];


}

echo "</br>";
echo "</br>";
echo "</br>";






	}











    ?>



<form method="post" style="text-align: center">
<h3>PLEASE ENTER THE NUMBER CORRESPONDING TO PREFERED IMAGES</h3>
<p><input type="password" name="first" placeholder="ENTER 1ST NUMBER" required="required"></p>
<p><input type="password" name="second" placeholder="ENTER 2ND NUMBER" required="required"></p>
<p><input type="password" name="third" placeholder="ENTER THIRD NUMBER" required="required"></p>
<input type="submit" name="btn" value="SUBMIT">



</form>
<?php 
if (isset($_POST['btn'])){

$nu1= $_POST['first'];
$nu2=$_POST['second'];
$nu3= $_POST['third'];

$e1=pow(($nu1+2)/2,2);
$e2=pow(($nu2+2)/2,2);
$e3=pow(($nu3+2)/2,2);

$s="SELECT * FROM users WHERE username='$user' AND number1='$e1' AND number2='$e2' AND number3='$e3';" ;
$res2=$conn->query($s);
$n=$res2->num_rows;

if($n==1)

{

$a = "UPDATE users SET attempt=0 WHERE username='$user'";
$resa=$conn->query($a);

  session_start();
 $_SESSION['username']=$user;
  $_SESSION['number1']=$e1;
    $_SESSION['number2']=$e2;
      $_SESSION['number3']=$e3;

       header('Location: success.php');

}

else if($n==0)

{

$a = "UPDATE users SET attempt=attempt+1 WHERE username='$user'";
$resa=$conn->query($a);
session_destroy();
header('Location: login1.php');

}
}









 ?>





</body>
</html>