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
       $id=intval($_GET['issueid']);
			  if(isset($_POST["update"]))
		     { 
				$fine=$_POST["fine"];
			      if(strlen($fine)!=0)
					  {
						date_default_timezone_set('Asia/dhaka');
							 $date= date('d-m-Y h:i:s a', time());
							 $status=1;
							 
						   
						   $sql="UPDATE `issuedbookdetails` SET `returndate`='$date',`returnstatus`='$status',`fine`='$fine' WHERE `id`='$id'";
					   
							if ($conn->query($sql) == TRUE)
								   { $_SESSION['msg']="Author Updated successfuly..";
									header('location:manageissuedbook.php');}
										else
										  {$a="<h2>AUTHOR CAN'T ADDED!!!</h2>";}
					 } else{$a="<h2>BLANKED ITEM CAN'T BE UPDATE</h2>";}
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
       <h4>ADD CATEGORY</h4>
     </div>
     <div id="form-bottom" class="form-bottom templete clear">
   
   <?php
   
   if(isset($_POST["update"]))
   {
   echo $a;
   }
   ?>
     <div class="form-top clear">Category Info</div>
            <form action="editissuedbook.php" method="post">
   <div id="formmainp" class="form-main">
    <?php
      $query="SELECT `id`,`studentid`,`bookid`,`issuesdate`,`returndate`,`returnstatus`,`fine` FROM `issuedbookdetails` WHERE `id`='$id'";
          $result=$conn->query($query);
          $fetch=$result->fetch_array();
     ?>
  <p>Student Name: <span>
    <?php                     $stdid=$fetch[1];
                                $sql="SELECT `stuid`,`sfname`,`slname` FROM `studata` WHERE `stuid`='$stdid'";
                    $reslt=$conn->query($sql);
                    $row=$reslt->fetch_array();
                    print $row[1]." ".$row[2];
                            ?></td>

  </span></p>


  <p>Book Name: <span>
    <?php  $bkid=$fetch[2];
                                $sql="SELECT `bookname`,`isbnnumber` FROM `books` WHERE `id`='$bkid'";
                    $reslt=$conn->query($sql);
                    $rw=$reslt->fetch_array();
                    print $rw[0];
                            ?>
  </span></p>
  <p>ISBN: <span>
    <?php  print $rw[1]; ?>
  </span></p>
  <p>Book Issued Date: <span>
    <?php echo $fetch[3];?>
  </span></p>

  <p>Book Return Date: <span>
    <?php if($fetch[5]==0)
             {
                print "Not Return Yet";
             }else {
                 print $fetch[4];
             } ?>
  </span></p>
  <p>Fine:  <span><?php if(!empty($fetch[6])){echo $fetch[6]; ?>TK<?php }else{  ?></span></p>  
    <?php if($fetch[5]==0)
             {?> 
              
              <input type="text" name="fine">
                <input type="submit" name="update" value="RETURN BOOK" style="width: 120px;">
                
             <?php
             } }?>
  

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