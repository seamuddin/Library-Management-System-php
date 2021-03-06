<?php
include('dbconnect.php');
session_start();
error_reporting(0);
?>

<?php
$email=$_SESSION['email'];
$stid=$_SESSION['stdid'];
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
	<link rel="stylesheet" type="text/css" href="asset/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="admin/asset/css/dashboard.css">
  <link rel="stylesheet" type="text/css" href="asset/fontawesome-free-5.11.2-web/css/all.css">
</head>
<body>
  
	<div id="header1" class="header templete clear">

    <div class="header-top clear">
      <img src="./asset/img/headerimg.jpg" alt="logo">
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
       <h4>ISSUED BOOKS</h4>
     </div>
	     
     <div id="form-bottom2" class="form-bottom templete clear">
	        <div id="form-top1" class="form-top clear">Books List</div>
            <form action="issuedbook.php" method="post">
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
					   
                     <th style="width: 60px;padding: 1px;"
                      class="th2">Book Name</th>

                     <th style="max-width: 45px;padding: 1px;"
                      class="th3">ISBN</th>

                     <th style="max-width: 30px;padding: 1px;"
                      class="th4">Issued date</th>

                     <th
                     style="max-width: 60px;padding: 2px;"
                      class="th5">Return Date</th>

                     <th style="width: 55px;padding: 1px;"
                      class="th6">Fine</th>
                     
                 </tr>
                  </thead>
                  
  <tbody>
				 
<?php
	 $query="SELECT `id`,`studentid`,`bookid`,`issuesdate`,`returndate`,`returnstatus`,`fine` FROM `issuedbookdetails` WHERE `studentid`='$stid'";
		$result=$conn->query($query);
		$fetch=$result->fetch_array();
		$cnt=1;   
       if(!empty($fetch[2])){
        do {
          ?>
                   <tr>
                     <td class="td1"><?php echo $cnt; ?></td>
                       <td class="td2"><?php  $bkid=$fetch[2];
					                      $sql="SELECT `bookname`,`isbnnumber` FROM `books` WHERE `id`='$bkid'";
										$reslt=$conn->query($sql);
										$rw=$reslt->fetch_array();
										print $rw[0];
					                  ?></td>

                        <td class="td3"> <?php echo $rw[1]; ?></td>
                         <td style="max-width: 70px;" class="td4"> <?php echo $fetch[3];?>  </td>
                         <td style="max-width: 26px;" class="td5"><?php if($fetch[5]==0)
						 {
						    print "<h2>Not Return Yet</h2>";
						 }else {?><h1><?php 
						     print $fetch[4];?></h1><?php
						 }
						 
						 ?></td>
                         <td style="max-width: 26px; opacity:0.7;" class="td6">
						 <?php if(empty($fetch[6])){ ?>
						 <i class="fa fa-usd" aria-hidden="true"> 0</i><?php }else{?>
						  <i class="fa fa-usd" aria-hidden="true"> <?php echo $fetch[6];?></i> <?php }?>
						 
						 </td>
                   <?php $cnt=$cnt+1;}while ($fetch=mysqli_fetch_row($result))?>  <?php }else{?>
				   
				   <p style="font-size: 16px;font-weight: 100;color: red;opacity: 0.8;">No Data Yet</p> </tr>
				   <?php }?>
				   
                 </tbody></table></div>
		                         

  
    </div>
  </div>
       



      <div class="footersection templete clear">
          <p>&copy;2019 Library Management System | Prepared by: TEAM WHITE</p> 
      </div>

</body>
</html>