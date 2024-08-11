<?php    

$page = isset($_GET['page']) ?$_GET['page'] : "home";

$activelink = basename($_SERVER['PHP_SELF'], ".php");
$activePage = $activelink.".php?page=".$page."";

    include('config/db_connect.php');
    session_start();
	$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach ($query as $key => $value) {
		if(!is_numeric($key))
			$_SESSION['setting_'.$key] = $value;
	}
    ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="content-language" content="en-us">
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="theme-color" content="#FE8F23">

<title><?php echo $_SESSION['setting_name'] ?></title>

<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="css/aos.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<link type="text/css" rel="stylesheet" href="css/style.css?v=1">
<link type="text/css" rel="stylesheet" href="css/responsive.css?v=1">
<link type="image/ico" rel="icon" href="<?php echo $uploadimg.$_SESSION['setting_cover_img'] ?>">
</head>

<body>
<div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
<div class="header">
     <div class="navmenu">
          <div class="container">
               <div class="row">
                    <div class="col-sm-12 col-lg-12">
                         <button class="menu_collapse"><i class="fa fa-bars"></i></button>
                         <div class="logo">
                             <a href="index.php?page=home"><img src="<?php echo $uploadimg.$_SESSION['setting_cover_img'] ?>" alt=""></a>
                             <!-- <a href="index.php?page=home"><h1> <?php echo $_SESSION['setting_name'] ?> </h1></a> -->
                         </div>
                         <a href="index.php?page=cart" class="cartbtn"><i class="fa fa-shopping-cart"></i>
                              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger item_count">
                                   0
                              </span>
                         </a>
                         <div class="menubar">
                              <ul>
                                   <li><a href="index.php?page=home" class="<?= ($activePage == 'index.php?page=home') ? 'active':''; ?>">หน้าหลัก</a></li>
                                   <li><a href="index.php?page=foods-menu" class="<?= ($activePage == 'index.php?page=foods-menu') ? 'active':''; ?>">เมนูอาหาร</a></li>
                                   <li><a href="index.php?page=about" class="<?= ($activePage == 'index.php?page=about') ? 'active':''; ?>">เกี่ยวกับเรา</a></li>
                                   <li><a href="index.php?page=contact" class="<?= ($activePage == 'index.php?page=contact') ? 'active':''; ?>">ติดต่อ</a></li>
                                    <?php if(isset($_SESSION['login_user_id'])): ?>
                                     <li><a href="index.php?page=profile" class="<?= ($activePage == 'index.php?page=profile') ? 'active':''; ?>"><?php echo "Welcome ". $_SESSION['login_first_name']; ?></a></li>
                                     <li><a href="index.php?page=order-history" class="<?= ($activePage == 'index.php?page=order-history') ? 'active':''; ?>">ประวัติการสั่งซื้อ</a></li>
                                     <?php endif; ?>
                              </ul>
                              <div class="menu_btn">
                                   <?php if(isset($_SESSION['login_user_id'])): ?>
                                    <a href="admin/ajax.php?action=logout2" class="menubtn"> <i class="fa fa-power-off"></i> ออกจากระบบ</a>
                                    <?php else: ?>
                                     <a href="index.php?page=login" class="menubtn">เข้าสู่ระบบ</a>
                                     <a href="index.php?page=register" class="menubtn">สมุครสมาชิก</a>
                                    <?php endif; ?>
                                 
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
     <div class="menubackdrop"></div>
</div>