<html>
<title>
Easy Interest Calculator | Alerts
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
echo "<h2> logged in as "; 
$servername="localhost";
$username="b130834cs";
$password="Vali@8254";
$dbname="db_b130834cs";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die("connection failed: " .mysqli_connect_error());
}
#$incy=date("Y")+1;
$today= date("Y-m-d");
#$incy=date("Y")+1;
/*echo $incy;
$m=23;
echo floor($m/12);
echo $m%12; */
#$today=date("Y-M-D");
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
$sno=$_POST["sno"];
$statuss=$_POST["status"];
#echo "status=$statuss";
if($statuss==Paid)
{
$sql="select * from int_interest where sno=$sno";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
#$dr=$row["dor"];
$di=$row["doi"];
$cn=$row["cname"];
$cfn=$row["cfname"];
$am=$row["amount"];
$date2=new DateTime("$di");
$date1=new DateTime("$today");
#echo $date1;
#echo $date2;
$interval=$date1->diff($date2);
#echo "difference  ".$interval->y."years ".$interval->m." months  ".$interval->d."  days <br>";
#echo "difference ".$interval->days."days<br>";
#echo $interval->days/30;
$tm=$interval->days/30;
$int=$row["amount"]*$row["rate"]*$tm/100;
$tot=$row["amount"]+$int;
$rt=$row["rate"];

echo "<form action='ent_mod_status.php' method='POST'>
Sno<input type='text' value='$sno' name='sno'><br>
Cname<input type='text' value='$cn' name='cn'><br>
Cfname<input type='text' value='$cfn' name='cfn'><br>
Date_Of_issue<input type='text' value='$di' name='di'><br>
Date_of_repayment<input type='text' value='$today' name='dr'><br>
AMOUNT<input type='text' value='$am' name='am'><br>
Time in Months<input type='text' value='$tm' name='tm'><br>
Rate<input type='text' value='$rt' name='rt'><br>
Interest <input type='text' value='$int' name='int'><br>
Total<input type='text' value='$tot' name='tot'><br>
<input type='submit' value='Paid_Enter' name='status'><br>";
}

#$sts=$_POST["status"];
#echo "status paid of $sno";
}
else if($statuss=Renewal)
{



$sql="select * from int_interest where sno=$sno";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
#$dr=$row["dor"];
$di=$row["doi"];
$cn=$row["cname"];
$cfn=$row["cfname"];
$am=$row["amount"];
$date2=new DateTime("$di");
$date1=new DateTime("$today");
#echo $date1;
#echo $date2;
$interval=$date1->diff($date2);
#echo "difference  ".$interval->y."years ".$interval->m." months  ".$interval->d."  days <br>";
#echo "difference ".$interval->days."days<br>";
#echo $interval->days/30;
$tm=$interval->days/30;
$int=$row["amount"]*$row["rate"]*$tm/100;
$tot=$row["amount"]+$int;
$rt=$row["rate"];
$dy=date("Y");
$dy=$dy+1;
$drr=date("$dy-m-d");
$dr=$row["dor"];
echo "<form action='ent_mod_status.php' method='POST'>
Sno<input type='text' value='$sno' name='sno'><br>
Cname<input type='text' value='$cn' name='cn'><br>
Cfname<input type='text' value='$cfn' name='cfn'><br>
Date_Of_issue<input type='text' value='$di' name='dii'><br>
Date_of_repayment<input type='text' value='$dr' name='drr' required><br>
AMOUNT<input type='text' value='$am' name='amt'><br>
Time in Months<input type='text' value='$tm' name='tm'><br>
Rate<input type='text' value='$rt' name='rt'><br>
Interest <input type='text' value='$int' name='int'><br>
New Amount<input type='text' value='$tot' name='am'><br>
New Date_Of_issue<input type='text' value='$today' name='di'><br>
New Date_of_repayment<input type='text' value='$drr' name='dr' required><br>
<input type='submit' value='Renewal_Enter' name='status'><br>";
}
}
/* echo "<form action='profile.php' method='post'>
<input type='submit' value='Profile'></form>

<form action='alerts.php' method='post'>
<input type='submit' value='Alerts'></form>

<form action='transactions.php' method='post'>
<input type='submit' value='Friends'></form>

<form action='index.php' method='post'>
<input type='submit' value='Logout'></form>"; */
#echo "Today's Alerts";
/*$sql="select * from interest where id=$id and status !='Paid'";
$result=mysqli_query($conn,$sql);
#$today= date("Y-m-d");
echo "Today=$today";
echo "<CENTER><font color='orange'> <B> TODAY'S DUES<BR> </B></CENTER><br>";
if($result->num_rows>0){
echo "<center> <table><tr><th>CNAME</th><th>CFNAME</th><th>DUE</th><th>Date_Of_Issue</th><th>INTEREST</th><th>TOTAL</th><th>LAST DATE</th><th>STATUS</th></tr>";
while($row=mysqli_fetch_assoc($result)){
$date=$row["dor"];
#echo "date=$date";
#$mon=$date;
#echo "month=$mon;
#echo "cal=$date";
if($today==$date)
{
$interest=$row["amount"]*$row["rate"]*$row["tim"]/100;
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

$sql="select * from interest where status !='Paid' and id=$id";
$result=mysqli_query($conn,$sql);
echo "<CENTER><font color='orange'> <B> UPCOMING'S DUES<BR> </B></CENTER><br>";
if($result->num_rows>0){
echo "<center> <table><tr><th>CNAME</th><th>CFNAME</th><th>DUE</th><th>Date_Of_Issue</th><th>INTEREST</th><th>TOTAL</th><th>LAST DATE</th><th>STATUS</th></tr>";
while($row=mysqli_fetch_assoc($result)){
$date=$row["dor"];
#echo "date=$date";
#$mon=$date;
#echo "month=$mon;
#echo "cal=$date";
if($today<$date)
{
$interest=$row["amount"]*$row["rate"]*$row["tim"]/100;
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

$sql="select * from interest where id=$id and status!='Paid'";
$result=mysqli_query($conn,$sql);
echo "<CENTER><font color='red'> <B> PENDING DUES<BR> </B></CENTER><br>";
if($result->num_rows>0){
echo "<center> <table><tr><th>CNAME</th><th>CFNAME</th><th>DUE</th><th>Date_Of_Issue</th><th>INTEREST</th><th>TOTAL</th><th>LAST DATE</th><th>STATUS</th></tr>";
while($row=mysqli_fetch_assoc($result)){
$date=$row["dor"];
#echo "date=$date";
#$mon=$date;
#echo "month=$mon;
#echo "cal=$date";
if($today>$date)
{
$interest=$row["amount"]*$row["rate"]*$row["tim"]/100;
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

$sql="select * from interest where id=$id and status='Paid'";
$result=mysqli_query($conn,$sql);
echo "<CENTER><font color='blue'> <B>PAID DETAILS<BR> </B></CENTER><br>";
if($result->num_rows>0){
echo "<center> <table><tr><th>CNAME</th><th>CFNAME</th><th>DUE</th><th>Date_Of_Issue</th><th>INTEREST</th><th>TOTAL</th><th>LAST DATE</th></tr>";
while($row=mysqli_fetch_assoc($result)){
$date=$row["dor"];
#echo "date=$date";
#$mon=$date;
#echo "month=$mon";
#echo "cal=$date";
if($today>$date)
{
$interest=$row["amount"]*$row["rate"]*$row["tim"]/100;
$total=$row["amount"]+$interest;
echo "<tr><td>".$row["cname"]."</td><td>".$row["cfname"]. "</td><font color='red'><td>".$row["amount"]. "</td><td>".$row["doi"]."</td><td>$interest</td><td>$total </td><font color='black'><td>".$row["dor"]."</td><td>Paid</td></tr>";
}
}
echo "</table><BR>";
}
else {
echo "NO DATA FOUND!";
}

*/


mysqli_close($conn);
}
?>
<form action="alerts.php" method="POST">
<input type="submit" value="Alerts"></form>
<form action="welcome.php" method="POST">
<input type="submit" value="Home"></form>
<form action="index.php" method="POST">
<input type="submit" value="Logout"></form>
<!--<form action="index.php" method="post">
	<input type="submit" value="logout">
	</form> !-->

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
