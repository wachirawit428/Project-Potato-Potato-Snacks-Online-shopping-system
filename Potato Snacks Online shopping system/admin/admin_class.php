<?php
session_start();
Class Action {
	private $db;

	public function __construct() {
		ob_start();
   	include '../config/db_connect.php';
    
    $this->db = $conn;
	}
	function __destruct() {
	    $this->db->close();
	    ob_end_flush();
	}

	function login(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM users where username = '".$username."' and password = '".$password."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
				return 1;
		}else{
			return 3;
		}
	}
	function login2(){
		extract($_POST);
		$qry = $this->db->query("SELECT * FROM user_info where email = '".$email."' and password = '".md5($password)."' ");
		if($qry->num_rows > 0){
			foreach ($qry->fetch_array() as $key => $value) {
				if($key != 'passwors' && !is_numeric($key))
					$_SESSION['login_'.$key] = $value;
			}
			$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
			$this->db->query("UPDATE cart set user_id = '".$_SESSION['login_user_id']."' where client_ip ='$ip' ");
				return 1;
		}else{
			return 3;
		}
	}
	function logout(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:login.php");
	}
	function logout2(){
		session_destroy();
		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}
		header("location:../index.php");
	}

	function save_user(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", username = '$username' ";
		$data .= ", password = '$password' ";
		$data .= ", type = '$type' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO users set ".$data);
		}else{
			$save = $this->db->query("UPDATE users set ".$data." where id = ".$id);
		}
		if($save){
			return 1;
		}
	}
	function delete_usrid(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM users where id = ".$usrid);
		if($delete)
			return 1;
	}
	function signup(){
		extract($_POST);
		$data = " first_name = '$first_name' ";
		$data .= ", last_name = '$last_name' ";
		$data .= ", mobile = '$mobile' ";
		$data .= ", address = '$address' ";
		$data .= ", email = '$email' ";
		$data .= ", password = '".md5($password)."' ";
		$chk = $this->db->query("SELECT * FROM user_info where email = '$email' ")->num_rows;
		if($chk > 0){
			return 2;
			exit;
		}
			$save = $this->db->query("INSERT INTO user_info set ".$data);
		if($save){
			$login = $this->login2();
			return 1;
		}
	}

	function save_settings(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", email = '$email' ";
		$data .= ", contact = '$contact' ";
		$data .= ", address = '$address' ";
		$data .= ", about_content = '".htmlentities(str_replace("'","&#x2019;",$about))."' ";
		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
					$data .= ", cover_img = '$fname' ";

		}
		
		// echo "INSERT INTO system_settings set ".$data;
		$chk = $this->db->query("SELECT * FROM system_settings");
		if($chk->num_rows > 0){
			$save = $this->db->query("UPDATE system_settings set ".$data." where id =".$chk->fetch_array()['id']);
		}else{
			$save = $this->db->query("INSERT INTO system_settings set ".$data);
		}
		if($save){
		$query = $this->db->query("SELECT * FROM system_settings limit 1")->fetch_array();
		foreach ($query as $key => $value) {
			if(!is_numeric($key))
				$_SESSION['setting_'.$key] = $value;
		}

			return 1;
				}
	}

	
	function save_category(){
		extract($_POST);
		$data = " name = '$name' ";
		if($_FILES['catimg']['tmp_name'] != ''){
						$catname = strtotime(date('y-m-d H:i')).'_'.$_FILES['catimg']['name'];
						$move = move_uploaded_file($_FILES['catimg']['tmp_name'],'../assets/img/'. $catname);
					$data .= ", catimg = '$catname' ";
		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO category_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE category_list set ".$data." where id=".$id);
		}
		if($save)
			return 1;
	}
	function delete_category(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM category_list where id = ".$id);
		if($delete)
			return 1;
	}
	function save_menu(){
		extract($_POST);
		$data = " name = '$name' ";
		$data .= ", delprice = '$delprice' ";
		$data .= ", price = '$price' ";
		$data .= ", category_id = '$category_id' ";
		// $data .= ", description = '".htmlentities(str_replace("'","&#x2019;",$description))."' ";
		$data .= ", description = '".str_replace("'","&#x2019;",$description)."' ";
		// $data .= ", description = '$description' ";
		if(isset($status) && $status  == 'on')
		$data .= ", status = 1 ";
		else
		$data .= ", status = 0 ";

		if($_FILES['img']['tmp_name'] != ''){
						$fname = strtotime(date('y-m-d H:i')).'_'.$_FILES['img']['name'];
						$move = move_uploaded_file($_FILES['img']['tmp_name'],'../assets/img/'. $fname);
					$data .= ", img_path = '$fname' ";

		}
		if(empty($id)){
			$save = $this->db->query("INSERT INTO product_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE product_list set ".$data." where id=".$id);
		}
		if($save){
			return 1;
		}
		
	}

	function delete_menu(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM product_list where id = ".$id);
		if($delete)
			return 1;
	}
	function delete_cart(){
		extract($_GET);
		$delete = $this->db->query("DELETE FROM cart where id = ".$id);
		if($delete)
			header('location:'.$_SERVER['HTTP_REFERER']);
	}
	function add_to_cart(){
		extract($_POST);
		$data = " product_id = $pid ";	
		$qty = isset($qty) ? $qty : 1 ;
		$data .= ", qty = $qty ";	
		if(!isset($_SESSION['login_user_id'])){
			$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
			$data .= ", client_ip = '".$ip."' ";
		}else{	
			$data .= ", user_id = '".$_SESSION['login_user_id']."' ";	
		}
		$save = $this->db->query("INSERT INTO cart set ".$data);
		if($save)
			return 1;
	}
	function get_cart_count(){
		extract($_POST);
		if(!isset($_SESSION['login_user_id'])){
			$ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
			$where =" where client_ip = '".$ip."'  ";
		}
		else{
			$where =" where user_id = '".$_SESSION['login_user_id']."'  ";
		}
		$get = $this->db->query("SELECT sum(qty) as cart FROM cart ".$where);
		if($get->num_rows > 0){
			return $get->fetch_array()['cart'];
		}else{
			return '0';
		}
	}

	function update_cart_qty(){
		extract($_POST);
		$data = " qty = $qty ";
		$save = $this->db->query("UPDATE cart set ".$data." where id = ".$id);
		if($save)
		return 1;	
	}

	function save_order(){
		extract($_POST);
		$odrId = rand(10000,90000);
		//https://www.php.net/manual/en/datetime.format.php
		date_default_timezone_set('Asia/Bangkok');
		$odrDate = date('d/m/Y H:i');
		$data = " name = '".$first_name." ".$last_name."'";
		$data .= ", address = '$address'";
		$data .= ", mobile = '$mobile'";
		$data .= ", email = '$email'";
		$data .= ", odrId = '$odrId'";
		$data .= ", usrid = '$usrid'";
		$data .= ", odrdate = '$odrDate'";
		$data .= ", status = 0";
		$save = $this->db->query("INSERT INTO orders set ".$data);
		if($save){
			// $id= rand(10000,90000);
			 $id = $odrId;
			$qry = $this->db->query("SELECT * FROM cart where user_id =".$_SESSION['login_user_id']);
			while($row= $qry->fetch_assoc()){

					$data = " order_id = '$id' ";
					$data .= ", product_id = '".$row['product_id']."' ";
					$data .= ", qty = '".$row['qty']."' ";
					
					$save2=$this->db->query("INSERT INTO order_list set ".$data);
					if($save2){
						$this->db->query("DELETE FROM cart where id= ".$row['id']);
					}					
			}
			return 1;
		}
	}
function confirm_order(){
	extract($_POST);
		$data = "tprice = '$tprice'";
		$data .= ", status = '$odestats'";
		$save = $this->db->query("UPDATE orders set ".$data." where odrId = ".$odrId);
		if($save){	
			if($odestats == '1'){
				return 1;
			}
			if($odestats == '2'){		
				return 2;
			}
			if($odestats == '0'){
				return 0;
			}
			// echo json_encode(['msg' => $data]);
		}
}
function delete_order(){
	extract($_POST);
	$deleteo = $this->db->query("DELETE FROM orders where odrId = ".$odrid);
	if($deleteo){
		$deleteo2 = $this->db->query("DELETE FROM order_list where order_id = ".$odrid);
		if($deleteo2){
			return 1;
		}
	}	
}
function cancel_order(){
	extract($_POST);
		$data = " status = 3";
		$data .= ", cnclreson = '$cnclreson'";
		$save = $this->db->query("UPDATE orders set ".$data." where odrId = ".$odrid);
		if($save){		
			return 2;
		}
}
function update_profile(){
	extract($_POST);
	$data = " first_name = '$first_name' ";
	$data .= ", last_name = '$last_name' ";
	$data .= ", email = '$email' ";
	$data .= ", mobile = '$mobile' ";
	$data .= ", address = '$address' ";
	$fname = $first_name.''.$last_name;

	$save = $this->db->query("UPDATE user_info set ".$data." where user_id = ".$usrid);
	

	if($save){
		return 1;
	}
}


function update_password(){
	extract($_POST);
	$data = " password = '".md5($npassword)."' ";
	if($newpass == $npassword){
		$save = $this->db->query("UPDATE user_info set ".$data." where user_id = ".$usrid);		
		if($save)
			return 1;
	}
	else{
		return 2;
	}
}
	
function save_day(){
	extract($_POST);
	$data = "sday = '$sday' ";
	$data .= ", stime = '$stime' ";
	$data .= ", etime = '$etime' ";
	if(empty($id)){
		$save = $this->db->query("INSERT INTO abailday set ".$data);
	}else{
		$save = $this->db->query("UPDATE abailday set ".$data." where id=".$id);
	}
	if($save)
		return 1;
}
function delete_day(){
	extract($_POST);
	$delete = $this->db->query("DELETE FROM abailday where id = ".$id);
	if($delete)
		return 1;
}
function save_noti(){
	extract($_POST);
	$data = " osdate = '$osdate' ";
	$data .= ", oedate = '$oedate' ";
	$data .= ", omssg = '$omssg' ";
	$data .= ", status = '$status' ";
	if(!empty($id)){
		$save = $this->db->query("UPDATE odernotification set ".$data." where id = ".$id);		
		if($save){
			return 1;
		}
	}
}
function delete_ruser(){
	extract($_POST);
	$delete = $this->db->query("DELETE FROM user_info where user_id = ".$usrid);
	if($delete)
		return 1;
}

}