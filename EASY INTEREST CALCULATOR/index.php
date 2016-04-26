<!doctype html>
<html>
<title>
Easy Interest Calculator
</title>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="style/css/style.css">
</head>
<?php
session_start(); ?>
<?php $_SESSION["id"]=0;
      $_SESSION["user"]=0; ?>
<body>
<div class="wrapper">
	<div class="container">
<center>
<h1>
Easy Interest Calculator<br>
</h1>
<b>login</b><br><br>
<form action="check.php" method="POST">
<input type="text" name="mob" placeholder='Email/Mobile' required><br>
<input type="password" name="psd" placeholder='Password' required><br>
<input type="submit" value="login">
</form>
<form action="signup.php" method="POST">
<input type="submit" value="New Registration">
</form>
<form action="forgot.php" method="POST">
<input type="submit" value="Forgot password">
</form>
<form action="http://192.168.40.99/surendar_b130834cs/eic/easy_interest_calculator_app.zip" method="POST">
<input type="submit" value="Get Android app">
</form>
<h3>How it works..??</h3>
<iframe width="560" height="315" src="https://www.youtube.com/embed/12Ru-l9tboY?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
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


