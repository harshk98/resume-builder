<?php
 // Start Session
 session_start();
 
require_once "../config.php";
 // check if session variable is set
if(isset($_SESSION["per"])&& $_SESSION["per"]==1)
{
echo "<script>alert('You`re Personal Information has been added successfully');</script>";
$_SESSION["per"]=0;
}
$b64img="";
$firstname="";
$lastname="";
$email="";
$contact="";
$addr="";
$city="";
$zip="";
$dob="";
$gender="";
$firstname_err="";
$lastname_err="";
$contact_err="";
$addr_err="";
$city_err="";
$zip_err="";
$dob_err="";
$gender_err="";
$img_err="";
$temp=$_SESSION["email"];
if(isset($_SESSION["name"]) || isset($_POST['reset'])){
 	
 	$sql="Select * from per_info where email='$temp'";
 	$result = mysqli_query($conn, $sql);
 	$row = mysqli_fetch_array($result);
 	if(mysqli_num_rows($result) == 1)
 	{
 		if (is_array($row)) {
 			$b64img=base64_encode($row['image']);
			$firstname=$row['fname'];
			$lastname=$row['lname'];
			$email=$row['email'];
			$contact=$row['contact'];
			$addr=$row['addr'];
			$city=$row['city'];
			$zip=$row['zip'];
			$dob=$row['dob'];
			$gender=$row['gender'];
 		}
 	}
 	else
	 {
	 	$sql = "INSERT INTO per_info(email) 
	              VALUES('$temp')";
				    if ($conn->query($sql) === TRUE) {
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
	 }
 }
 
 if(isset($_FILES['image']) && isset($_POST['upload'])){
    $file_tmp_name =$_FILES['image']['tmp_name'];
    $str = file_get_contents($file_tmp_name);
    $b64img=base64_encode($str); // holds your image string in session without saving it.
    $str = addslashes(file_get_contents($file_tmp_name));
    $sql = "Update per_info set image='$str' where email='$temp'";
				    if ($conn->query($sql) === TRUE) {
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
}
 
 if(isset($_POST['submit'])|| isset($_POST['upload']))
	{
		if (empty($_POST["fname"])) {
		    $firstname_err = "First Name is required";
		  }
		else
		{
		$firstname=$_POST['fname'];
		if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
	      $firstname_err = "Only letters and white space allowed";
	    }
	    else
	    {
	    	$firstname_err="";
	    }
		}
		if (empty($_POST["lname"])) {
		    $lastname_err = "Last Name is required";
		  }
		else
		{
		$lastname=$_POST['lname'];
		if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
	      $lastname_err = "Only letters and white space allowed";
	    }
	    else
	    {
	    	$lastname_err="";
	    }
		}
		$email=$_POST['email'];
		if (empty($_POST["contact"])) {
		    $contact_err = "Contact is required";
		  }
		  else
		  {
		$contact=$_POST['contact'];
		if (!preg_match("/^(\+\d{1,3}[- ]?)?\d{10}$/",$contact)) {
	      $contact_err = "Enter contact information with code followed by 10 digits";
	    }
	    else
	    {
	    	$contact_err="";
	    }
		}
		if (empty($_POST["addr"])) {
		    $addr_err = "Address is required";
		  }
		  else
		  {
		$addr=$_POST['addr'];
		}
		if (empty($_POST["city"])) {
		    $city_err = "City is required";
		  }
		else{
			$city=$_POST['city'];
			if (!preg_match("/^[a-zA-Z, ]*$/",$city)) {
	      $city_err = "Enter correct city and state name";
	    }
	    else
	    {
	    	$city_err="";
	    }
		}
		if (empty($_POST["zip"])) {
		    $zip_err = "Zip is required";
		  }
		else{
			$zip=$_POST['zip'];
			if (!preg_match("/(^\d{5}$)|(^\d{9}$)(^\d{6}$)||(^\d{5}-\d{4}$)/",$zip)) {
	      $zip_err = "Enter correct zip code";
	    }
	    else
	    {
	    	$zip_err="";
	    }
		}
		if (empty($_POST["dob"])) {
		    $dob_err = "Date Of Birth is required";
		  }
		else{
			$dob=$_POST['dob'];
			if (!preg_match("/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/",$dob)) {
	      $dob_err = "Enter correct dob";
	    }
	    else
	    {
	    	$dob_err="";
	    }
		}
		if(empty($_POST['gender']) && empty($_POST['gender_value'])){
			$gender_err="Gender is required";
		}
		else
		{
		if(isset($_POST['gender']))
		{
		$gender=$_POST['gender'];
		}
		else
		{
			$gender=$_POST['gender_value'];
		}
		$gender_err="";
		}
		if($b64img=="")
		{
			$img_err="Image required";
		}
		else
		{
			$img_err="";
		}

	}
	if(isset($_POST['submit']) && $firstname_err=="" && $lastname_err=="" && $contact_err=="" && $city_err=="" && $addr_err=="" && $zip_err=="" && $gender_err=="" && $dob_err=="")
	{
			$sql = "Update per_info set fname='$firstname',lname='$lastname', contact='$contact', addr='$addr', city='$city', zip='$zip', dob='$dob', gender='$gender' where email='$temp'";
			    if ($conn->query($sql) === TRUE) {
			    	$_SESSION["per"]=1;
			    	header("Location:index.php");
			} else {
			    echo "Error: " . $sql . "<br>" . $conn->error;
			}
	}





?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Personal Info</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="images/icons/favicon.ico">

<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<style>
body{
background-image:url("color.jpg");
}
a{
	color:#66ff66;
	font-size: 20px;
}
img{
  height: 180px;
  width:180px;
}
input[type=file]{
padding:10px;
background:#2d2d2d;}
ul {
  list-style-type: none;
  margin: 0;
 
  height:60px;
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
body{
  background-color:white; 
}

li a:hover {
  background-color: #002200;
}
	</style>
	<body>
		<ul>
     
<li style="float:left"><a href=""><h2><font color="  #ffff08"><font face="Montserrat|Open+Sans"><u>Resume Builder</u></h1></a></li>

   <li style="float:left"><a href="per/index.php"><h2><font color=" #ffffff"><u>Personal Information</u></h2></a></li>
      <li style="float:left"><a href="../edu/index.php"><h2><font color="  #ffffff"><u>Education</u></h2></a></li>
      <li style="float:left"><a href="../skills/index.php"><h2><font color=" #ffffff"><u>Skills</u></h2></a></li>
            <li style="float:left"><a href="../temp.php"><h2><font color=" #ffffff"><u>Template</u></h2></a></li>
   <li style="float:left"><a class="active" href="../login/home.php"><h2><font color=" #ffffff"><u>Logout</u></h2></a></li></ul>
		<div class="container-contact100">
			
<div class="wrap-contact100">
<form class="contact100-form validate-form" method="post" action="" enctype="multipart/form-data">
<span class="contact100-form-title">
Personal Info
</span>

<div class="wrap-input100 validate-input" data-validate="Name is required">
<span class="label-input100">First Name</span>
<input class="input100" type="text" name="fname" placeholder="Enter your first name" value=<?php echo $firstname ?>>
<span class="focus-input100"></span>
<font color="black">
<?php if($firstname_err!="")
{
	echo $firstname_err;
}
?>
</div>
<div class="wrap-input100 validate-input" data-validate="Name is required">
<span class="label-input100">Last Name</span>
<input class="input100" type="text" name="lname" placeholder="Enter your last name" value=<?php echo $lastname ?>>
<span class="focus-input100"></span>
<font color="black">
<?php if($lastname_err!="")
{
	echo $lastname_err;
}
?>
</div>
<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
<span class="label-input100">Email</span>
<input class="input100" type="text" name="email" placeholder="Enter your email addess" value=<?php echo $email ?> disabled>
<span class="focus-input100"></span>
</div>
<div class="wrap-input100 validate-input" data-validate="Contact is required">
<span class="label-input100">Contact</span>
<input class="input100" type="text" name="contact" placeholder="Enter your contact" value=<?php echo $contact ?>>
<span class="focus-input100"></span>
<font color="black">
<?php if($contact_err!="")
{
	echo $contact_err;
}
?>
</div>
<div class="wrap-input100 validate-input">
	<span class="label-input100">Gender</span>
	<input class="label-input100" type="radio" name="gender" value="Male"><font color="black">Male
	<input class="label-input100" type="radio" name="gender" value="Female"><font color="black">Female
	<input class="input100" type="text" name="gender_value" value=<?php echo $gender ?>>
<span class="focus-input100"></span>
<?php if($gender_err!="")
{
	echo $gender_err;
}
?>
</div>
<div class="wrap-input100 validate-input" data-validate="Date of birth is required">
<span class="label-input100">DOB</span>
<input class="input100" type="date" name="dob" placeholder="22-09-2000" value=<?php echo $dob ?>>
<span class="focus-input100"></span>
<?php if($dob_err!="")
{
	echo $dob_err;
}
?>
</div>
<div class="wrap-input100 validate-input" data-validate="Address is required">
<span class="label-input100">Address</span>
<input class="input100" type="text" name="addr" placeholder="Flat-no,Street name" value=<?php echo $addr ?>>
<span class="focus-input100"></span>
<?php if($addr_err!="")
{
	echo $addr_err;
}
?>
</div>
<div class="wrap-input100 validate-input" data-validate="Address is required">
<span class="label-input100">City-State</span>
<input class="input100" type="text" name="city" placeholder="City,State" value=<?php echo $city ?>>
<span class="focus-input100"></span>
<?php if($city_err!="")
{
	echo $city_err;
}
?>
</div>
<div class="wrap-input100 validate-input" data-validate="Address is required">
<span class="label-input100">ZIP Code</span>
<input class="input100" type="text" name="zip" placeholder="ZIP" value=<?php echo $zip ?>>
<span class="focus-input100"></span>
<?php if($zip_err!="")
{
	echo $zip_err;
}
?>
</div>
<div class="img">
	<span class="label-input100">Photo</span>
    <?php if($b64img!=""){ ?>
    <center><img  name="face" src="data:image/jpg;base64,<?php echo $b64img;?>"/></center>
    <?php
	}
	else
	{	?>
	<center><img name="face" src="../login/images/profile.webp"></center>
	<?php 
	}
	?>
	<br><font color=" #ffffff"><input type="file" name="image"><br><br>
	<center><input type="submit" name="upload" style="background-color: cyan"></center>
	<font color="black">
	<?php if($img_err!="")
{
	echo $img_err;
}
?>
</div>
<div class="container-contact100-form-btn">
<div class="wrap-contact100-form-btn">
<div class="contact100-form-bgbtn"></div>
<button class="contact100-form-btn" name="submit">
<span>
Submit
<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
</span>
</button>
</div>
</div>
<div class="container-contact100-form-btn">
<div class="wrap-contact100-form-btn">
<div class="contact100-form-bgbtn"></div>
<button class="contact100-form-btn" name="reset">
<span>
Reset
<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
</span>
</button>
</div>
</div>
</form>
</div>
</div>
</body>
</html>