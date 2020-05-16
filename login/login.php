<?php
// Start Session
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>My Site | Login</title>
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
	background-color: #66ff33;
  color:#cc0099;
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
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
   </div>
  
  <div class="form-group row">
    <div class="form-group">

      <input type="submit" class="btn btn-primary" align="right">
    </div>
  </div>
  <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
  <a href="forget.php">Forget Password</a>
 </form>
</center>
 <!-- Add styles to make the UI better -->
</body>
</html>
<?php
// Get data from the users
$email = "email";
$password1 = "pwd";
if (isset($_SESSION["forg"]) && $_SESSION["forg"]>0)
{
  echo "<script>alert('Password updated successfully');</script>";
}
if($_SERVER["REQUEST_METHOD"]=="POST")
        {
        if(isset($_POST["email"]) && isset($_POST["password"]))
        {

$email = $_POST["email"];
$password1 = ($_POST["password"]);


require_once "../config.php";
// Write query (should be written in MySQL)
// Below query checks for credentials in the database
$sql = "SELECT * FROM users WHERE email='$email' AND password=$password1";

// Run the query using the mysqli_query function
// First parameter is the database connection
// Second parameter is the sql query
$result = mysqli_query($conn, $sql);
// Convert the result from above into an array
// id can be accessed as $row["id"]
// Similarly other attributes can be accessed
$row = mysqli_fetch_array($result);
// Print result for debugging
print_r($row);
// Set the session variables
if(!empty($_POST["email"])){
if (is_array($row)) {
 $_SESSION["name"] = $row['name'];
 $_SESSION["email"] = $row['email'];
}
$_SESSION["forg"]=0;    
// Redirect to dashboard
 header("Location:../per/index.php");
}
}}
?>

