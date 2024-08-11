<div class="inner_banner">
    <img src="images/profile.jpg" alt="">
</div>

<?php include('include/offers.php');?>
<div class="section min_height">
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-sm-12">
                <div class="section_title text-center">
                    <h1>
                        <i class="fa fa-cutlery"></i>
                        ประวัติการสั่งซื้อ
                        <i class="fa fa-cutlery"></i>
                    </h1>
               </div>
            </div>

            <div class="row justify-content-center">
                <?php
                $odrdtls = $conn->query("SELECT * FROM orders  where usrid = ".$_SESSION['login_user_id']." order by id DESC");
                while($uodrow = $odrdtls->fetch_assoc()):
                    $orderId = $uodrow['odrId'];
                    $delstatus = "";
                     $total = 0;
                    $qry = $conn->query("SELECT * FROM order_list o inner join product_list p on o.product_id = p.id  where order_id =".$orderId);
                   //https://fontawesome.com/v4/icons/
                        if($uodrow['status']=="0"){
                            $delstatus = "<span class='text-warning'><i class='fa fa-info-circle'></i> รอดำเนินการ</span>";
                        }
                        if($uodrow['status']=="1"){
                            $delstatus = "<span class='text-primary'><i class='fa fa-map-marker'></i> อยู่ระหว่างการจัดส่ง</span>";
                        }
                        if($uodrow['status']=="2"){
                            $delstatus = "<span class='text-success'><i class='fa fa-check'></i> จัดส่งสำเร็จ</span>";
                        }
                        if($uodrow['status']=="3"){
                            $delstatus = "<span class='text-danger'><i class='fa fa-close'></i> ยกเลิกออร์เดอร์</span>";
                        }
                ?>
               <div class="col-sm-12 col-lg-6">
                    <div class="card mb-3 order_bx">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7 dateodr">
                                    <i class="fa fa-calendar"></i> <?php echo $uodrow['odrdate']  ?>
                                </div>
                                <div class="col-5 text-right idodr">
                                    Id : <?php echo $orderId ?>
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <tbody>
                                <?php
                                while($row = $qry->fetch_assoc()):
                                $total += $row['qty'] * $row['price'];
                                ?>
                                <tr>
                                    <td style="min-width:200px;max-width:80%;">
                                        <img src="<?php echo $uploadimg.$row['img_path']; ?>"  class="odr-img rounded-start" alt="...">
                                        <div class="odr_name">
                                            <a href="index.php?page=food-details&&prodid=<?php echo $row['id'] ?>" class="color-theme"><?php echo $row['name'] ?></a>
                                            <small><?php echo $row['qty'] ?> X <?php echo number_format($row['price'],2) ?></small>
                                        </div>
                                    </td>
                                    <td style="min-width: 20%;max-width:20%;text-align: right;"><?php echo number_format($row['qty'] * $row['price'],2) ?> ฿ </td> 
                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                <strong> ราคารวม</strong>
                                </div>
                                <div class="col-9 text-right">
                                    <strong> <?php echo number_format($total,2) ?> ฿ </strong>                                
                                </div>
                                <div class="col-12"><hr></div>
                                <div class="col-9">
                                     <small> สภานะ : <?php echo $delstatus ?></small>
                                </div>
                                <div class="col-3 text-right dateodr">
                                    <?php
                                        if($uodrow['status']=="0"){
                                           echo '<a href="index.php?page=cancel-order&&od='.$orderId.'" class="text-warning">ยกเลิกออร์เดอร์</a>';
                                        }
                                    ?>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile;  ?>
           </div>
        </div>
    </div>
</div>
