
<?php
include('dbconnect.php');
session_start();
error_reporting(0);
?>
<?php 

if(isset($_POST["submit"]))
{   
     $fname=$_POST["firstname"];
	$lname=$_POST["lastname"];
	$num=$_POST["number"];
	$mail=$_POST["mail"];
	$pass=$_POST["password"];
	$cpass=$_POST["cpassword"];
	echo strlen($fname);

    if(strlen($fname)!=0 && strlen($lname)!=0 && strlen($num)!=0 && strlen($mail)!=0 && strlen($pass)!=0 &&  strlen($cpass)!=0){
/*Stuid code*/	
$count_my_page = ("studentid.txt");
$hits = file($count_my_page);
$hits[0] ++;
$fp = fopen($count_my_page , "w");
fputs($fp , "$hits[0]");
fclose($fp); 
$stuid=$hits[0];
date_default_timezone_set('Asia/dhaka');
 $date= date('m-d-Y h:i:s a', time());
   

	$sql="INSERT INTO `studata` (`stuid`,`sfname`,`slname`,`phone`,`email`,`password`,`cpassword`,`create_time`) VALUES ('$stuid','$fname','$lname','$num','$mail','$pass','$cpass','$date')";
		
		if ($conn->query($sql) == TRUE)
		{
       $a="<H3>DATA ADDED SUCCESFULLY.. </H3>";
		}
		else
		{
		$a="<H2>DATA CAN'T ADDED!!!</H2>";
		}
		
	}
		else{
	           $a="<H2>FILL IN THE BLANK ITEM!!!</H2>";
		     
		}


}

?>


<!DOCTYPE html>
<html>
<head>
	<title>library management</title>
	<link rel="stylesheet" type="text/css" href="./asset/css/index.css">
	<link rel="stylesheet" type="text/css" href="./asset/css/font-awesome.css">
</head>
<body>
<div class="header templete clear">
    <div class="header-top clear">
     <img src="./asset/img/headerimg.jpg" alt="logo">
    </div>
    <div class="menu templete clear">
  	  <ul>
  	  	<li><a  id="active" href="signup.php">USER SIGNUP</a></li>
        <li><a href="index.php">USER LOGIN</a></li>
        <li><a href="admin/index.php">ADMIN LOGIN</a></li>
  	  </ul>
    </div>
</div>
 
<div class="maincontent templete clear">
     <div class="form clear">
<?php
	 
	 if(isset($_POST["submit"]))
	 {
	 echo $a;
	 }
	 ?>
             <div class="form-top clear">USER SIGNUP FORM</div>
   <div class="form-main">
   <form action="signup.php" method="post">
    <p>Enter Firstname</p>
  <input type="text" name="firstname" placeholder="Please enter your Firstname...">
  <p>Enter Lastname</p>
  <input type="text" name="lastname" placeholder="Please enter your Lastname...">
  <p>Enter Phone No</p>
  <input type="number" name="number" placeholder="Please enter your Firstname...">

	<p>Enter Email id</p>
	<input type="Email" name="mail" placeholder="Please enter your mail address...">
	<p>Enter Password</p>
	<input type="password" name="password" placeholder="Please enter your Password..."><br>
  <p>Enter Confirm Password</p>
  <input type="password" name="cpassword" placeholder="Please enter your Password..."><br>
	<input type="submit" onFocus="this.value" name="submit" value="SIGNUP"/>
	 |<a href="index.php" id="Not">Already Registered</a>
	 </form>
  </div>
  </div>
</div>


<div class="footersection templete clear">
<p>&copy;2019 Library Management System |
Prepared by: TEAM WHITE</p> 
</div>


</body>
</html>