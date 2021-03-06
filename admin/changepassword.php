<?php
include('dbconnect.php');
session_start();
error_reporting(0);
?>


<?php
$email=$_SESSION['mail'];
if(strlen($_SESSION['mail'])==0)
  {  
header('location:index.php');
}
else{
			$query="SELECT *FROM `admin` WHERE  `adminemail` ='$email'";
			$result=$conn->query($query);
			$fetch=$result->fetch_array();

if(isset($_POST["Submit"])){
$p1=$_POST["pass1"];
$p2=$_POST["pass2"];
$p3=$_POST["pass3"];
if($fetch[4]==$p1){
if($p2==$p3)
  {
     if($p1!=$p2)
     {

date_default_timezone_set('Asia/dhaka');
 $date= date('m/d/Y h:i:s a', time());

 $sql="UPDATE `admin` SET `password`='$p2', `cpassword`='$p3', 
 `updationdate`='$date' where `adminemail` ='$email'";
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
  <link rel="stylesheet" type="text/css" href="../asset/css/dashboard.css">
  <link rel="stylesheet" type="text/css" href="./asset/fontawesome-free-5.11.2-web/css/all.css">
</head>
<body>
  
    <div id="header1" class="header templete clear">

    <div class="header-top clear">
      <img src="../asset/img/headerimg.jpg" alt="logo">
    </div>
    <div class="menu clear">
     <ul>
        <li id="un1"><a href="changepassword.php">CHANGE PASSWORD</a></li>
        <li  id="un1"><a href="registerstudent.php">REG STUDENTS</a> </li>
        <li id="un1"><a href="#">ISSUE BOOKS<img src="./asset/img/arrow.png"> </a>
           <div class="dropdowncontent">
             <a href="issuenewbook.php">ISSUE NEW BOOK</a>
             <a href="manageissuedbook.php">MANAGE ISSUED BOOK</a>
           </div>
        </li>
        <li id="un1"><a href="#">BOOKS<img src="./asset/img/arrow.png"></a>
           <div class="dropdowncontent">
             <a href="addbook.php">ADD BOOK</a>
             <a href="managebooks.php">MANAGE BOOKS</a>
            </div>
        </li>
        <li id="un1"><a href="#">AUTHORS<img src="./asset/img/arrow.png"> </a>
            <div class="dropdowncontent">
             <a href="addauthor.php">ADD AUTHOR</a>
             <a href="manageauthor.php">MANAGE AUTHOR</a>
            </div>
        </li>
        <li id="un1"><a href="#">CATEGORIES<img src="./asset/img/arrow.png"></a>
            <div class="dropdowncontent">
                 <a href="addcategories.php">ADD CATEGORIES</a>
                 <a href="Managecategory.php">MANAGE CATEGORIES</a>
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
   <form action="changepassword.php" method="post">
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
