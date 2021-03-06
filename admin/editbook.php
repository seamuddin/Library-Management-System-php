<?php
include('dbconnect.php');
session_start();
error_reporting(0);
?>

<?php
if(strlen($_SESSION['mail'])==0)
  {  
header('location:index.php');
}
else{     
         $bookid=intval($_GET["bookid"]);
          if(isset($_POST["submit"]))
		  {
		    $bname=$_POST["text"];
			$bcategory=$_POST["category"];
			$bauthor=$_POST["author"];
			$bisbn=$_POST["isbn"];
			$bprice=$_POST["price"];
			if(strlen($bname)==0 && strlen($bcategory)==0 && strlen($bauthor)==0 && strlen($bisbn) ==0 && strlen($bprice)==0)
			{
			$a="<h2>Blanked Item Can't Add</h2>";
			
			}
			else{ 
			
			    date_default_timezone_set('Asia/dhaka');
                $date= date('d-m-Y h:i:s a', time()); 
				$sql=
				"UPDATE `books` SET `bookname`='$bname',`catid`='$bcategory',`authorid`='$bauthor',`isbnnumber`='$bisbn',`bookprice`='$bprice',`updatedate`='$date' WHERE `id`='$bookid'";
				 if ($conn->query($sql) == TRUE)
							{
							   $_SESSION['msg']="Book Updated successfuly..";
							   header('location:managebooks.php');
								
							} else{ $a="<h2>Book Can't Updated</h2>";}
							
				}
			 
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
       <h4>ADD BOOK</h4>
     </div>
     <div id="form-bottom" class="form-bottom templete clear">
	 
	 <?php
	 
	 if(isset($_POST["submit"]))
	 {
	 echo $a;
	 }
	 ?>
	 
	   <div class="form-top clear">Book Info</div>
            <form  action="editbook.php" role="form" method="post">
   <div class="form-main">
	<p>Book Name</p>
	<input id="input" type="text" name="text" value="<?php
	    $query="SELECT `bookname`,`catid`,`authorid` FROM `books` WHERE `id`='$bookid'";
		$result=$conn->query($query);
		$fetch=$result->fetch_array();
		echo $fetch[0];
	 ?>" placeholder="">
  <p> Category</p>
  <select class="form-control" name="category" required="required" value="ss">
<option value="<?php echo $fetch[1];?>"><?php
               $catid=$fetch[1];
              $query="SELECT `id`,`categoryname` FROM `category` WHERE `id`='$catid'";
		$result=$conn->query($query);
		$fetch1=$result->fetch_array();
		  echo $fetch1[1];
		  ?> </option>
<?php 
$query="SELECT `id`,`categoryname` FROM `category`";
		$result=$conn->query($query);
		$fetch2=$result->fetch_array();  

       do {
          ?>
<option value="<?php echo $fetch1[0] ;?>"><?php echo $fetch2[1]; ?></option>
<?php } while ($fetch2=mysqli_fetch_row($result))?>
</select> <br>
<p>Author</p>
<select class="form-control" name="author" required="required">
<option value="<?php echo $fetch[2];?>"><?php
               $catid=$fetch[2];
              $query="SELECT `id`,`authorname` FROM `authors` WHERE `id`='$catid'";
		$rsult=$conn->query($query);
		$ftch=$rsult->fetch_array();
		  echo $ftch[1];
		  ?> </option>
<?php 
$query="SELECT `id`,`authorname` FROM `authors`";
		$result=$conn->query($query);
		$fetch=$result->fetch_array();
       do {
          ?>
<option value="<?php echo $fetch[0] ?>"><?php echo $fetch[1]; ?></option>
<?php } while ($fetch=mysqli_fetch_row($result))?> </select>
<p>ISBN Number</p>
  <input id="input" type="text" name="isbn" value="<?php
	    $query="SELECT `isbnnumber` FROM `books` WHERE `id`='$bookid'";
		$result=$conn->query($query);
		$fetch=$result->fetch_array();
		echo $fetch[0];
	 ?>" placeholder="">
  <p id="help-p">An ISBN is an International Standard Book Number.ISBN Must be unique</p>
  <p id="edt-p">Book Price</p>
  <input id="input" type="text" name="price" value="<?php
	    $query="SELECT `bookprice` FROM `books` WHERE `id`='$bookid'";
		$result=$conn->query($query);
		$fetch=$result->fetch_array();
		echo $fetch[0]; ?>
  " placeholder="">
  <input type="submit" name="submit" value="UPDATE">
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