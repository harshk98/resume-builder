<?php
 // Start Session
 session_start();
 
require_once "../config.php";

if(isset($_SESSION["sk"]) && $_SESSION["sk"]==1)
{
echo "<script>alert('You`re Skills has been updated successfully');</script>";
$_SESSION["sk"]=0;
}
if(isset($_SESSION["exp"]) && $_SESSION["exp"]==1)
{
echo "<script>alert('You`re Experience Information has been added successfully');</script>";
$_SESSION["exp"]=0;
}
if(isset($_SESSION["exp"]) && $_SESSION["exp"]==2)
{
echo "<script>alert('You`re Experience Information has been deleted successfully');</script>";
$_SESSION["exp"]=0;
}
$temp=$_SESSION["email"];
$sk="";
$lang="";
$sk_err="";
$lang_err="";
$sql="Select * from skills where email='$temp'";
$result = mysqli_query($conn, $sql);
 	$row = mysqli_fetch_array($result);
 	if(mysqli_num_rows($result) == 1)
 	{
 		if (is_array($row)) {
 		$sk=$row['sk'];	
 		$lang=$row['lang'];
 		}
 	}
 	else
	 {
	 	$sql = "INSERT INTO skills(email) 
	              VALUES('$temp')";
				    if ($conn->query($sql) === TRUE) {
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
	 }
	 if(isset($_POST['skillsub']))
	 {
	 	if (empty($_POST["sk"])) {
		    $sk_err = "Software Knowledge is required";
		  }
		else
		{
			$sk=$_POST["sk"];
		}
		if (empty($_POST["lang"])) {
		    $lang_err = "Language Knowledge is required";
		  }
		else
		{
			$lang=$_POST["lang"];
		}
		if($sk_err=="" && $lang_err=="")
		{
			$sql = "Update skills set sk='$sk',lang='$lang' where email='$temp'";
				    if ($conn->query($sql) === TRUE) {
				    	$_SESSION["sk"]=1;
				    	header("Location:index.php");
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
		}
	 }
	 $comp="";
	 $posn="";
	 $sdate="";
	 $edate="";
	 $desc="";
	 $comp_err="";
	 $posn_err="";
	 $sdate_err="";
	 $edate_err="";
	 $desc_err="";
	 if(isset($_POST['expsub'])){
	 	if (empty($_POST["comp"])) {
		    $comp_err = "Company name is required";
		  }
		else
		{
			$comp=$_POST["comp"];
		}
		if (empty($_POST["posn"])) {
		    $posn_err = "Position is required";
		  }
		else
		{
			$posn=$_POST["posn"];
		}
		if (empty($_POST["sdate"])) {
		    $sdate_err = "Start Date is required";
		  }
		else
		{
			$sdate=$_POST["sdate"];
		}
		if (empty($_POST["edate"])) {
		    $edate_err = "End Date is required";
		  }
		else
		{
			$edate=$_POST["edate"];
		}
		if (empty($_POST["desc"])) {
		    $desc_err = "Description is required";
		  }
		else
		{
			$desc=$_POST["desc"];
		}
		if($comp_err=="" && $posn_err=="" && $sdate_err=="" && $edate_err=="" && $desc_err=="")
		{
			$sql = "INSERT INTO exp(email,comp,posn,sdate,edate,desr) 
                VALUES('$temp','$comp','$posn','$sdate','$edate','$desc')";
            if ($conn->query($sql) === TRUE) {
              $_SESSION["exp"]=1;
              header("Location:index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
		}
	 }
	 $a=array();
	 $sql="Select * from exp where email='$temp'";
						$result=$conn->query($sql);
						if($result->num_rows>0)
						{
							while($row=$result->fetch_assoc())
							{
								array_push($a,$row["sdate"]);
							}
						}
	for($x=0;$x<count($a);$x++)
{
  if(isset($_POST["$a[$x]"]))
  {
    $cemp=$a[$x];
    $sql="Delete from exp where email='$temp' and sdate='$cemp'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION["exp"]=2;
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
	<title>Skills And Experience</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
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
.form-submit {
  display: inline-block;
  background: cyan;
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
  cursor: pointer; }
  .form-submit:hover {
    background: #4292dc; }
    </style>
<body style="background-color: #999999;">
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
	<div class="limiter">
		<div class="container-login100">
			<div class="heloo" style="background-image: url('../login/images/color.png');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form method="post" >
					<span class="login100-form-title p-b-59">
						Skills
					</span>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Software Knowledge</span>
						<input class="input100" type="text" name="sk" placeholder="Photoshop,Flash" value=<?php echo $sk ?>>
						<span class="focus-input100"></span>
						<font color="black">
						<?php if($sk_err!="")
						{
							echo $sk_err;
						}
						?>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Languages</span>
						<input class="input100" type="text" name="lang" placeholder="C,C++,Java" value=<?php echo $lang ?>>
						<span class="focus-input100"></span>
						<?php if($lang_err!="")
						{
							echo $lang_err;
						}
						?>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" name="skillsub">
								Submit
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
	<div class="limiter">
		<div class="container-login100">
			

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form method="post">
					<span class="login100-form-title p-b-59">
						Experience
					</span>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Company</span>
						<input class="input100" type="text" name="comp" placeholder="Infosys">
						<span class="focus-input100"></span>
						<?php if($comp_err!="")
						{
							echo $comp_err;
						}
						?>
					</div>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Position</span>
						<input class="input100" type="text" name="posn" placeholder="Marketing Head">
						<span class="focus-input100"></span>
						<?php if($posn_err!="")
						{
							echo $posn_err;
						}
						?>
					</div>
					<div class="wrap-input100 validate-input">
						<span class="label-input100">Starting Date</span>
						<input class="input100" type="date" name="sdate" placeholder="22-09-2000">
						<span class="focus-input100"></span>
						<?php if($sdate_err!="")
						{
							echo $sdate_err;
						}
						?>
					</div>
					<div class="wrap-input100 validate-input">
						<span class="label-input100">Ending Date</span>
						<input class="input100" type="date" name="edate" placeholder="22-09-2000">
						<span class="focus-input100"></span>
						<?php if($edate_err!="")
						{
							echo $edate_err;
						}
						?>
					</div>
					<div class="wrap-input100 validate-input">
						<span class="label-input100">Description</span>
						<input class="input100" type="text" name="desc" placeholder="Part of project Roshni">
						<span class="focus-input100"></span>
						<?php if($desc_err!="")
						{
							echo $desc_err;
						}
						?>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button name="expsub" class="login100-form-btn">
								Submit
							</button>
						</div>
					</div>
					<div class="wrap-input100 validate-input">
						<br>
						<span class="label-input100"><h2><center>Education Log</center></h2></span><br>
						<table border=1>
						<tr>
						  <th>Company</th>
						  <th>Position</th>
						  <th>Start Date</th>
						  <th>End Date</th>
						  <th>Description</th>
						  <th></th>
						</tr>
						<?php
						$temp=$_SESSION["email"];
						$sql="Select * from exp where email='$temp'";
						$result=$conn->query($sql);
						if($result->num_rows>0)
						{
							while($row=$result->fetch_assoc())
							{
								echo "<tr>";
						  		echo "<td>".$row["comp"]."</td>";
						  		echo "<td>".$row["posn"]."</td>";
						  		echo "<td>".$row["sdate"]."</td>";
						  		echo "<td>".$row["edate"]."</td>";
						  		echo "<td>".$row["desr"]."</td>";
						  		echo'<td><center><input type="submit" name='.$row["sdate"].' id="signup" style="background-color:cyan" value="Delete"/></center></td>';
						  		echo "</tr>";
							}
						}
						?>
					</table>
						<span class="focus-input100"></span>
					</div>

					</form>
				</div>
			<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>

		
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>




