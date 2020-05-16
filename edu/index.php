<?php
 // Start Session
 session_start();
 
require_once "../config.php";

if(isset($_SESSION["edu"]) && $_SESSION["edu"]==1)
{
echo "<script>alert('You`re Education Information has been added successfully');</script>";
$_SESSION["edu"]=0;
}
if(isset($_SESSION["edu"]) && $_SESSION["edu"]==2)
{
echo "<script>alert('You`re Education Information has been deleted successfully');</script>";
$_SESSION["edu"]=0;
}
$temp=$_SESSION["email"];
$type="";
  $stream="";
  $name="";
  $year="";
  $grade="";
if(isset($_POST['submit']))
{
  $type=$_POST["type"];
  $stream=$_POST["stream"];
  $name=$_POST["name"];
  $year=$_POST["year"];
  $grade=$_POST["grade"];
  $sql = "INSERT INTO education(email,level,stream,name,year,percent) 
                VALUES('$temp','$type','$stream','$name','$year','$grade')";
            if ($conn->query($sql) === TRUE) {
              $_SESSION["edu"]=1;
            header("Location:index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

}
$level=array();
$stre=array();
$nam=array();
$yea=array();
$grad=array();
$sql="Select * from education where email='$temp'";
$result=$conn->query($sql);
if($result->num_rows>0)
{
  while($row=$result->fetch_assoc())
{
  array_push($level,$row["level"]);
  array_push($stre,$row["stream"]);
  array_push($nam,$row["name"]);
  array_push($grad,$row["percent"]);
  array_push($yea,$row["year"]);
}
}
for($x=0;$x<count($yea);$x++)
{
  if(isset($_POST["$yea[$x]"]))
  {
    $cemp=$yea[$x];
    $sql="Delete from education where email='$temp' and year='$cemp'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION["edu"]=2;
            header("Location:index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Education Details</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
  .main{
    background-image:url("../login/images/color.png");
}
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
.signup-content{
  width:900px;
}
input{
  width: 1000px;
}
table{
  color: black;
}
    </style>
<body>
    <ul>
     
<li style="float:left"><a href=""><h2><font color="  #ffff08"><font face="Montserrat|Open+Sans">Resume Builder</h2></a></li>
    <!-- <li style="float:left"><a href="log.html"><h2><font color=" #ffffff"></h2></a></li>
    <li style="float:left"><a href="log.html"><h2><font color=" #ffffff"></h2></a></li>
<li style="float:left"><a href="log.html"><h2><font color=" #ffffff"></h2></a></li>
    <li style="float:left"><a href="log.html"><h2><font color=" #ffffff"></h2></a></li>
    <li style="float:left"><a href="log.html"><h2><font color=" #ffffff"></h2></a></li> -->
   <li style="float:left"><a href="../per/index.php"><h2><font color=" #ffffff">Personal Information</h2></a></li>
      <li style="float:left"><a href="../edu/index.php"><h2><font color="  #ffffff">Education</h2></a></li>
      <li style="float:left"><a href="../skills/index.php"><h2><font color=" #ffffff">Skills</h2></a></li>
            <li style="float:left"><a href="../temp.php"><h2><font color=" #ffffff">Template</h2></a></li>
   <li style="float:left"><a class="active" href="../login/home.php"><h2><font color=" #ffffff">Logout</h2></a></li></ul>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">

                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                    </div>
                    <div class="signup-form">
                        <h2 class="form-title">Education Details</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div>
                          <label class="form-group"><b>Qualification Level:</label>
                          <select name="type" size="1" id="level">
                          <option value="">--Select--</option>
                          <option value="Certificate Course">Certificate Course</option>
                          <option value="Diploma Course">Diploma Course</option>
                          <option value="P.H.D">P.H.D</option>
                          <option value="H.S.C">H.S.C</option>
                          <option value="S.S.C">S.S.C</option>
                          <option value="Bachelor`s Degree">Bachelor's Degree</option>
                          <option value="Master`s Degree">Master's Degree</option>
                        </select><br><br>
                      </div>
                            <div>
                                <label class="form-group"><b>Stream:</label>
                                <select name="stream" size="1">
                                <option value="">--Select--</option>
                                <option value="Science">Science</option>
                                <option value="Arts">Arts</option>
                                <option value="Commerce">Commerce</option>
                                <option value="Law">Law</option>
                                <option value="Medical">Medical</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Management">Management</option>
                                <option value="Social Work">Social Work</option>
                        </select><br><br>
                                <label class="form-group">Institute Name</label>
                                <input type="text" name="name" placeholder="E.g:Sardar Patel Institute Of Technology" /><br>
                            </div>
                            <label class="form-group">Passing Year</label>
                                <input type="text" name="year" placeholder="E.g:2014" /><br>
                                <label class="form-group">Percentage</label>
                                <input type="text" name="grade" placeholder="E.g:87.54" /><br>
                                <center><input type="submit" name="submit" id="signup" class="form-submit" value="Add"/></center>
                            </div>
                        </form>
                    </div>
                </div>
                <br><br>
                <form method="post" action="">
    <div class="container"><center><br><br>  
<h2>Education Log</h2>
<table border=1>
<tr>
  <th>Qualification Level</th>
  <th>Stream</th>
  <th>Institute Name</th>
  <th>Passing Year</th>
  <th>Percentage</th>
  <th></th>
</tr>
<?php
for($x=0;$x<count($yea);$x++)
{
  echo "<tr>";
  echo "<td>".$level[$x]."</td>";
  echo "<td>".$stre[$x]."</td>";
  echo "<td>".$nam[$x]."</td>";
  echo "<td>".$yea[$x]."</td>";
  echo "<td>".$grad[$x]."</td>";
  echo'<td><center><input type="submit" name='.$yea[$x].' id="signup" class="form-submit" value="Delete"/></center></td>';
  echo "</tr>";
}
?>
</table>

</center>  
<br><br>
</div>
</form>
</div>
        </section>

        <!-- Sing in  Form -->
        

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
