
<?php
     $offers = $conn->query("SELECT * FROM odernotification where status = 1");
     while($row= $offers->fetch_assoc()):
?>
<div class="notice_text">
     <div class="container">
          <h2 class="white-mode">โปรโมชันวันนี้</h2>
          <small><i class="fa fa-calendar"></i> <?php echo date('d-m-Y',strtotime($row['osdate'])).' To '.date('d-m-Y',strtotime($row['oedate'])); ?></small>
          <h4><?php echo $row['omssg']; ?></h4>
          <a href="index.php?page=foods-menu">เมนูอาหาร</a>
     </div>
</div>
<?php endwhile; ?>