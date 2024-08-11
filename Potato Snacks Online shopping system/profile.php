<?php
$qry = $conn->query("SELECT * from user_info WHERE user_id = {$_SESSION['login_user_id']} ");
if($qry->num_rows > 0){
	foreach($qry->fetch_array() as $k => $val){
		$meta[$k] = $val;
	}
}
?>
<div class="inner_banner">
    <img src="images/profile.jpg" alt="">
</div>
<div class="section min_height">
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-sm-8 col-lg-6">
                 <div class="card my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h3 class="card-title"> แก้ไขโปรไฟล์ </h3>
                        <form id="updateprofile">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="hidden" name="usrid" value="<?php echo isset($meta['user_id']) ? $meta['user_id'] : '' ?>">
                                    <input type="text" name="first_name" value="<?php echo isset($meta['first_name']) ? $meta['first_name'] : '' ?>" class="form-control mb-3 p-2" placeholder="ชื่อ">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="last_name" value="<?php echo isset($meta['last_name']) ? $meta['last_name'] : '' ?>" class="form-control mb-3 p-2" placeholder="นามสกุล">
                                </div>
                                <div class="col-sm-12">
                                    <input type="email" name="email" value="<?php echo isset($meta['email']) ? $meta['email'] : '' ?>" class="form-control mb-3 p-2" placeholder="อีเมล">
                                </div>
                                <div class="col-sm-12">
                                    <input type="text" name="mobile" value="<?php echo isset($meta['mobile']) ? $meta['mobile'] : '' ?>" class="form-control mb-3 p-2" placeholder="เบอร์โทรศัพท์">
                                </div>
                                <div class="col-sm-12">
                                    <textarea name="address" class="form-control mb-4" placeholder="ที่อยู่" rows="5"><?php echo isset($meta['address']) ? $meta['address'] : '' ?></textarea>
                                </div>
                                <div class="col-sm-12">
                                    <button class="btn btn_common w-100">ยืนยันการแก้ไข</button>
                                </div>
                                <div class="col-sm-12 pt-4">
                                    <a href="index.php?page=change-password" class="color-theme">เปลี่ยนรหัสผ่าน</a>
                                </div>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
<?php include('include/offers.php');?>