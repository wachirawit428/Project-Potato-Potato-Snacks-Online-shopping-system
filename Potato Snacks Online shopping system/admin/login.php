<?php include('../config/db_connect.php'); ?>
<?php 
session_start();
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

$query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="theme-color" content="#FE8F23">
  <title><?php echo $_SESSION['setting_name']; ?> | เข้าสู่ระบบแอดมิน</title>
 
<link type="image/ico" rel="icon" href="<?php echo '../assets/img/'.$_SESSION['setting_cover_img'] ?>">	

<?php include('header.php'); ?>

</head>
<style>
	body{
		width: 100%;
	    height: 100vh;
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: 100vh;
		background:white;
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:#fe8f23;
		display: flex;
		align-items: center;
	}
	#login-right .card{
		margin: auto
	}
	.logo {
	    margin: auto;
	    font-size: 8rem;
	    background: white;
	    border-radius: 50% 50%;
	    height: 230px;
	    width: 230px;
	    display: flex;
	    align-items: center;
	}
	.logo img{
		height: 80%;
		width: 80%;
		margin: auto
	}
	@media screen and (max-width: 991px)  {
		.logo {
			height: 176px;
			width: 176px;
		}
		#login-left {
			left: 0;
			width: 100% !important;
			height: calc(40%) !important;
		}
		#login-right {
			right: 0 !important;
			margin: auto;
			left: 0 !important;
			bottom: 0 !important;
			width: 90% !important;
			height: calc(60%) !important;
		}
	}
</style>

<body>


  <main id="main">
  		<div id="login-left">
  			<div class="logo">
			  <img src="<?php echo '../assets/img/'.$_SESSION['setting_cover_img']; ?>" alt="" >
  			</div>
  		</div>
  		<div id="login-right">
  			<div class="card col-md-8">
  				<div class="card-body">
					  <h4>เข้าสู่ระบบแอดมิน</h4>
  					<form id="login-form" >
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="password" name="password" class="form-control">
  						</div>
  						<center><button class="btn btn-sm btn-block w-100 btn-wave btn-primary">เข้าสู่ระบบ</button></center>
  					</form>
  				</div>
  			</div>
  		</div>
   

  </main>


  <?php
 include('footer.php'); 
 ?>
</body>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else if(resp == 2){
					location.href ='voting.php';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	
</html>