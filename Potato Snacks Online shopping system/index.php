
<?php include('include/header.php');?>
<?php 
$page = isset($_GET['page']) ?$_GET['page'] : "home";
include $page.'.php';
?>
<?php include('include/footer.php');?>