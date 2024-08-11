<div class="inner_banner">
    <img src="images/slider2.jpg" alt="">
</div>

<div class="section prod-detals-page">
    <div class="container">
        <div class = "card-wrapper">
        <?php
  $qry = $conn->query("SELECT * FROM  product_list where id = ".$_GET['prodid'])->fetch_array();
   ?>
            <div class = "card">
              <!-- card left -->
              <div class = "product-imgs">
                <div class = "img-display">
                  <div class = "img-showcase">
                    <img src="<?php echo $uploadimg.$qry['img_path']; ?>" alt="">                   
                  </div>
                </div>               
              </div>
              <!-- card right -->
              <div class = "product-content">
                <h2 class = "product-title" title="<?php echo $qry['name']; ?>"><?php echo $qry['name']; ?></h2>
                <?php $cat = $conn->query("SELECT * FROM  category_list where id = ".$qry['category_id'])->fetch_array(); ?>
                <a href = "#" class = "product-link"><?php echo $cat['name']; ?></a>
                <div class = "product-rating">
                  <i class = "fa fa-star"></i>
                  <i class = "fa fa-star"></i>
                  <i class = "fa fa-star"></i>
                  <i class = "fa fa-star"></i>
                  <i class = "fa fa-star"></i>
                  <span>4.7(21)</span>
                </div>
          
                <div class = "product-price">
                  <p class = "last-price">ราคาเต็ม: <span> ฿ </i> <?php echo number_format($qry['delprice'],2); ?></span></p>
                  <p class = "new-price">ราคา: <span> ฿ <?php echo number_format($qry['price'],2); ?> </span></p>
                </div>
          
                <div class = "product-detail">
                  <h2>รายละเอียดรายการ: </h2>
                 <p> <?php echo $qry['description']; ?></p>
                </div>
                <form method="post">
                    <div class = "purchase-info">
                      จำนวน: 
                      <div class="incriment-sec mb-4">
                        <div class="button-container">
                            <button class="cart-qty-minus" type="button" value="-">-</button>
                            <input type="text" name="qty" class="qty" value="1" class="input-text qty" />
                            <button class="cart-qty-plus" type="button" value="+">+</button>
                        </div>                                     
                      </div>
                    <!-- <input type = "number" min = "0" value = "1"> -->
                    <button type = "button" class = "btn btn_common" id="add_to_cart_modal">
                        เพิ่มใส่ตะกร้า <i class = "fa fa-shopping-cart"></i>
                    </button>
                    </div>
                </form>
          
              </div>
            </div>
          </div>
    </div>
</div>
<?php include('include/offers.php');?>
