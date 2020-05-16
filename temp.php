<?php
session_start();

require_once "config.php";
if(isset($_POST['submit']))
{
  if(isset($_POST['tem']))
  {
    $temp=$_POST['tem'];
    if($temp=='blue')
    {
      header("Location:blue/index.php");
    }
    if($temp=='brown')
    {
      header("Location:brown/index.php");
    }
    if($temp=='green')
    {
      header("Location:green/index.php");
    }
    if($temp=='purple')
    {
      header("Location:purple/index.php");
    }
    if($temp=='red')
    {
      header("Location:red/index.php");
    }
  }
  else
  {
    echo "<script>alert('Pl select a template to proceed');</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
  ul {
  list-style-type: none;
  margin: 0;
 
  height:80px;
  padding: 0;
  overflow: hidden;
  background-color: #003300;
}

li {
  float: left;
}

li a {
  display: block;
  color: #FF3366  ;
  text-align: center;
  padding: 14px 16px;

  
}

li a:hover {
  background-color: #002200;
}
* {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 20%;
  padding: 30px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
img{
  height: 500px;
}
body{
  background-image: url("login/images/color.png");
  color:cyan;
}
.form-submit {
  display: inline-block;
  background: yellow;
  color: black;
  border-bottom: none;
  width: auto;
  padding: 15px 39px;
  border-radius: 5px;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  -o-border-radius: 5px;
  -ms-border-radius: 5px;
  margin-top: 25px;
  cursor: pointer;
  font-weight:100px ;
  font-size: 30px;
   }
  .form-submit:hover {
    background: #4292dc; }
</style>
</head>
<body>
  <ul>
     
<li style="float:left"><a href=""><h2><font color="  #ffff08"><font face="Montserrat|Open+Sans"><u>Resume Builder</u></h1></a></li>
    <!-- <li style="float:left"><a href="log.html"><h2><font color=" #ffffff"></h2></a></li>
    <li style="float:left"><a href="log.html"><h2><font color=" #ffffff"></h2></a></li>
<li style="float:left"><a href="log.html"><h2><font color=" #ffffff"></h2></a></li>
    <li style="float:left"><a href="log.html"><h2><font color=" #ffffff"></h2></a></li>
    <li style="float:left"><a href="log.html"><h2><font color=" #ffffff"></h2></a></li> -->
   <li style="float:left"><a href="../per/index.php"><h2><font color=" #ffffff"><u>Personal Information</u></h2></a></li>
      <li style="float:left"><a href="../edu/index.php"><h2><font color="  #ffffff"><u>Education</u></h2></a></li>
      <li style="float:left"><a href="../skills/index.php"><h2><font color=" #ffffff"><u>Skills</u></h2></a></li>
            <li style="float:left"><a href="../temp.php"><h2><font color=" #ffffff"><u>Template</u></h2></a></li>
   <li style="float:left"><a class="active" href="../login/home.php"><h2><font color=" #ffffff"><u>Logout</u></h2></a></li></ul>
<center><h2>Templates for Resume </h2></center>
<form method="post">
<div class="row">
  <div class="column">
    <img src="blue.png" alt="Snow" style="width:120%">
    <center><input class="label-input100" type="radio" name="tem" value="blue">Blue</center>
  </div>
  <div class="column">
    <img src="brown.png" alt="Snow" style="width:120%">
  <center><input class="label-input100" type="radio" name="tem" value="brown">Brown</center>
  </div>
  <div class="column">
    <img src="green.png" alt="Snow" style="width:120%">
  <center><input class="label-input100" type="radio" name="tem" value="green">Green</center>
  </div>
  <div class="column">
    <img src="red.png" alt="Snow" style="width:120%">
  <center><input class="label-input100" type="radio" name="tem" value="red">Red</center>
  </div>
  <div class="column">
    <img src="purple.png" alt="Snow" style="width:120%">
  <center><input class="label-input100" type="radio" name="tem" value="purple">Purple</center>
  </div>
  <center><input type="submit" name='submit' id="signup" class="form-submit" value="Build Resume"/></center>
</div>
</form>

</body>
</html>