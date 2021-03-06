<?php
include('dbconnect.php');
session_start();
error_reporting(0);
?>
<?php
if(isset($_POST['Submit'])){
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } 
	else{
$email= $_POST['mail'];
$pass=$_POST['password'];
$query="SELECT * FROM `studata` WHERE  `email` ='$email' && `password`='$pass'";
$result=$conn->query($query);
$fetch=$result->fetch_array();
if($email==$fetch[5] && $pass==$fetch[6] && $fetch[11]==1){
	$_SESSION['email']=$email;
	$_SESSION['stdid']=$fetch[1];
	header('location:dashboard.php');
}
else{
	$b="<h2>Login Failed!!!!!!</h2>";
}

}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN PAGE</title>
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
  	  	<li><a href="signup.php">USER SIGNUP</a></li>
  	  	<li><a  id="active" href="index.php">USER LOGIN</a></li>
  	  	<li><a href="admin/index.php">ADMIN LOGIN</a></li>
  	  </ul>
    </div>
</div>
<form action="index.php" method="post">
<div class="maincontent templete clear">
     <div class="form clear">
	 <?php
	 if(isset($_POST["Submit"]))
	 {
	 
	 echo $b;
	 }
	 ?>
	 
             <div class="form-top clear">USER LOGIN FORM</div>
   <div class="form-main">
	<p>Enter Email id</p>
	<input type="Email" name="mail" placeholder="Please enter your mail address...">
	<p>Enter Password</p>
	<input type="password" name="password" placeholder="Please enter your Password..."><br>
	<a style="padding-bottom: 5px;display: block;" href="#">Forgot password</a><br>
	<label 
	style="
	padding: 10px;
    font-family: sans-serif;
    padding-top: 25px;
    padding-left: 17px;
    font-size: 18px;">Verification code :</label>
    <input type="text" class="form-control1"  name="vercode" maxlength="5" autocomplete="off" required  style="width: 60px;height: 10px;" />
    <img style="
    border-radius: 5px;
    margin-left: 275px;
    margin-top: -28px;
    display: block;
    height: 26px;" src="captcha.php"><br>

	<input type="submit" name="Submit" value="LOGIN">
	 |<a href="#" id="Not">Not Registered</a>
  </div>
    </div>
</div>
</form>



<div class="footersection templete clear">
<p>&copy;2019 Library Management System |
Prepared by: TEAM WHITE</p> 
</div>


</body>
</html>
