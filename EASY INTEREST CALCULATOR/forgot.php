<html>
<title>
Easy Interest Calculator | Forgot password
</title>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style/css/style.css">
</head>
<body>
<div class="wrapper">
	<div class="container">
<center>
<?php
$servername="localhost";
$username="b130834cs";
$password="Vali@8254";
$dbname="db_b130834cs";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die("connection failed: " .mysqli_connect_error());
}
$m=$_POST["user"];
#$id=$_POST["id"];
$pin=$_POST["pin"];
$new=$_POST["psd"];
$sql="select * from int_login where email='$m' or mobile='$m'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_assoc($result)){
$iid=$row["id"];
$dpin=$row["pin"];
if($pin==$dpin){
$sql="update int_login set password='$new' where id=$iid";
$result=mysqli_query($conn,$sql);
if($result){
echo "new password updated successfully";
}
else{
echo "Invalid data entered!!!!!";
}
}
}
else {
#echo "something went wrong!!!!!";
}
mysqli_close($conn);

?>

<h3>Forgot Password | Easy Interest Calculator</h3>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="text" name="user" placeholder='Mobile/Email' required><br>
<input type="password" name="pin" placeholder='PIN' required><br>
<input type="password" name="psd" placeholder='New Password' required><br>
<input type="submit" value="Submit">
</form>


<form action="index.php" method="POST">
<input type="submit" value="Login"></form>
</div>

<ul class="bg-bubbles">
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
<script src="style/js/index.js"></script>


</center>
</html>


