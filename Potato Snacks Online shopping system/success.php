<?php
include ('config/db_connect.php');
$islog = $conn->query("SELECT * FROM orders where usrid = {$_SESSION['login_user_id']} ")->num_rows;
if($islog <= 0){
    echo "<script>alert('กรุณาเข้าสู่ระบบเพื่อทำการสั่งซื้อ'); location.replace('./')</script>";
}
$odrdtls = $conn->query("SELECT * FROM  orders where usrid = ".$_SESSION['login_user_id']." and status = 0 ORDER BY id DESC")->fetch_array();

?>

<div class="section min_height mt-5 success_odr">
    <div class="container">
        <div class="mt-5">
            <div class="section_title text-left">
                <h4>
                <tr>
                    
            <th colspan="5" scope="col"><center><p style="color:#07000F;font-size:25px">Potato Snacks Online shopping system</p></center></th>
            </tr>
            <hr>
                    <i class="fa fa-check" style='color: green'></i>
                    สั่งซื้อสำเร็จแล้ว 
                    <strong><p style="color:#07000F;font-size:20px"> หมายเลขออร์เดอร์ของคุณ: <?php echo $odrdtls['odrId']  ?></p></strong>
                </h4>
           </div>
             <div class="small-container cart-page">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th style="min-width: 270px;">รายการอาหาร</th>
                            <th style="text-align: left;">จำนวน</th>
                            <th style="min-width: 140px;">ราคา รวม</th>
                            
                        </tr>
                    <?php
                    $total = 0;
                    $qry = $conn->query("SELECT * FROM order_list o inner join product_list p on o.product_id = p.id  where order_id =".$odrdtls['odrId']);
			
                    while($row=$qry->fetch_assoc()):
                        $total += $row['qty'] * $row['price'];
                    ?>
                        <tr>
                            <td>
                            <div class="cart-info">
                                <img src="<?php echo $uploadimg.$row['img_path']; ?>" alt="">     
                                <div>
                                <p><a href="index.php?page=food-details&&prodid=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></p>
                                </div>
                            </div>
                            </td>
                           
                            <td>                                
                            <?php echo $row['qty'] ?>
                            </td>
                            <td><?php echo number_format($row['qty'] * $row['price'],2) ?></td>
                        </tr>
		                <?php endwhile; ?>
                    </table>
                </div>
            
                <div class="total-price">
                    <table>
                        <tr>
                        <td>รวม ราคา</td>
                        <td><?php echo number_format($total,2) ?></td>
                        </tr>
                    </table>
                </div>
                <center>
                        <botton 

                            onclick="myFunction()"><a class="gray" href="receipt.php?detail=<?php echo $odr?>">พิมพ์</a>
                    
                        </botton>
                    </center>
            </div> 
        </div>
    </div>
</div>

<?php include('include/offers.php');?>