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
$p1=$_POST["pass1"];
$p2=$_POST["pass2"];
$p3=$_POST["pass3"];
if($fetch[6]==$p1){
if($p2==$p3)
  {
     if($p1!=$p2)
     {

date_default_timezone_set('Asia/dhaka');
 $date= date('m/d/Y h:i:s a', time());

 $sql="UPDATE `studata` SET `password`='$p2', `cpassword`='$p3', 
 `cngpass_time`='$date' where `email` ='$email'";
 if($conn->query($sql)==true){
			 $a="<h3>PASSWORD IS UPDATED<br>
			 YOUR NEW PASSWORD IS   ".$p2."</h3>";}

      }
			else
			    { $a="<h2>PLEASE TRY SOMETHING NEW!!</h2>";}

   }           else{  $a="<h2>PASSWORD & CONFIRM PASSWORD ISN'T MATCHED</h2>";}
			}
			else{ $a="<h2>CURRENT PASSWORD IS WRONG!!<br> PLEASE TRY AGAIN..</h2>";}
                         }
     }
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
       <h4>USER CHANGE PASSWORD</h4>
     </div>
     <div class="wrapper-bottom clear">
       <div class="maincontent templete clear">
     <div class="form clear">
	 <?php if(isset($_POST["Submit"])){print $a;} ?>
             <div class="form-top clear">CHANGE PASSWORD</div>
   <div class="form-main">
   <form action="cngpassword.php" method="post">
    <p>Current Password</p>
  <input type="password" name="pass1" required>
   <p>New Password</p>
  <input id="pass" type="password" name="pass2" required>
   <p>Confirm New Password</p>
  <input type="password" name="pass3" required>
 
  <input style="width: 100px;" type="submit" name="Submit" onClick="click()" value="CHANGE">
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
