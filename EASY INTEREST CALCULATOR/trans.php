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
<?php if($_SESSION["id"] !=1){
echo "<body background='5.jpeg'>
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
echo "<h2> logged in as "; 
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
#echo $m;
$sql="SELECT fname,id from int_data where mobile='$m' or email='$m'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$pp=$row["fname"];
$id=$row["id"];
}
echo "";
echo "$pp<br>";
$today= date("Y-m-d");

echo "<font color='black' >Transactions<font color='white'> ";
$sql="select fname,cname,cfname,int_transactions.amount,type,regd from int_data,int_transactions,int_interest where int_transactions.id=int_data.id and int_interest.sno=int_transactions.sno and int_data.id=$id order by regd desc";
$result=mysqli_query($conn,$sql);
if($result->num_rows>0){
echo "<table><tr><th>Cname</th><th>Cfname</th><th>Amount</th><th>Type</th><th>Date&Time</th></tr>";
while($row=mysqli_fetch_assoc($result)){
echo "<tr><td>".$row["cname"]."</td><td>".$row["cfname"]."</td><td>".$row["amount"]."</td><td>".$row["type"]."</td><td>".$row["regd"]."</td></tr>";
/*$i_a=$row["int_amt"];
$a_a=$row["avl_amt"];
#echo "jjjlk";
}
}
$sql="select * from interest where id='$id' and status !='Paid'";
$result1=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result1)){
$di=$row["doi"];
$date2=new DateTime("$di");
$date1=new DateTime("$today");
#echo $date1;
#echo $date2;
$interval=$date1->diff($date2);
#echo "difference  ".$interval->y."years ".$interval->m." months  ".$interval->d."  days <br>";
#echo "difference ".$interval->days."days<br>";
#echo $interval->days/30;
$tim=$interval->days/30;
$interest=$row["amount"]*$row["rate"]*$tim/100;
$total=$row["amount"]+$interest;
$total_i=$total_i+$total;
$totall=$totall+$row["amount"];
}
$sql="select * from interest where id='$id' and status ='Paid'";
$result1=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result1)){
$total_g_i=$total_g_i+$row["interest"];
}
$totall=$totall+$a_a;
$total_i=$total_i+$a_a;
echo "<br>Initial amount: $i_a <br>Total amount with Interest: $total_i<br>Total amount without Interest: $totall<br>Total amount got by Interest: $total_g_i<br>Available amount: $a_a<br>";

#echo "</table";

$idd=$row["id"];
*/
#echo "total friends=".$row["count"].;
#echo "ffff=" .$result;
#echo "<a href='welcome.php'>Home</a><br>";
#echo "<a href='index.php'>Logout</a>";
}
echo "</table>";
}
echo "<form action='welcome.php' method='post'>
<input type='submit' value='Home'></form>";
echo "<form action='index.php' method='post'>
<input type='submit' value='Logout'></form>";
mysqli_close($conn);
}
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
</center>

</body>
</html>
