<div class="inner_banner">
    <img src="images/pexels-shantanu-pal-2734288.jpg" alt="">
</div>
<div class="search_section">
     <form id="food_search">
          <div class="secrchcontent">
               <h3>ค้นหารายการอาหาร</h3>
               <input type="text" name="fodsrch" class="form-control" placeholder="ค้นหาชื่อเมนูที่ต้องการ">
               <button class="btn btn_common">ค้นหา</button>
          </div>
     </form>
</div>
<?php 
include('config/db_connect.php');
if(isset($_GET['catfoodid'])){
    $catId = $_GET['catfoodid'];
    $qry = $conn->query("SELECT * FROM  product_list where category_id = '".$catId."' and status = 1 order by id DESC ");
}
if(isset($_GET['catfoodnm'])){
    $catfoodname = $_GET['catfoodnm'];
    $qry = $conn->query("SELECT * FROM  product_list where name LIKE '%$catfoodname%' and status = 1 order by id DESC ");
}
if(empty(isset($_GET['catfoodnm'])) && empty(isset($_GET['catfoodid']))){ 
 $qry = $conn->query("SELECT * FROM  product_list where status = 1 order by name DESC ");
}
?>
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="section_title text-center">
                    <h1>
                         <i class="fa fa-cutlery"></i>
                        รายการอาหาร
                         <i class="fa fa-cutlery"></i>
                    </h1>
               </div>
            </div>
        </div>
        <div class="row justify-content-center mb-3 food-listing">
            <?php while($row = $qry->fetch_assoc()): ?>
            <div class="col-6 col-sm-4 col-lg-3">
                <div class="prod_bx" title="<?php echo $row['name'] ?>">
                    <div class="prod_img">
                         <a href="index.php?page=food-details&&prodid=<?php echo $row['id'] ?>">  <img src="<?php echo $uploadimg.$row['img_path'] ?>" alt=""></a>
                    </div>
                    <div class="prod_details">
                        <h3 title="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></h3>
                         <div class = "product-rating">
                            <i class = "fa fa-star"></i>
                            <i class = "fa fa-star"></i>
                            <i class = "fa fa-star"></i>
                            <i class = "fa fa-star"></i>
                            <i class = "fa fa-star"></i>
                            <span>4.5(37)</span>
                        </div> 
                        <?php
                        $catr = $conn->query("SELECT * FROM category_list where id = ".$row['category_id']);
                        $crow=$catr->fetch_assoc()
                        ?>
                        <small>หมวดหมู่ : <b><?php echo $crow['name'] ?></b></small>
                        <h4> ฿ <?php echo number_format($row['price'],2); ?> <del><?php echo number_format($row['delprice'],2); ?></del></h4>
                       
                        <div class="button_dtls">
                            <a href="index.php?page=food-details&&prodid=<?php echo $row['id'] ?>" class="btn">รายละเอียด</a>
                        </div>
                    </div>
                </div>
            </div>  
            <?php endwhile; ?>
        </div>
    </div>
</div>

<?php include('include/offers.php');?>
