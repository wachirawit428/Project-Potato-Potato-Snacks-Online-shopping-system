<div class="inner_banner">
    <img src="images/pexels-rajesh-tp-1624487.jpg" alt="">
</div>
<div class="section">
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-sm-6">
                 <div class="card">
                    <div class="card-body">
                         <div class="section_title text-left">
                              <h1>
                                   <i class="fa fa-phone"></i>
                                  เกี่ยวกับเรา
                              </h1>
                         </div>
                          <p><strong>ที่อยู่:</strong> :  <?php echo $_SESSION['setting_address'] ?></p>
                          <p><strong>เบอร์โทรศัพท์:</strong> : <a href="tel:<?php echo $_SESSION['setting_contact'] ?>"> <?php echo $_SESSION['setting_contact'] ?></a></p>
                          <p><strong>อีเมล:</strong> : <a href="mailto: <?php echo $_SESSION['setting_email'] ?>"> <?php echo $_SESSION['setting_email'] ?></a></p>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>

<?php include('include/offers.php');?>