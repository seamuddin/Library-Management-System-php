<?php
include('dbconnect.php');
session_start();
error_reporting(0);
?>

<?php
$email=$_SESSION['email'];
$stdid=$_SESSION['stdid'];
if(strlen($_SESSION['email'])==0)
  {  
header('location:index.php');
}
else{
$query="SELECT * FROM `studata` WHERE  `email` ='$email'";
$result=$conn->query($query);
$fetch=$result->fetch_array();

if(isset($_POST["Submit"])){
$stuidt=0;
$name=0;
$num=0;
$name=$_POST["text"];
$num=$_POST["number"];
date_default_timezone_set('Asia/dhaka');
 $date= date('m/d/Y h:i:s a', time());

 $sql="UPDATE `studata` SET `sfname`='$name', `update_time`='$date',`phone`='$num' where `email` ='$email'";
 if($conn->query($sql)==true){
 $a="<h3>DATA UPDATED</h3>";
 }
 }}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home page</title>
    <link rel="stylesheet" type="text/css" href="./asset/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="./asset/css/dashboard.css">
  <link rel="stylesheet" type="text/css" href="./asset/fontawesome-free-5.11.2-web/css/all.css">
</head>
<body>
  
    <div id="header1" class="header templete clear">

    <div class="header-top clear">
      <img src="./admin/asset/img/headerimg.jpg" alt="logo">
    </div>
    <div class="menu clear">
      <ul>
        <li id="un1"><a href="issuedbook.php">ISSUED BOOKS</a></li>
        <li id="un1"><a href="#">ACCOUNT<img src="./admin/asset/img/arrow.png"></a>
            <div class="dropdowncontent">
                 <a href="myprofile.php">MY PROFILE</a>
                 <a href="cngpassword.php">CHANGE PASSWORD</a>
            </div></li>
        <li id="un1"><a  id="active" href="dashboard.php">DASHBOARD</a></li>
      </ul>
    </div>
  </div>
   
   <div class="wrapper templete clear">
     <div class="wrapper-top clear">
       <h4>MY PROFILE</h4>
     </div>
     <div class="wrapper-bottom clear">
       <div class="maincontent templete clear">
     <div class="form clear">
	 <?php if(isset($_POST["Submit"])){print $a;} ?>
             <div class="form-top clear">USER INFORMATION</div>
   <div class="form-main">
   <form action="myprofile.php" method="post">
  <p>Student ID :<?php print $stdid; ?></p>
   <p>Reg Date : <?php  $str=$fetch[8];
					      for($i=0; $i<=9; $i++){   echo $str[$i];  }
   
         /*print $str[0].$str[1].$str[2].$str[3].$str[4].$str[5].$str[6];*/ ?></p>
    <p>Profile Status :   <span style="color: green;">Active</span></p>
    <p>Enter Full Name</p>
  <input type="text" name="text" value="<?php print $fetch[2]; ?>" required>
  <p>Mobile Number :</p>
  <input type="text" name="number" value="<?php print $fetch[4]; ?>" required>
  <p>Enter email :</p>
  <input id="email_pro" type="email" name="email" value="<?php print $fetch[5]; ?>" required readonly>
  <input style="width: 100px;" type="submit" name="Submit" value="Update Now">
  </form>
     </div>
   </div>
 </div>

     <div class="wrapper-slider">
     </div>
       
   </div>
 



      <div class="footersection templete clear">
          <p>&copy;2019 Library Management System | Prepared by: TEAM WHITE</p> 
      </div>

</body>
</html>
