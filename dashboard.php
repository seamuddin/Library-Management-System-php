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
else{}
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
       <h4>USER DASHBOARD</h4>
    <form action="dashboard.php" method="post">
    <button class="a" type="submit" name="submit">LOG OUT</button>
    </form>
     </div>
     <div class="wrapper-bottom clear">
       <div style="color: #31708F; border: 1px solid #31708F" class="wrap">
        <i class="fas fa-bars"></i>
         <h2> <?php
		 
		   $query="SELECT COUNT(`bookid`) FROM `issuedbookdetails` WHERE `studentid`='$stdid'";
		   $result=$conn->query($query);
		   $fetch=$result->fetch_array();
		   print $fetch[0];
		 ?></h2>
         <h3>Book Issued</h3>
       </div>
       <div style="color: #8A6D3B; border: 1px solid #8A6D3B" class="wrap">
         <i class="fas fa-recycle"></i>
         <h2><?php
		 
		   $query="SELECT COUNT(`bookid`) FROM `issuedbookdetails` WHERE `studentid`='STU0005' AND `returnstatus`=0";
		   $result=$conn->query($query);
		   $fetch=$result->fetch_array();
		   print $fetch[0];
		 ?></h2>
         <h3>Books Not Returned Yet </h3>
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













<!--php important topics-->

<!-- logout -->

<?php
if(isset($_POST['submit'])){
    header('location:index.php');
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

	
    
</body>
</html>




