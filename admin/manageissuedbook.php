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
	   if(isset($_GET["del"]))
	   {   $id=$_GET["del"];
				$sql="DELETE FROM `issuedbookdetails` WHERE `id`='$id'";
				if ($conn->query($sql) == TRUE)
					{ $_SESSION['delmsg']="User deleted scuccessfully ";
					 /*header('location:registerstudent.php')*/;
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
        <li  id="un1"><a href="registerstudent.php">REG STUDENTS</a></li>
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
                 <a href="managecategory.php">MANAGE CATEGORIES</a>
            </div></li>
        <li id="un1"><a  id="active" href="dashboard.php">DASHBOARD</a></li>
  	  </ul>
    </div>
  </div>
   
   <div class="wrapper templete clear">
     <div class="wrapper-top clear">
       <h4>MANAGE ISSUED BOOKS</h4>
     </div>
	 
	 <?php if($_SESSION['msg']!=""){?>
	         <div class="success1 templete clear"><h3>Success:<?php echo $_SESSION['msg']; print $_SESSION['msg']="";
			   ?></h3></div><?php }?>
         <?php if($_SESSION['delmsg']!=""){?>
           <div class="success1 templete clear"><h3>Success:<?php echo $_SESSION['delmsg']; echo $_SESSION['delmsg']="";
         ?></h3></div><?php }?>
	     
     <div id="form-bottom2" class="form-bottom templete clear">
	        <div id="form-top1" class="form-top clear">Books List</div>
            <form action="manageissuedbook.php" method="post">
                 <div id="form-main1" class="form-main ">
                   <select class="select1">
                     <option value="10">10</option>
                      <option value="25">25</option>
                       <option value="50">50</option>
                        <option value="100">100</option>
                   </select> <h3>Record per page</h3>
                   <h3 id="h31">Search:</h3>
                   <input id="search1" type="text" name="search">
				   </div></form>       
                         <div class="table-class templete clear ">
                          <table class="table1">
                  <thead>
                  <tr bordercolor="#000000">
                      <th style="max-width: 10px;"
					   class="th1">#</th>
					   
                     <th style="max-width: 50px;padding: 1px;"
                      class="th2">Student Name</th>

                     <th style="max-width: 45px;padding: 1px;"
                      class="th3">Book Name</th>

                     <th style="max-width: 30px;padding: 1px;"
                      class="th4">ISBN</th>

                     <th
                     style="max-width: 60px;padding: 2px;"
                      class="th5">Issued date</th>

                     <th style="width: 55px;padding: 1px;"
                      class="th6">Return Date</th>
                      
                     <th id="th7" class="th7">Action</th>
                 </tr>
                  </thead>
                  
  <tbody>
				 
<?php
	 $query="SELECT `id`,`studentid`,`bookid`,`issuesdate`,`returndate`,`returnstatus` FROM `issuedbookdetails`";
		$result=$conn->query($query);
		$fetch=$result->fetch_array();
		$cnt=1;   

        do {
          ?>
                   <tr>
                     <td class="td1"><?php echo $cnt; ?></td>
                       <td class="td2"><?php  $stdid=$fetch[1];
					                      $sql="SELECT `stuid`,`sfname`,`slname` FROM `studata` WHERE `stuid`='$stdid'";
										$reslt=$conn->query($sql);
										$row=$reslt->fetch_array();
										print $row[1]." ".$row[2];
					                  ?></td>

                        <td class="td3"><?php  $bkid=$fetch[2];
					                      $sql1="SELECT `bookname`,`isbnnumber` FROM `books` WHERE `id`='$bkid'";
										$rslt=$conn->query($sql1);
										$row=$rslt->fetch_array();
										print $row[0];
					                  ?> </td>
                         <td style="max-width: 70px;" class="td4"><?php echo $row[1]; ?>   </td>
                         <td style="max-width: 26px; opacity: 0.7;" class="td5"><?php echo $fetch[3];?></td>
                         <td style="max-width: 26px; opacity: 0.7;" class="td6">
						 <?php if($fetch[5]==0)
						 {
						    print "Not Return Yet";
						 }else {
						     print $fetch[4];
						 }
						 
						 ?>
						 </td>
                          <td
        style="max-width: 40px;"
 class="td7">
		  <a href="editissuedbook.php?issueid=<?php echo $fetch[0];  ?>"><button class="btn"><i class="fa fa-edit "></i> Edit</button> 
		  <a href="manageissuedbook.php?del=<?php echo $fetch[0];?>" onclick="return confirm('Are you sure you want to delete?');" >  <button class="btn1"><i class="fas fa-pencil-alt"></i> Delete</button>
                   </tr> <?php $cnt=$cnt+1;}while ($fetch=mysqli_fetch_row($result))?>  
                 </tbody></table></div>
		                         

  
    </div>
  </div>
       



      <div class="footersection templete clear">
          <p>&copy;2019 Library Management System | Prepared by: TEAM WHITE</p> 
      </div>

</body>
</html>