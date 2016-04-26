<html>
<title>
New Registration
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
<?php if($_SESSION["id"] !=1){
echo "<body background='5.jpejg'>
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

</center>";
}
else {
echo "<h2> "; 
$servername="localhost";
$username="b130834cs";
$password="Vali@8254";
$dbname="db_b130834cs";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die("connection failed: " .mysqli_connect_error());
}
#$m=$_POST["mob"];
$p=$_POST["psd"];
$m=$_SESSION['user'];
$sql="SELECT fname,id,avl_amt from int_data where mobile='$m' or email='$m'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$pp=$row["fname"];
$id=$row["id"];
$avl_amt=$row["avl_amt"];
}
echo "logged in as ";
echo "$pp<br>";
if($_SERVER["REQUEST_METHOD"]=="POST"){
$cname=$_POST["cname"];
$cfname=$_POST["cfname"];
$ccity=$_POST["ccity"];
$amount=$_POST["amount"];
$rate=$_POST["rate"];
$doi=$_POST["doi"];
$dor=$_POST["dor"];
$tim=$_POST["tim"];
$st='NOT PAID';
#echo $st  ;
if($amount<=$avl_amt){
#echo "data=$id,$cname,$cfname,$ccity,$amount,$rate,$doi,$dor,$tim";
#$sql="insert into interest(id,cname,cfname,ccity,amount,rate,doi,dor,tim,status) values($id,'$cname','$cfname',$amount,$rate,'$doi','$dor',$tim,'$st');";

$sql="insert into int_interest(id,cname,cfname,ccity,amount,rate,doi,dor,tim,status,interest) values($id,'$cname','$cfname','$ccity',$amount,$rate,'$doi','$dor',$tim,'NOT paid',0);";
$avl_amt=$avl_amt-$amount;
$result=mysqli_query($conn,$sql);
if($result){
$sql="update int_data set avl_amt=$avl_amt where id=$id";
$result=mysqli_query($conn,$sql);
$sql="select * from int_interest where id=$id and cname='$cname' and cfname='$cfname' and ccity='$ccity' and amount=$amount";
$result1=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result1)){
$sno=$row["sno"];
$sql="insert into int_transactions(id,sno,amount,type) values($id,$sno,$amount,'Debit')";
$result=mysqli_query($conn,$sql);

}

echo "ADDED SUCCESSFULLY";
}
else{
echo "error";
}
}
}
else
{
echo "<font color='red'>amount should be lessthan available amount<br>";
}
mysqli_close($conn);
}
?>
<h3>Register New Customer data in Easy Interest Calculator</h3>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<input type="text" name="cname" placeholder='Full_NAME' required><br>
<input type="date" name="cfname" placeholder='Father's_name/Husband_name' required><br>
<input type="text" name="ccity" placeholder='City' required><br>
<input type="text" name="amount" placeholder='Amount' required><font color='red'> <?php echo "plz enter amount <=$avl_amt"?><br><font color='white'>
<input type="real" name="rate" placeholder='Rate'><br>
<input type="date" name="doi" placeholder='Date_Of_issue(yyyy-mm-dd)' required><br>
<input type="date" name="dor" placeholder='Date_Of_Refund(yyyy-mm-dd)' required><br>
<input type="real" name="tim" value=0 placeholder='Time_In_Months'><br>
<input type="submit" value="Register">
</form>

<form action="alerts.php" method="POST">
<input type="submit" value="Alerts"></form>
<form action="welcome.php" method="POST">
<input type="submit" value="Home"></form>
<form action="index.php" method="POST">
<input type="submit" value="Logout"></form>
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
</body>
</html>
