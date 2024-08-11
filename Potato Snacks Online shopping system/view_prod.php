<?php 
  include('config/db_connect.php');
    $qry = $conn->query("SELECT * FROM  product_list where id = ".$_GET['id'])->fetch_array();
?>
<div class="container-fluid">

	<div class="card">
        <img src="assets/img/<?php echo $qry['img_path'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $qry['name'] ?></h5>
		  <p><?php echo 'Rs: '.number_format($qry['price'],2).'/-'; ?></p>
          <div class="form-group">
          </div>
          <div class="row">          
          	<div class="input-group col-md-7 mb-3">
			  <input type="hidden" value="1" min = 1 class="form-control text-center" name="qty" >
			</div>
          </div>
          <div class="text-center">
          	<button class="btn btn-outline-primary btn-sm btn-block" id="add_to_cart_modal"><i class="fa fa-cart-plus"></i> เพิ่มใส่ตะกร้า </button>
          </div>
        </div>
        
      </div>
</div>
<style>
	#uni_modal_right .modal-footer{
		display: none;
	}
</style>

