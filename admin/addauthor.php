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
else{

      if(isset($_POST["submit"]))
    {
        $author=$_POST["author"];
      if(strlen($author)!=0)
      {
      date_default_timezone_set('Asia/dhaka');
         $date= date('d-m-Y h:i:s a', time());
       
       $sql="INSERT INTO `authors` (`authorname`,`creationdate`) VALUES ('$author','$date')";
       
        if ($conn->query($sql) == TRUE)
    {
       $_SESSION['msg']="Author LISTED SUCCESFULLY";
          header('location:manageauthor.php');
    }
    else
    {
    $a="<h2>AUTHOR CAN'T ADDED!!!</h2>";
    }
      } else{$a="<h2>BLANKED ITEM CAN'T BE ADD</h2>";}
    }

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
       <h4>ADD AUTHOR</h4>
     </div>
     <div id="form-bottom" class="form-bottom templete clear">
	 
	 <?php
	 
	 if(isset($_POST["submit"]))
	 {
	 echo $a;
	 }
	 ?>
	   <div class="form-top clear">Author Info</div>
            <form action="addauthor.php" method="post">
   <div class="form-main">
	<p>Author Name</p>
	<input type="text" name="author" placeholder="">
	<input type="submit" name="submit" value="ADD">
  </div>
  </form>
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