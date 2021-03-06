!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php


$timezone = date_default_timezone_get();
echo "The current server timezone is: " . $timezone; echo"<br>"; 

date_default_timezone_set('Asia/dhaka');
echo date('m/d/Y h:i:s a', time()); echo"<br>"; 

$now = new DateTime();
echo $now->format('Y-m-d H:i:s');    // MySQL datetime format
echo $now->getTimestamp();   echo"<br>"; 

 $date = new DateTime('now', new DateTimeZone('Asia/dhaka'));
 echo $date->format('d-m-Y H:i:s');echo"<br>"; 
 
 if (strlen('$date') != 5){
      print strlen('$date');
	  
 };
 $tt="45eyj";
 if (empty($tt))
 {
   echo "file is empty";
 }
?>
</body>
</html>
