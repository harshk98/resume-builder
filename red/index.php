<?php
session_start();

require_once "../config.php";
$temp=$_SESSION["email"];
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
$sk="";
$lang="";
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
  $sk_arr=explode(",", $sk);
  $lang_arr=explode(",", $lang);
  $comp=array();
   $posn=array();
   $sdate=array();
   $edate=array();
   $desc=array();
   $sql="Select * from exp where email='$temp'";
            $result=$conn->query($sql);
            if($result->num_rows>0)
            {
              while($row=$result->fetch_assoc())
              {
                array_push($comp,$row["comp"]);
                array_push($posn,$row["posn"]);
                array_push($sdate,$row["sdate"]);
                array_push($edate,$row["edate"]);
                array_push($desc,$row["desr"]);
              }
            }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Resume</title>
<link type="text/css" rel="stylesheet" href="css/red.css" />
<link type="text/css" rel="stylesheet" href="css/print.css" media="print"/>
<!--[if IE 7]>
<link href="css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<link href="css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/cufon.yui.js"></script>
<script type="text/javascript" src="js/scrollTo.js"></script>
<script type="text/javascript" src="js/myriad.js"></script>
<script type="text/javascript" src="js/jquery.colorbox.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript">
		Cufon.replace('h1,h2');
</script>
</head>
<style>
    .nav {
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
  color: blue  ;
  text-align: center;
  padding: 14px 16px;

  
}

li a:hover {
  background-color: #002200;
}
</style>
<body style="background-image: url(../login/images/color.png);">
<!-- Begin Wrapper -->
  <ul class="nav">
     
<li style="float:left"><a href=""><h2><font color="  #ffff08"><font face="Montserrat|Open+Sans"><u>Resume Builder</u></h1></a></li></font></font>
   <li style="float:left"><a href="../per/index.php"><h2><font color=" #ffffff"><u>Personal Information</u></h2></a></li></font>
      <li style="float:left"><a href="../edu/index.php"><h2><font color="  #ffffff"><u>Education</u></h2></a></li></font>
      <li style="float:left"><a href="../skills/index.php"><h2><font color=" #ffffff"><u>Skills</u></h2></a></li></font>
            <li style="float:left"><a href="../temp.php"><h2><font color=" #ffffff"><u>Template</u></h2></a></li></font>
   <li style="float:left"><a class="active" href="../login/home.php"><h2><font color=" #ffffff"><u>Logout</u></h2></a></li></font></ul>
<!-- Begin Wrapper -->
<div id="wrapper">
  <div class="wrapper-top"></div>
  <div class="wrapper-mid">
    <!-- Begin Paper -->
    <div id="paper">
      <div class="paper-top"></div>
      <div id="paper-mid">
        <div class="entry">
          <!-- Begin Image -->
          <img class="portrait" src="data:image/jpg;base64,<?php echo $b64img;?>" alt="John Smith" />
          <!-- End Image -->
          <!-- Begin Personal Information -->
          <div class="self">
            <h1 class="name"><?php echo $firstname." ".$lastname ?> <br /></h1>
            <ul>
              <li class="ad"><?php echo $addr." ".$city." ".$zip ?></li>
              <li class="mail"><?php echo $email ?></li>
              <li class="tel"><?php echo $contact ?></li>
              <li class="web"><?php echo "<b>Date of birth<b>: ".$dob." <br><b>Gender<b> :".$gender ?></li>
            </ul>
          </div>
          <!-- End Personal Information -->
          <!-- Begin Social -->
          <div class="social">
            <ul>
              <li><a class='north' href="#" title="Download .pdf"><img src="images/icn-save.jpg" alt="Download the pdf version" /></a></li>
              <li><a class='north' href="javascript:window.print()" title="Print"><img src="images/icn-print.jpg" alt="" /></a></li>
              <li><a class='north' id="contact" href="contact/index.html" title="Contact Me"><img src="images/icn-contact.jpg" alt="" /></a></li>
              <li><a class='north' href="#" title="Follow me on Twitter"><img src="images/icn-twitter.jpg" alt="" /></a></li>
              <li><a class='north' href="#" title="My Facebook Profile"><img src="images/icn-facebook.jpg" alt="" /></a></li>
            </ul>
          </div>
          <!-- End Social -->
        </div>
        <!-- Begin 1st Row -->
        <div class="entry">
          <h2>EDUCATION</h2>
          <?php for($x=0;$x<count($level);$x++)
          { ?>
          <div class="content">
            <h3>Year : <?php echo $yea[$x];?></h3>
            <p><?php echo $nam[$x];?><br />
              <em><?php echo $level[$x]." in ".$stre[$x]." with ".$grad[$x]." %";?></em></p>
          </div>

        <?php }?>
        </div>
        <!-- End 2nd Row -->
        <!-- Begin 3rd Row -->
        <div class="entry">
          <h2>EXPERIENCE</h2>
          <?php for($x=0;$x<count($comp);$x++)
          { ?>
          <div class="content">
            <h3><?php echo $sdate[$x]." - ".$edate[$x];?></h3>
            <p><?php echo $comp[$x];?> <br />
              <em><?php echo $posn[$x];?></em></p>
              
            <ul class="info">
              <?php
              $desc_arr=explode(",", $desc[$x]);
              for($y=0;$y<count($desc_arr);$y++)
              {
              ?>
              <li><?php echo $desc_arr[$y];?></li>
            <?php } ?>
            </ul>
          </div>
        <?php }?>
        </div>
        <!-- End 3rd Row -->
        <!-- Begin 4th Row -->
        <div class="entry">
          <h2>SKILLS</h2>
          <div class="content">
            <h3>Software Knowledge</h3>
            <ul class="skills">
              <?php
              for($y=0;$y<count($sk_arr);$y++)
              {
              ?>
              <li><?php echo $sk_arr[$y];?></li>
            <?php } ?>
            </ul>
          </div>
          <div class="content">
            <h3>Languages</h3>
            <ul class="skills">
              <?php
              for($y=0;$y<count($lang_arr);$y++)
              {
              ?>
              <li><?php echo $lang_arr[$y];?></li>
            <?php } ?>
            </ul>
          </div>
        </div>
        <!-- End 4th Row -->
         <!-- Begin 5th Row -->
        <!-- Begin 5th Row -->
      </div>
      <div class="clear"></div>
      <div class="paper-bottom"></div>
    </div>
    <!-- End Paper -->
  </div>
  <div class="wrapper-bottom"></div>
</div>
<div id="message"  id="top-link"><a href="#top">Go to Top</a></div>
<!-- End Wrapper -->
</body>
</html>

