<?php
include('dbconnect.php');
session_start();
error_reporting(0);
?>


<?php
$email=$_SESSION['mail'];
if(strlen($_SESSION['mail'])==0)
  {  
 echo "<script>alert('Incorrect verification code');</script>" ;
header('location:index.php');
}
else{}
?>

<?php
if(isset($_POST['submit'])){
    header('location:index.php');
    session_destroy();
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<link rel="stylesheet" type="text/css" href="./asset/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="./asset/css/dashboard.css">
  <link rel="stylesheet" type="text/css" href="../asset/fontawesome-free-5.11.2-web/css/all.css">
</head>
<body>
  
	<div id="header1" class="header templete clear">

    <div class="header-top clear">
      <img src="./asset/img/headerimg.jpg" alt="logo">
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
       <h4>ADMIN DASHBOARD</h4>
       <form action="" method="post">
   <button class="a" type="submit" name="submit">LOG OUT</button></form>
     </div>
     <div class="wrapper-bottom clear">
       <div style="color: #3C763D; border: 1px solid #3C763D" class="wrap">
        <i class="fas fa-book"></i>
         <h2>
		 <?php
		 
		   $query="SELECT COUNT(`bookname`) FROM `books`";
		   $result=$conn->query($query);
		   $fetch=$result->fetch_array();
		   print $fetch[0];
		 ?>
		 
		 </h2>
         <h3>Books Listed</h3>
       </div>
       <div style="color: #31708F; border: 1px solid #31708F" class="wrap">
        <i class="fas fa-bars"></i>
         <h2>
		  <?php
		 
		   $query="SELECT COUNT(`id`) FROM `issuedbookdetails`";
		   $result=$conn->query($query);
		   $fetch=$result->fetch_array();
		   print $fetch[0];
		 ?>
		 </h2>
         <h3>Times Book Issued</h3>
       </div>
       <div style="color: #8A6D3B; border: 1px solid #8A6D3B" class="wrap">
         <i class="fas fa-recycle"></i>
         <h2>
		  <?php
		 
		   $query="SELECT COUNT(`id`) FROM `issuedbookdetails` WHERE `returnstatus`='1'";
		   $result=$conn->query($query);
		   $fetch=$result->fetch_array();
		   print $fetch[0];
		 ?>
		 </h2>
         <h3>Times Books Returned</h3>
       </div>
       <div style="color: #A94442; border: 1px solid #A94442" class="wrap">
         <i id="position" class="fas fa-users"></i>
         <h2>
		      <?php
		 
		   $query="SELECT COUNT(`stuid`) FROM `studata` WHERE `status`='1'";
		   $result=$conn->query($query);
		   $fetch=$result->fetch_array();
		   print $fetch[0];
		 ?>
		 </h2>
         <h3>Registered Users</h3>
       </div>
        <div style="color: #3C763D; border: 1px solid #3C763D" class="wrap">
         <i class="fas fa-user"></i>
         <h2>
		  <?php
		 
		   $query="SELECT COUNT(`authorname`) FROM `authors`";
		   $result=$conn->query($query);
		   $fetch=$result->fetch_array();
		   print $fetch[0];
		 ?>
		 
		 </h2>
         <h3>Authors Listed</h3>
       </div>
        <div style="color: #31708F; border: 1px solid #31708F" class="wrap">
        <i id="position1" class="far fa-file-archive"></i>
         <h2>
		  <?php
		 
		   $query="SELECT COUNT(`categoryname`) FROM `category`";
		   $result=$conn->query($query);
		   $fetch=$result->fetch_array();
		   print $fetch[0];
		 ?>
		 
		 </h2>
         <h3>Listed Categories</h3>
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
  <?php 
 $_SESSION['delmsg']=0;
 $_SESSION['msg']=0; 
?>