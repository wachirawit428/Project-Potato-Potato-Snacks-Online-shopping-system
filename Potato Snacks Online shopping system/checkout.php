<?php
include ('config/db_connect.php');
$chk = $conn->query("SELECT * FROM cart where user_id = {$_SESSION['login_user_id']} ")->num_rows;
if($chk <= 0){
    echo "<script>alert('ตะกร้าของคุณยังไม่มีสินค้า'); location.replace('./')</script>";
}
?>
<div class="section min_height_100 mt-5">
    <div class="container">
        <div class="mt-5">
            <div class="section_title text-center">
                <h1>
                     <i class="fa fa-shopping-cart"></i>
                    ชำระเงิน
                </h1>
           </div>
            <div class="small-container cart-page">
                <div class="row justify-content-center">

                <div class="col-sm-6">
                    <div class="order_address mt-4">
                        <div class="card">
                            <div class="card-body p-4 p-sm-5">
                                <h3 class="card-title">ข้อมูลการจัดส่ง</h3>
                                <form action="" id="checkout-frm">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <input type="hidden" name="usrid" value="<?php echo $_SESSION['login_user_id'] ?>">
                                            <input type="text" name="first_name" value="<?php echo $_SESSION['login_first_name'] ?>" class="form-control mb-3 p-2" placeholder="ชื่อ">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="last_name" value="<?php echo $_SESSION['login_last_name'] ?>" class="form-control mb-3 p-2" placeholder="นามสกุล">
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="email" name="email" value="<?php echo $_SESSION['login_email'] ?>" class="form-control mb-3 p-2" placeholder="อีเมลผู้สั่ง">
                                        </div>
                                        <div class="col-sm-12">
                                            <input type="text" name="mobile" value="<?php echo $_SESSION['login_mobile'] ?>" class="form-control mb-3 p-2" placeholder="เบอร์โทรศัพท์ผู้สั่ง">
                                        </div>
                                        <div class="col-sm-12">
                                            <textarea name="address" class="form-control mb-4" placeholder="ที่อยู่สำหรับการจัดส่ง" rows="5"><?php echo $_SESSION['login_address'] ?></textarea>
                                        </div>
                                        <input type="hidden" name="odrprice" value="">
                                        <div class="col-sm-12">
                                            <button class="btn btn_common w-100 mb-3">ยืนยันการสั่งซื้อ</button>
                                            <small>* กรุณาตรวจสอบที่อยู่การส่ง</small>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('include/offers.php');?>