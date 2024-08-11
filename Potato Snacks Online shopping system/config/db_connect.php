<?php 

$conn= new mysqli('localhost','root','12345678','potato_db')or die("ไม่สามารถเชื่อมต่อกับ mysql".mysqli_error($con));

$uploadimg= 'assets/img/';
date_default_timezone_set('Asia/Bangkok');
// $activePage = basename("index.php?page=".$_SERVER['PHP_SELF'], ".");
?>