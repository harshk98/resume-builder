<?php
// Start Session
session_start();
?>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>My Site | forget</title>
</head>
 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 

  <link rel="stylesheet" type="text/css" href="style.css">

  <style>
body{
background-image:url(images/color.png);
}
form{
	background-color: #FF8000;
  color:#4C0B5F;
  font-size: 20px;
}
	</style>
	 <body>
 <br>
 <!-- Form to input User data -->
 <center>

	<form action="" method="post">
  <div class="input-group">
    <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
  </div>
  <div class="input-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
   </div>
  
  <div class="form-group row">
    <div class="form-group">

      <input type="submit" class="btn btn-primary" align="right">
    </div>
  </div>
   </form>
</center>
 <!-- Add styles to make the UI better -->
</body>
</html>
<?php
// Get data from the users
if($_SERVER["REQUEST_METHOD"]=="POST")
        {
        if(isset($_POST["email"]) && isset($_POST["password"]))
        {

$email = $_POST["email"];
$password1 = ($_POST["password"]);


require_once "../config.php";
$sql = "UPDATE users SET password='$password1' WHERE email='$email'";
if ($conn->query($sql) === TRUE) {
	
    $_SESSION["forg"]=1;
    header("Location:login.php");
} else {
    echo "Error updating record: " . $conn->error;
}
}}
?>