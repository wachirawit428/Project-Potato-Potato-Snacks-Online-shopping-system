      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?page=home">ระบบจัดการ</a>
        </li>
        <li class="breadcrumb-item active">ระบบจัดการของแอดมิน</li>
      </ol>
      <!--https://getbootstrap.com/docs/5.0/components/breadcrumb/-->
      <!-- Icon Cards-->
      <div class="card mb-3 alert-default">
          <div class="card-body">
            <?php echo "Welcome back ".$_SESSION['login_name']."!"  ?>									
          </div>
      </div>
      <div class="row">
        
      <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-fw fa fa-support" aria-hidden="true"></i>
              </div>
              <?php
                include ('../config/db_connect.php');
                $odrqry = $conn->query("SELECT * FROM orders where status = 0");
                $countodr=$odrqry->num_rows;
                if(!empty($countodr)){
                    echo '<div class="mr-5">'.$countodr.' รายการคำสั่งซื้อใหม่ </div>';
                }
                else{
                  echo '<div class="mr-5">0 รายการคำสั่งซื้อใหม่</div>';
                }
              ?>   
            </div>
            <a class="card-footer text-white clearfix small z-1" href="index.php?page=orders">
              <span class="float-left">รายละเอียด</span>
              <span class="float-right">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-fw fa fa-shopping-cart" aria-hidden="true"></i>
              </div>
              <?php
                include ('../config/db_connect.php');
                $odrqry = $conn->query("SELECT * FROM orders where status = 1");
                $countodr=$odrqry->num_rows;
                if(!empty($countodr)){
                    echo '<div class="mr-5">'.$countodr.' จัดส่งออร์เดอร์</div>';
                }
                else{
                  echo '<div class="mr-5">0 </div>';
                }
              ?>              
            </div>
            <a class="card-footer text-white clearfix small z-1" href="index.php?page=orders">
              <span class="float-left">รายละเอียด</span>
              <span class="float-right">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-fw fa fa-comments" aria-hidden="true"></i>
              </div>
              <?php
                include ('../config/db_connect.php');
                $catqry = $conn->query("SELECT * FROM category_list");
                $countcat=$catqry->num_rows;
                if(!empty($countcat)){
                    echo '<div class="mr-5">'.$countcat.' หมวดหมู่ทั้งหมด</div>';
                }
                else{
                  echo '<div class="mr-5">0 หมวดหมู่ทั้งหมด</div>';
                }
              ?> 
            </div>
            <a class="card-footer text-white clearfix small z-1" href="index.php?page=categories">
              <span class="float-left">รายละเอียด</span>
              <span class="float-right">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-fw fa fa-list" aria-hidden="true"></i>
              </div>
              <?php
                include ('../config/db_connect.php');
                $menuqry = $conn->query("SELECT * FROM product_list");
                $countmenu=$menuqry->num_rows;
                if(!empty($countmenu)){
                    echo '<div class="mr-5">'.$countmenu.' เมนูทั้งหมด</div>';
                }
                else{
                  echo '<div class="mr-5">0 เมนูทั้งหมด</div>';
                }
              ?>  
            </div>
            <a class="card-footer text-white clearfix small z-1" href="index.php?page=menu">
              <span class="float-left">รายละเอียด</span>
              <span class="float-right">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
              </span>
            </a>
          </div>
        </div>
        <?php if($_SESSION['login_type'] == 1): ?>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card alert-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-fw fa fa-baht" aria-hidden="true"></i>
              </div>
              <div class="mr-5">รายได้ทั้งหมด</div>
              <?php
                include ('../config/db_connect.php');
                $datatotal = "";
                $erningqry = $conn->query("SELECT * FROM orders where status = 1");
                while($row= $erningqry->fetch_assoc()):
                  $datatotal += $row['tprice'];
                endwhile;
                if($datatotal > 0){
                    echo '<div class="mr-5"><h3><i class="fa fa-baht"></i> '.$datatotal.'</h3></div>';
                }
                else{
                  echo '<div class="mr-5"> <h3><i class="fa fa-baht"></i> 0</h3></div>';
                }
              ?>  
            </div>
          </div>
        </div>
        <?php endif; ?>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card alert-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa-fw fa fa-users" aria-hidden="true"></i>
              </div>
              <div class="mr-5">ผู้ใช้ทั้งหมด</div>
              <?php
                include ('../config/db_connect.php');
                $usrqry = $conn->query("SELECT * FROM user_info");
                $countuser=$usrqry->num_rows;
                if(!empty($countuser)){
                    echo '<div class="mr-5"><h3>'.$countuser.'</h3></div>';
                }
                else{
                  echo '<div class="mr-5"> <h3>0</h3></div>';
                }
              ?>  
            </div>
            <a class="card-footer text-dark clearfix small z-1" href="index.php?page=allusers">
              <span class="float-left">รายละเอียด</span>
              <span class="float-right">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <!-- Example DataTables Card-->
            <div class="card mb-3">
              <div class="card-header">
                   <i class="fa fa-table" aria-hidden="true"></i> รอการจัดส่ง
                </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered datatable">
                    <thead>
                      <tr>
                      <th style="min-width:20px;max-width:20px;">ลำดับ</th>
                      <th style="min-width:70px;max-width:70px;">รหัสคำสั่งซื้อ</th>
                      <th style="min-width:100px;max-width:100px;">ชื่อ</th>
                      <th style="min-width:120px;max-width:140px;">ที่อยู่</th>
                      <th style="min-width:100px;max-width:100px;">อีเมล</th>
                      <th style="min-width:70px;max-width:70px;">เบอร์โทรศัพท์</th>
                      <th style="min-width:70px;max-width:70px;">สถานะ</th>
                      <th style="min-width:70px;max-width: 70px;">จัดการ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $i = 1;
                      include ('../config/db_connect.php');
                      $qry = $conn->query("SELECT * FROM orders where status = 0 ");
                      while($row=$qry->fetch_assoc()):
                      ?>
                      <tr>
                          <td><?php echo $i++ ?></td>
                          <td><?php echo $row['odrId']  ?></td>
                          <td><?php echo $row['name'] ?></td>
                          <td><?php echo $row['address'] ?></td>
                          <td><?php echo $row['email'] ?></td>
                          <td><?php echo $row['mobile'] ?></td>
                          <?php if($row['status'] == 0): ?>
                            <td class="text-center"><span class="badge badge-secondary">รอดำเนินการ</span></td>
                          <?php endif; ?>
                          <?php if($row['status'] == 1): ?>
								            <td class="text-center"><span class="badge badge-warning"> อยู่ระหว่างการจัดส่ง</span></td>
							            <?php endif; ?>
                          <?php if($row['status'] == 2): ?>
                            <td class="text-center"><span class="badge badge-success">จัดส่งสำเร็จ</span></td>
                          <?php endif; ?>
                          <?php if($row['status'] == 3): ?>
                          <td class="text-center"><span class="badge badge-danger">ยกเลิกออร์เดอร์</span></td>
                          <?php endif; ?>
                          <td>
                            <button class="btn btn-sm btn-primary view_order" data-status="<?php echo $row['status'] ?>" data-date="<?php echo $row['odrdate'] ?>" data-id="<?php echo $row['odrId'] ?>" >รายละเอียดออร์เดอร์</button>
                          </td>
                      </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
   
            <script>
	$('.view_order').click(function(){
		uni_modal('Order: '+$(this).attr('data-date'),'view_order.php?odrId='+$(this).attr('data-id')+'&&odrstatus='+$(this).attr('data-status'))
	})
  </script>
