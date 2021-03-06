<?php
include('dbconnect.php');
session_start();
error_reporting(0);
?>

<?php
if(isset($_POST['submit'])){ 
$email= $_POST['mail'];
$pass=$_POST['password'];
$query="SELECT * FROM `admin` WHERE  `adminemail` ='$email' && `password`='$pass'";
$result=$conn->query($query);
$fetch=$result->fetch_array();
if($email==$fetch[2] && $pass==$fetch[4]){
  $_SESSION['mail']=$email;
  header('location:dashboard.php');

}
else{
  $b="Login failed!!!!!!";
}

}

?>







<!DOCTYPE html>
<html>
<head>
	<title>ADMIN LOGIN</title>
	<link rel="stylesheet" type="text/css" href="./asset/css/index.css">
	<link rel="stylesheet" type="text/css" href="../asset/css/font-awesome.css">
</head>
<body>
<div class="header templete clear">
    <div class="header-top clear">
     <img src="./asset/img/headerimg.jpg" alt="logo">
    </div>
    <div class="menu templete clear">
  	  <ul>
  	  	<li><a href="../signup.php">USER SIGNUP</a></li>
        <li><a href="../index.php">USER LOGIN</a></li>
        <li><a  id="active" href="index.php">ADMIN LOGIN</a></li>
  	  </ul>
    </div>
</div>

<div class="maincontent templete clear">
     <div class="form clear">
      <h3 style="color:red;"><?php
   if(isset($_POST["submit"]))
   {
    echo $b;
   }
  
   ?>
   </h3>
             <div class="form-top clear">ADMIN LOGIN FORM</div>
            <form action="index.php" method="post">
   <div class="form-main">
	<p>Enter Email id</p>
	<input type="Email" name="mail" placeholder="Please enter your mail address...">
	<p>Enter Password</p>
	<input type="password" name="password" placeholder="Please enter your Password..."><br>
	<a href="#">Forgot password</a><br>
	<input type="submit" name="submit" value="LOGIN">
	 |<a href="#" id="Not">Not Registered</a>
  </div>
  </form>
    </div>
</div>



<div class="footersection templete clear">
<p>&copy;2019 Library Management System |
Prepared by: TEAM WHITE</p> 
</div>


</body>
</html>