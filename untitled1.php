<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="mylibrary";
$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);
session_start();

if(isset($_POST["submit"]))
{
    $select=$_POST["select"];
	$sql="SELECT * FROM `category`  LIMIT $select";
}
?>

<table><tbody>
				 
<?php
if(isset($_POST["submit"]))
{
		$result=$conn->query($sql);
		$fetch=$result->fetch_array();
		$cnt=1;   

      do {
          ?>
                  <tr style="border:1px;">
                     <td class="td1"><?php echo $cnt; ?></td>
                       <td class="td2"><?php echo $fetch[1]; ?></td>
                        <td class="td3"><?php echo $fetch[2]; ?></td>
                         <td class="td4"><?php echo $fetch[3];?></td>
                          <td class="td5">
         <a href="editcategory.php?catid=<?php echo $fetch[0];  ?>"><button class="btn"><i class="fa fa-edit "></i> Edit</button> 
<a href="managecategory.php?del=<?php echo $fetch[0];?>" onclick="return confirm('Are you sure you want to delete?');" >  <button class="btn1"><i class="fas fa-pencil-alt"></i> Delete</button>
                          </td>
                   </tr> <?php $cnt=$cnt+1;}  while ($fetch=mysqli_fetch_row($result))?>  
				   
<?php }?>



<form action="" method='post'>
          <select name="select">
		   <option value="2">2</option>
		    <option value="3">3</option>
		  </select>
		  <input type="submit" name="submit" value="submit" />
</form>
</body>
</html>
