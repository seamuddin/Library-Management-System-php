<?php $servername = "localhost";
$username = "root";
$password = "";
$dbname="mylibrary";
$conn = new mysqli($servername, $username, $password);
$conn->select_db($dbname);
 ?>