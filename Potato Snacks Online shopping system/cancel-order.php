<div class="inner_banner">
    <img src="images/pexels-rania-alhamed-2454533 (1).jpg" alt="">
</div>
<div class="section min_height">
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-sm-8 col-lg-6">
                 <div class="card my-5">
                    <div class="card-body p-4 p-sm-5">
                        <h3 class="card-title">ยกเลิกออร์เดอร์</h3>
                        <form id="odrcancl-frm">
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="">เหตุผลในการยกเลิกรายการ</label>
                                    <input type="hidden" name="odrid" value="<?php echo $_GET['od']; ?>">
                                    <textarea name="cnclreson" class="form-control mb-4 mt-2" required placeholder="เหตุผลที่คุณต้องการยกเลิกคำสั่งซื้อนี้" rows="5"></textarea>
                               </div>
                                <div class="col-sm-12">
                                    <button class="btn btn_common w-100">ยืนยัน</button>
                                </div>
                                <div class="col-sm-12 pt-4">
                                    <a href="index.php?page=order-history" class="color-theme">กลับสุ่ประวัติการสั่งซื้อ</a>
                                </div>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>
