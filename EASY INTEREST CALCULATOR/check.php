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

<?php session_start(); ?>
<center>
<body background="111.jpg">
<h2> </h2>
<?php
$servername="localhost";
$username="b130834cs";
$password="Vali@8254";
$dbname="db_b130834cs";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die("connection failed: " .mysqli_connect_error());
}
$m=$_POST["mob"];
$p=$_POST["psd"];

$sql="SELECT password from int_login where mobile='$m' or email='$m'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$pp=$row["password"];
}

#echo " $pp and $p";
if($pp===$p)
{
#echo $m;
$_SESSION["id"]=1;
$_SESSION["user"]=$m;
echo "<title>
Easy Interest Calculator
</title>
<body>
<h2> logged in as ";
$servername="localhost";
$username="b130834cs";
$password="Vali@8254";
$dbname="db_b130834cs";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die("connection failed: " .mysqli_connect_error());
}
$m=$_POST["mob"];
$p=$_POST["psd"];

$sql="SELECT fname from int_data where mobile='$m' or email='$m'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$pp=$row["fname"];
}
#echo "mobile=$m";
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

//mysqli_close($conn);
//
/*echo "<a href='profile.php'>Profile</a><br>
<a href='messages.php'>Messages</a><br>
<a href='friends.php'>Friends</a><br>
<a href='index.php'>Logout</a> "; */
//<?php 
/*echo '<form action="index.php" method="post">
	<input type="submit" value="logout">
	</form> </h2>'; */
#echo "password matches<br>";
}
else
{
echo "<head>
<meta charset='UTF-8'>
<link rel='stylesheet' href='style/css/style.css'>
</head>";
#echo "password not matches<br>";
echo "You have entered incorrect username or password ";

echo "
<center>
<h1>
Easy Interest Calculator
<br>
</h1>
<b>login</b><br><br>
<form action='check.php' method='POST'>
<input type='text' name='mob' placeholder='Mobile' required><br>
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

";

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


<!--
<form action="admin.php" method="POST">
<input type="submit" value="HOME">
</form> !-->
<br>
</center>
</body>
</html>

