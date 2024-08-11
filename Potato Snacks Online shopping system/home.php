<div class="header_banner">
     <div class="banner_item">
     <video height="785" width="1950" autoplay loop>
          <source src="images/Surf'n'Fries -  Food Commercial.mp4" type="video/mp4"/>
     </video>

          <div class="overlay_banner">
               <div class="display_middle">
                    <div class="container text-center">
                         
                         
                         <h1>Potato Snacks</h1>
                         <p> ยินดีต้อนรับลูกค้าทุกท่าน ท่านสามารถเลือกสั่งอาหารได้เท่าที่ท่านต้องการ ^ ^ ขอให้สนุกกับการสั่งอาหาร</p>
                         <a href="index.php?page=foods-menu" class="btn btn_common">เข้าสู่เมนู</a>
                    </div>
               </div>
          </div>
     </div>
</div>
<div class="search_section">
     <form id="food_search">
          <div class="secrchcontent">
               <h3>ค้นหารายการอาหาร</h3>
               <input type="text" name="catfoodnm" class="form-control" placeholder="ค้นหาชื่อเมนูที่ต้องการ">
               <button class="btn btn_common">ค้นหา</button>
          </div>
     </form>
</div>
<div class="section">
     <div class="container">
          <div class="row justify-content-center">
          <?php 
          include('config/db_connect.php');
          $catqry = $conn->query("SELECT * FROM  category_list order by id DESC ");
          ?>
               <div class="col-sm-12">
                    <div class="section_title text-center">
                         <h1>
                              <i class="fa fa-cutlery"></i>
                              รายการอาหาร
                              <i class="fa fa-cutlery"></i>
                         </h1>
                    </div>
               </div>
          <?php  while($rowcat = $catqry->fetch_assoc()): ?>
               <div class="col-6 col-sm-4">
                    <div class="category_bx" title="<?php echo $rowcat['name'] ?>">
                         <a href="index.php?page=foods-menu&&catfoodid=<?php echo $rowcat['id'] ?>">
                              <div class="category_img">
                                   <img src="<?php echo $uploadimg.$rowcat['catimg'] ?>" alt="">
                              </div>
                              <?php echo $rowcat['name'] ?>
                         </a>
                    </div>
               </div>
          <?php endwhile; ?>
          </div>
     </div>
</div>
<?php include('include/offers.php');?>
<div class="section bg-theme">
     <div class="container">
          <div class="row justify-content-center">
               <div class="col-sm-12">
                    <div class="section_title text-center">
                         <h1>
                              <i class="fa fa-cutlery"></i>
                              เวลาร้านเปิดทำการ
                              <i class="fa fa-cutlery"></i>
                         </h1>
                    </div>
               </div>
               <div class="col-sm-8 col-lg-6">
                    <div class="time_table">
                         <table class="table">
                              <tr>
                                   <th>วัน</th>
                                   <th>เวลาเปิด</th>
                              </tr>
                              <?php 
                              $days = $conn->query("SELECT * FROM abailday order by id ASC");
                              while($row=$days->fetch_assoc()):
                              ?>
                               <tr>
                              <td class="">
                                   <?php echo $row['sday'] ?>
                              </td>
                              <td class="">
                                   <?php
                                   if(empty($row['stime']) && empty($row['etime'])){
                                        echo "<span class='pill-off'>Week Off</span>";
                                   }
                                   else{
                                        echo date('h:i a', strtotime($row['stime'])).' - '.date('h:i a', strtotime($row['etime'])); 
                                   }
                                   ?>
                              </td>
                              </tr>
                              <?php endwhile; ?>
                         </table>
                    </div>
               </div>
          </div>
     </div>
</div>