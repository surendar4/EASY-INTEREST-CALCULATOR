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
$sql="SELECT fname,id,avl_amt from int_data where mobile='$m' or email='$m'";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
$pp=$row["fname"];
$id=$row["id"];
$avl_amt=$row["avl_amt"];
}
echo "";
echo "$pp<br>";
$sno=$_POST["sno"];
$status=$_POST["status"];
if($status=='Paid_Enter'){
$am=$_POST["am"];
#$int=$_POST["int"];
$tm=$_POST["tm"];
$cn=$_POST["cn"];
$cfn=$_POST["cfn"];
$di=$_POST["di"];
$dr=$_POST["dr"];
$rt=$_POST["rt"];
$date2=new DateTime("$di");
$date1=new DateTime("$dr");
#echo $date1;
#echo $date2;
$interval=$date1->diff($date2);
#echo "difference  ".$interval->y."years ".$interval->m." months  ".$interval->d."  days <br>";
#echo "difference ".$interval->days."days<br>";
#echo $interval->days/30;
$tm=$interval->days/30;
$int=$am*$rt*$tm/100;
$tot=$am+$int;
$avl_amt=$avl_amt+$tot;
#echo $tot;
echo "Cname=$cn <br>Cfname=$cfn <br>Date_of_issue=$di<br>Date_of_repayment=$dr<br>Amount=$am <br> Interest=$int<br> Time=$tm months <br> Total=$tot<br><font color='red' Available amount:$avl_amt<br>";
$sql="update int_data set avl_amt=$avl_amt where id='$id'";
$result=mysqli_query($conn,$sql);
$sql="update int_interest set cname='$cn',cfname='$cfn',amount=$am,doi='$di',dor='$dr',tim=$tm,status='Paid',interest=$int,total=$tot where sno=$sno";
$result=mysqli_query($conn,$sql);
if($result){
$sql="insert into int_transactions(id,sno,amount,type) values($id,$sno,$tot,'Credit')";
$result=mysqli_query($conn,$sql);
echo "updated successfully";
}
else{
echo "error occurred";
}
}
else {
$am=$_POST["am"];
#$int=$_POST["int"];
$tm=$_POST["tm"];
$cn=$_POST["cn"];
$cfn=$_POST["cfn"];
$di=$_POST["di"];
$dr=$_POST["dr"];
$rt=$_POST["rt"];
#$date2=new DateTime("$di");
#$date1=new DateTime("$dr");
#echo $date1;
#echo $date2;
#$interval=$date1->diff($date2);
#echo "difference  ".$interval->y."years ".$interval->m." months  ".$interval->d."  days <br>";
#echo "difference ".$interval->days."days<br>";
#echo $interval->days/30;
#tm=$interval->days/30;
#$int=$am*$rt*$tm/100;
#$tot=$am+$int;
#echo $tot;
echo "Cname=$cn <br>Cfname=$cfn <br>Date_of_issue=$di<br>Date_of_repayment=$dr<br>Amount=$am <br>Rate=$rt<br>";
$sql="update int_interest set cname='$cn',cfname='$cfn',amount=$am,doi='$di',dor='$dr',status='Renewal on $di' where sno=$sno";
$result=mysqli_query($conn,$sql);
if($result){
$sql="insert into int_transactions(id,sno,amount,type) values($id,$sno,$am,'Credit')";
$result=mysqli_query($conn,$sql);
$sql="insert into int_transactions(id,sno,amount,type) values($id,$sno,$am,'Debit')";
$result=mysqli_query($conn,$sql);
echo "updated successfully";
}
else{
echo "error occurred";
}

}
mysqli_close($conn);
}
?>
<form action="alerts.php" method="POST">
<input type="submit" value="Alerts"></form>
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
