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
       $catid=intval($_GET['catid']);
   $query="SELECT * FROM `category` WHERE `id`='$catid'";
    $result=$conn->query($query);
    $fetch=$result->fetch_array();

      if(isset($_POST["update"]))
    {
        $catagory=$_POST["cat"];
		$oldcat=$fetch[1]
		if($catagory!=$oldcat){
			  if(strlen($catagory)!=0)
			  {
				
			  date_default_timezone_set('Asia/dhaka');
				 $date= date('m-d-Y h:i:s a', time());
			   
			   $sql="UPDATE `category` SET `categoryname`='$catagory',`updationtime`='$date' WHERE `id`='$catid'";
			   
				if ($conn->query($sql) == TRUE)
			{
			  $_SESSION['msg']="Category Updated successfuly..";
									header('location:manageauthor.php');
			}
			else
			{
			$a="<h2>CATEGORY CAN'T ADDED!!!</h2>";
			}
			  } else{$a="<h2>BLANKED ITEM CAN'T BE UPDATE!!!</h2>";}
			  }else{$a="<h2>PLEASE TRY SOMETHING NEW!!!</h2>";}
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
        <li  id="un1">
          <a href="registerstudent.php">REG STUDENTS</a>
        </li>
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
             <a href="">MANAGE AUTHOR</a>
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
       <h4>ADD CATEGORY</h4>
     </div>
     <div id="form-bottom" class="form-bottom templete clear">
   
   <?php
   
   if(isset($_POST["submit"]))
   {
   echo $a;
   }
   ?>
     <div class="form-top clear">Category Info</div>
            <form action="editcategory.php" method="post">
   <div class="form-main">
  <p>Category Name</p>
  <input
            style="font-size: 14px;
                    font-weight: 100;
                     opacity: 0.7;"
   type="text" name="cat" value="<?php echo $fetch[1]; ?>" placeholder="">
  <p>Status</p>
  <input type="submit" name="update" value="UPDATE">
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