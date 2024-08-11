<?php
if(!isset($_SESSION['login_user_id'])){
    $ip = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']; 
    $data = "where c.client_ip = '".$ip."' ";	
}else{
    $data = "where c.user_id = '".$_SESSION['login_user_id']."' ";	
}
$total = 0;
$get = $conn->query("SELECT * ,c.id as cid FROM cart c inner join product_list p on p.id = c.product_id ".$data);   
if($get->num_rows > 0){
    ?>
    <div class="section min_height_100 mt-5">
        <div class="container">
            <div class="mt-5">
                <div class="section_title text-left">
                    <h1>
                        <i class="fa fa-shopping-cart"></i>
                        ตะกร้าสินค้า
                    </h1>
            </div>
                <div class="small-container cart-page">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="min-width: 350px;">รายการอาหาร</th>
                                <th style="text-align: left;">จำนวน</th>
                                <th style="min-width: 130px;">ราคา</th>
                                <th style="min-width: 140px;">ราคารวม</th>
                            </tr>
                            <?php                 
                        while($row= $get->fetch_assoc()):
                        $total += ($row['qty'] * $row['price']);
                    ?>

                            <tr>
                                <td>
                                <div class="cart-info">
                                    <img src="<?php echo $uploadimg.$row['img_path'] ?>" alt="" />
                                    <div>
                                    <p><a href="index.php?page=food-details&&prodid=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a></p>
                                    <a href="admin/ajax.php?action=delete_cart&id=<?php echo $row['cid'] ?>" data-id="<?php echo $row['cid'] ?>" class="del"><i class="fa fa-trash"></i> ลบรายการ</a>
                                    </div>
                                </div>
                                </td>
                            
                                <td>                                
                                    <div class = "purchase-info">
                                        <div class="incriment-sec">
                                        <div class="button-container">
                                            <button class="qty-minus" type="button" value="-" data-id="<?php echo $row['cid'] ?>">-</button>
                                            <input type="text" name="qty" class="qty" readonly="readonly" value="<?php echo $row['qty'] ?>" class="input-text qty" />
                                            <button class="qty-plus" type="button" value="+" data-id="<?php echo $row['cid'] ?>">+</button>
                                        </div>                                     
                                        </div>
                                    </div>
                                </td>
                                <td> ฿ <?php echo number_format($row['price'],2).'/-'; ?></td>
                                <td> ฿ <?php echo number_format($row['qty'] * $row['price'],2) ?></td>
                            </tr>
                            <?php endwhile;  ?>
                        </table>
                    </div>
                
                    <div class="total-price">
                        <table>
                            <tr>
                            <td>ราคารวม</td>
                            <td> ฿ </i> <?php echo number_format($total,2) ?></td>
                            </tr>
                            <tr>
                                <td colspan="2">                                
                                
                                <a href="index.php?page=pay&&prodid=<?php echo $row['id'] ?>" class="btn btn_common w-100 mb-3" id="checkout" role="button" aria-pressed="true">ดำเนินการชำระเงิน</a>
                                
                                </td>
                            </tr>
                        </table>
                    </div>
               
                </div>
            </div>
        </div>
    </div>

<?php
}
else{
?>
    <div class="empty_cart">
        <div class="section_title text-center">
            <h1 class="mb-5">
                <i class="fa fa-shopping-cart"></i><br>
            ตะกร้าของคุณยังไม่มีสินค้า
            </h1>
            <a href="index.php?page=foods-menu" class="btn btn_common">เมนูอาหาร</a>
        </div>
    </div>
<?php } ?>

<?php include('include/offers.php');?>