<div class="inner_banner">
    <img src="images/profile.jpg" alt="">
</div>
<div class="section min_height">
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-sm-6 col-lg-4">
                 <div class="card my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h3 class="card-title">เปลี่ยนรหัสผ่าน</h3>
                        <form id="changepassword">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="hidden" name="usrid" value="<?php echo $_SESSION['login_user_id'] ?>">
                                    <input type="password" name="newpass" class="form-control mb-3 p-2" placeholder="กรุณากรอกรหัสผ่านใหม่">
                                </div>
                                <div class="col-sm-12">
                                    <input type="password" name="npassword" class="form-control mb-3 p-2" placeholder="ยืนยันรหัสผ่าน">
                                </div>
                                <div class="col-sm-12">
                                    <button class="btn btn_common w-100">ยืนยัน</button>
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