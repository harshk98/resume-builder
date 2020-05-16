<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sardar Patel Institute Of Technology</title>
</head>
<style>
body{
background-image: url(images/The-Grand-Entrance.jpg);	
background-repeat: no-repeat;
background-size: cover;
}
img{
	height: 150px;
}
div{
	margin-left: 500px;
	margin-top: 150px;
	margin-right: 580px;
	color:cyan;
	background-color: black;
}
h2{
	color:#FDFF00;
}
.redirect{
  background-color: red;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
</style>
<body>
<img src="images/logo.jpeg">
<div>
	<h1><b>Build Your Resume in a Minute</b></h1>
	<center><h2>Click here to start</h2></center>
	<center><a href="login.php" class="redirect">Register</a></center><br>
	</div>
</body>
</html>