<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP PAGE</title>
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


$user="";
$pass="";
$conf="";
$frase="";
$confrase="";
$q1="";
$q2="";
$ans1="";
$ans2="";
$number1=0.00;
$number2=0.00;
$number3=0.00;
$n1=0.00;
$n2=0.00;
$n3=0.00;





$user_answer="";


 ?>
<div class="sign">

<H1>SIGN UP</H1>
<form method="POST">
	
<p><input type="text" name="user" placeholder="ENTER USERNAME"></p>
 <p><input type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="ENTER NEW PASSWORD"></p>
<p><input type="password" name="cpass" placeholder="CONFIRM NEW PASSWORD"  required="required"></p>
  



  <p><input type="text"  name="ph" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{16,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 16 or more characters" placeholder="ENTER NEW PASSPHRASE">
<p><input type="text" name="cph" placeholder="CONFIRM PASSPHRASE" required="required"></p>
<p><input type="number" name="first" placeholder="ENTER 1ST NUMBER" required="required"></p>
<p><input type="number" name="second" placeholder="ENTER 2ND NUMBER" required="required"></p>
<p><input type="number" name="third" placeholder="ENTER THIRD NUMBER" required="required"></p>
<label>CHOOSE YOUR FIRST QUESTION </label>
<p><select name="select1" required="required">
	<option value="PREFERD MONTH">
		ENTER YOUR PREFERD MONTH
	</option>

<option value="PREFERD DAY">
		ENTER YOUR PREFERD DAY
	</option>

<option value="PREFERD COUNTRY">
		ENTER YOUR PREFERD COUNTRY
	</option>



</select></p>


<p><input type="text" name="ans1" placeholder="ENTER FIRST ANSWER" required="required"></p>



<label>CHOOSE YOUR SECOND QUESTION </label>

<p><select name="select2" required="required">
	
<option value="FIRST PET">
		ENTER THE NAME OF YOUR FIRST PET
	</option>

<option value="PREFERD DRINK">
		ENTER YOUR PREFERD DRINK
	</option>

<option value="PREFERD BRAND">
		ENTER YOUR PREFERD BRAND
	</option>






</select></p>



<p><input type="text" name="ans2" placeholder="ENTER SECOND ANSWER"></p>
 <input type="submit" name="submit" value="REGISTER" required="required">
</form>
 <?php echo $user_answer;                 ?> 

</div>


<?php 






if (isset($_POST['submit'])) {



$user= $_POST['user'];
$pass=md5($_POST['pass']);
$conf=md5($_POST['cpass']);
$frase=md5($_POST['ph']);
$confrase=md5($_POST['cph']);
$q1=$_POST['select1'];
$q2=$_POST['select2'];
$ans1=md5($_POST['ans1']);
$ans2=md5($_POST['ans2']);
$number1=$_POST['first'];

$n1=pow(($number1+2)/2,2);

$number2=$_POST['second'];
$n2=pow(($number2+2)/2,2);
$number3=$_POST['third'];
$n3=pow(($number3+2)/2,2);



$select="SELECT * from users WHERE username-'$user'";


$result=$conn->query($select);
$n=$result->num_rows;


if ($n>=1)

{
echo " USERNAME ALREADY EXIST";	
}

else if($n==0)
{

if ($pass!=$conf) {
	
echo "PASSWORD DO NOT MATCH";


}
else if($frase!=$confrase )
{
echo "PASSPHRASE DO NOT MATCH";
}

else if($pass==$conf && $frase==$confrase )
{

$insert = "INSERT INTO users (username,password,pass,number1,number2,number3,question1,answer1,question2,answer2,nonce,attempt)
VALUES ('$user','$pass','$frase','$n1','$n2','$n3','$q1','$ans1','$q2','$ans2',0,0)";

$res1=$conn->query($insert);

if ( $res1== TRUE) {
  echo "New record created successfully";
  echo $n1;
} 

 else if($res1==false) {
  echo "Error creating table: " . $conn->error;
}









}





}












}
















 ?>





















</body>
</html>