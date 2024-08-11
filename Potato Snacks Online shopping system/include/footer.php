<div class="contact_bar">
    <div class="container">
         <div class="contact_bx">
              <div>
                   <h3>ติดต่อสั่งซื้อ</h3>
                   <h1> <?php echo $_SESSION['setting_contact'] ?></h1>
              </div>
              <div>
                   <a href="tel:<?php echo $_SESSION['setting_contact'] ?>"><i class="fa fa-phone"></i> เบอร์โทรศัพท์</a>
              </div>
         </div>
    </div>
</div>
<footer>
    <div class="container">
      <!--https://www.w3schools.com/html/html_symbols.asp-->
         <div class="text-center"> 
              &reg 2021 | Develop By Wachirawit <a href="https://line.me/ti/g2/kHx8e2XAP0IT1oV6ZjJh0NMFcunWJDwMKQZ4CA?utm_source=invitation&utm_medium=link_copy&utm_campaign=default" target="_blank">  Potato Snacks </a>
         </div>
    </div>
</footer>
<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">ยืนยัน</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">ดำเนินการต่อ</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">บันทึก</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-righ t"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/aos.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/numscroller-1.0.js"></script>
<script type="text/javascript" src="js/custom.js?v=1"></script>
<script>
    AOS.init();
</script>
<?php include('script.php');?>
</body>
</html>
<?php $conn->close() ?>