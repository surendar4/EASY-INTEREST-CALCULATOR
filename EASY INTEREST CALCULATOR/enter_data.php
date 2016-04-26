<!DOCTYPE HTML>
<html>
<title>
Easy Interest Calculator
</title>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style/css/style.css">
</head>
<body>
<div class="wrapper">
	<div class="container">
<center>

<?php session_start(); ?>
<?php
$servername="localhost";
$username="b130834cs";
$password="Vali@8254";
$dbname="db_b130834cs";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die("connection failed: " .mysqli_connect_error());
}
#$e=$_POST["eid"];
$fn=$_POST["fname"];
$dob=$_POST["dob"];
$gender=$_POST["gender"];
$mob=$_POST["mob"];
$psd=$_POST["password"];
$city=$_POST["city"];
$email=$_POST["email"];
$avl_amt=$_POST["int_amt"];
$pin=$_POST["pin"];
$sql="INSERT INTO int_data(fname,dob,gender,mobile,city,email,int_amt,avl_amt) values('$fn','$dob','$gender','$mob','$city','$email',$avl_amt,$avl_amt)";

if(mysqli_query($conn, $sql)){
 #   echo "data";
} else {

	echo "<center>Error occured reasons for error <br>1.Already Registered mobile or email<br>2.Slow internet <br></center><form action='signup.php' method='POST'>
<input type='submit' value='Back'>
</form><form action='index.php' method='POST'>
<input type='submit' value='login'>
</form>";
   # echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql="SELECT id from int_data where mobile='$mob'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$id=$row["id"];
}
#echo "id=$id ";

$sql="INSERT INTO int_login values($id,'$psd','$dob','$mob','$email',$pin)";

if(mysqli_query($conn, $sql)){
    echo "Registered successfully<br>";
#<!DOCTYPE html>

 /*$_SESSION["id"]=0;
      $_SESSION["user"]=0;
echo "<body>
<center>
<h1>
Easy Interest Calculator<br>
</h1>
<b>login</b><br><br>
<form action='check.php' method='POST'>
<input type='text' name='mob' placeholder='Email/Mobile' required><br>
<input type='password' name='psd' placeholder='Password' required><br>
<input type='submit' value='login'>
</form>
<form action='signup.php' method='POST'>
<input type='submit' value='Signup'>
</form>
<form action='forgot.php' method='POST'>
<input type='submit' value='Forgot password'>
</form>
</center>

"; */
$_SESSION["id"]=1;
$_SESSION["user"]=$mob;
$sql="SELECT fname from int_data where mobile='$mob' or email='$mob'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$pp=$row["fname"];
}
echo "";
echo "$pp<br>";
echo "<form action='profile.php' method='post'>
<input type='submit' value='Profile'></form>

<form action='alerts.php' method='post'>
<input type='submit' value='Alerts'></form>

<form action='trans.php' method='post'>
<input type='submit' value='Transactions'></form>
<form action='transactions.php' method='post'>
<input type='submit' value='Overview'></form>

<form action='index.php' method='post'>
<input type='submit' value='Logout'></form>";






} else {
   # echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    #echo "Error occured reasons for error <br>1.Already Registered mobile or email<br>2.Slow internet <br>";
}
mysqli_close($conn);
?> 
</div>
<ul class='bg-bubbles'>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
 <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='style/js/index.js'></script>

</body>
</html>
