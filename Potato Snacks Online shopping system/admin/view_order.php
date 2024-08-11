
	<?php
	$total = 0;
	include '../config/db_connect.php';
	$qry = $conn->query("SELECT * FROM order_list o inner join product_list p on o.product_id = p.id  where order_id =".$_GET['odrId']);
	?>
	<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>รายการ</th>
				<th>ชื่อเมนู</th>
				<th>หมวดหมู่</th>
				<th>จำนวน</th>
				<th>ราคา</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			while($row=$qry->fetch_assoc()):
				$total += $row['qty'] * $row['price'];
			?>			
			<tr>
				<td><img src="<?php echo '../assets/img/'.$row['img_path'] ?>"  alt="" class="tblimg"/></td>
				<td><?php echo $row['name'] ?></td>
				<?php
				$catr = $conn->query("SELECT * FROM category_list where id = ".$row['category_id']);
				$crow=$catr->fetch_assoc()
				?>
				<td><?php echo $crow['name'] ?></td>
				<td><?php echo $row['qty'] ?></td>
				<td><?php echo number_format($row['qty'] * $row['price'],2) ?></td>
			</tr>
		<?php endwhile; ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4" class="text-right">ราคารวม</th>
				<th><?php echo number_format($total,2) ?></th>
			</tr>

		</tfoot>
	</table>
	</div>
	<div class="text-center">
		<div class="row">
			<div class="col-sm-4">
				<select name="odrstatus" id="odrstatus" class="form-control mb-4 mb-sm-0">
					<option value="0" <?php if($_GET['odrstatus'] == "0"){echo 'selected';}?>>รอดำเนินการ</option>
					<option value="1" <?php if($_GET['odrstatus'] == "1"){echo 'selected';}?>>อยู่ระหว่างจัดส่ง</option>
					<option value="2" <?php if($_GET['odrstatus'] == "2"){echo 'selected';}?>>จัดส่งสำเร็จ</option>
					<option value="3" <?php if($_GET['odrstatus'] == "3"){echo 'selected';}?>>ยกเลิกออร์เดอร์</option>
				</select>
			</div>
			<div class="col-sm-8 text-right">
				<button class="btn btn-primary" id="confirm" type="button" onclick="confirm_order()">แก้ไขสถานะ</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
			</div>
		</div>

	</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
</style>
<script>
	function confirm_order(){		
		start_load()
		var odrstatus =  $('#odrstatus').val();
		$.ajax({
			url:'ajax.php?action=confirm_order',
			method:'POST',
			data:{odestats:odrstatus,tprice:'<?php echo number_format($total,2) ?>',odrId:'<?php echo $_GET['odrId'] ?>'},
			dataType: 'json',
			// success:function(resp){
			// 	alert_toast(resp.msg)
            //             setTimeout(function(){
            //                 location.reload()
            //             },1500)				
			// }
			success:function(resp){
				if(resp == 0){
					alert_toast("รอดำเนินการ")
                        setTimeout(function(){
                            location.reload()
                        },1500)
				}
				if(resp == 1){
					alert_toast("อยู่ระหว่างจัดส่ง")
                        setTimeout(function(){
                            location.reload()
                        },1500)
				}
				if(resp == 2){
					alert_toast("จัดส่งสำเร็จ")
                        setTimeout(function(){
                            location.reload()
                        },1500)
				}
				if(resp == 3){
					alert_toast("ยกเลิกออร์เดอร์")
                        setTimeout(function(){
                            location.reload()
                        },1500)
				}
			}
		})
	}
</script>