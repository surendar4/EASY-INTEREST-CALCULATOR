<html>
<title>
Easy Interest Calculator | Alerts
</title>
 <head>
<!--<meta charset="UTF-8">
<link rel="stylesheet" href="style/css/style.css"> -->
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
/* echo "<form action='profile.php' method='post'>
<input type='submit' value='Profile'></form>

<form action='alerts.php' method='post'>
<input type='submit' value='Alerts'></form>

<form action='transactions.php' method='post'>
<input type='submit' value='Friends'></form>

<form action='index.php' method='post'>
<input type='submit' value='Logout'></form>"; */
#echo "Today's Alerts";
$sql="select * from int_interest where id=$id and status !='Paid'";
$result=mysqli_query($conn,$sql);
$today= date("Y-m-d");
echo "Today=$today";
echo "<CENTER><font color='black'> <B> TODAY'S DUES<BR> </B></CENTER><br>";
if($result->num_rows>0){
echo "<center> <table><tr><th>CNAME</th><th>CFNAME</th><th>DUE</th><th>Date_Of_Issue</th><th>INTEREST</th><th>TOTAL</th><th>LAST DATE</th><th>STATUS</th></tr>";
while($row=mysqli_fetch_assoc($result)){
$date=$row["dor"];
$di=$row["doi"];
#echo "date=$date";
#$mon=$date;
#echo "month=$mon;
#echo "cal=$date";
if($today==$date)
{
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
$sno=$row["sno"];
echo "<tr><td>".$row["cname"]."</td><td>".$row["cfname"]. "</td><font color='red'><td>".$row["amount"]. "</td><td>".$row["doi"]."</td><td>$interest</td><td>$total </td><font color='black'><td>".$row["dor"]."</td><td><form action='mod_status.php' method='post'><input type='int' value=$sno placeholder='$sno' name='sno'><input type='submit' value='Paid' name='status'>
<input type='submit' value='Renewal' name='status'></form></td></tr>";
}
}
echo "</table><BR>";
}
else {
echo "NO DATA FOUND!";
}

$sql="select * from int_interest where status !='Paid' and id=$id order by dor desc";
$result=mysqli_query($conn,$sql);
echo "<CENTER><font color='orange'> <B> UPCOMING'S DUES<BR> </B></CENTER><br>";
if($result->num_rows>0){
echo "<center> <table><tr><th>CNAME</th><th>CFNAME</th><th>DUE</th><th>Date_Of_Issue</th><th>INTEREST</th><th>TOTAL</th><th>LAST DATE</th><th>STATUS</th></tr>";
while($row=mysqli_fetch_assoc($result)){
$date=$row["dor"];
$di=$row["doi"];
#echo "date=$date";
#$mon=$date;
#echo "month=$mon;
#echo "cal=$date";
if($today<$date)
{
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
$sno=$row["sno"];
echo "<tr><td>".$row["cname"]."</td><td>".$row["cfname"]. "</td><font color='red'><td>".$row["amount"]. "</td><td>".$row["doi"]."</td><td>$interest</td><td>$total </td><font color='black'><td>".$row["dor"]."</td><td><form action='mod_status.php' method='post'><input type='int' value=$sno placeholder='$sno' name='sno'><input type='submit' value='Paid' name='status'>
<input type='submit' value='Renewal' name='status'></form></td></tr>";
}
}
echo "</table><BR>";
}
else {
echo "NO DATA FOUND!";
}

$sql="select * from int_interest where id=$id and status!='Paid'";
$result=mysqli_query($conn,$sql);
echo "<CENTER><font color='red'> <B> PENDING DUES<BR> </B></CENTER><br>";
if($result->num_rows>0){
echo "<center> <table><tr><th>CNAME</th><th>CFNAME</th><th>DUE</th><th>Date_Of_Issue</th><th>INTEREST</th><th>TOTAL</th><th>LAST DATE</th><th><font color='red'> Overtime</th><th>STATUS</th></tr>";
while($row=mysqli_fetch_assoc($result)){
$date=$row["dor"];
$di=$row["doi"];
#echo "date=$date";
#$mon=$date;
#echo "month=$mon;
#echo "cal=$date";
if($today>$date)
{
$date2=new DateTime("$date");
$date1=new DateTime("$today");
#echo $date1;
#echo $date2;
$interval=$date1->diff($date2);
#echo "difference  ".$interval->y."years ".$interval->m." months  ".$interval->d."  days <br>";
#echo "difference ".$interval->days."days<br>";
#echo $interval->days/30;
$due=$interval->days;
#echo "overtime:$due days";
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
$sno=$row["sno"];
echo "<tr><td>".$row["cname"]."</td><td>".$row["cfname"]. "</td><font color='red'><td>".$row["amount"]. "</td><td>".$row["doi"]."</td><td>$interest</td><td>$total </td><font color='black'><td>".$row["dor"]."</td><td><font color='red'>$due days</td><td><form action='mod_status.php' method='post'><input type='int' value=$sno placeholder='$sno' name='sno'><input type='submit' value='Paid' name='status'>
<input type='submit' value='Renewal' name='status'></form></td></tr>";
}
}
echo "</table><BR>";
}
else {
echo "NO DATA FOUND!";
}

$sql="select * from int_interest where id=$id and status='Paid'";
$result=mysqli_query($conn,$sql);
echo "<CENTER><font color='blue'> <B>PAID DETAILS<BR> </B></CENTER><br>";
if($result->num_rows>0){
echo "<center> <table><tr><th>Sno</th><th>CNAME</th><th>CFNAME</th><th>Amount</th><th>Date_Of_Issue</th><th>Date_Of_Repayment</th><th>Rate</th><th>INTEREST</th><th>TOTAL</th></tr>";
while($row=mysqli_fetch_assoc($result)){
$date=$row["dor"];
$di=$row["doi"];

echo "<tr><td>".$row["sno"]."</td><td>".$row["cname"]."</td><td>".$row["cfname"]. "</td><font color='red'><td>".$row["amount"]. "</td><td>".$row["doi"]."</td><td>".$row["dor"]."</td><td>".$row["rate"]."<td>".$row["interest"]."</td><td>".$row["total"]."</td><font color='black'><td>Paid</td></tr>";
}
echo "</table><BR>";
}
else {
echo "NO DATA FOUND!";
}



mysqli_close($conn);
}
?>
<!--<form action="index.php" method="post">
	<input type="submit" value="logout">
	</form> !-->
<form action='add_cdata.php' method='post'>
<input type='submit' value='ADD_NEW_DATA'></form>
<form action="welcome.php" method="POST">
<input type="submit" value="Home"></form>
<form action="index.php" method="POST">
<input type="submit" value="Logout"></form>
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
