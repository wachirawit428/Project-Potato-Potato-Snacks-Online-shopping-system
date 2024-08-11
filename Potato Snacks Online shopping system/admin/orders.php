<ol class="breadcrumb">
<li class="breadcrumb-item">
	<a href="index.php?page=home">ระบบจัดการ</a>
</li>
<li class="breadcrumb-item active">คำสั่งซื้อ</li>
</ol>
<div class="card">
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
                      <th style="min-width:70px;max-width:70px;">เบอร์</th>
                      <th style="min-width:70px;max-width:70px;">สถานะ</th>
                      <th style="min-width:140px;max-width: 140px;">จัดการ</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
					include '../config/db_connect.php';
					$qry = $conn->query("SELECT * FROM orders ");
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
								<td class="text-center"><span class="badge badge-secondary"> รอดำเนินการ</span></td>
							<?php endif; ?>
							<?php if($row['status'] == 1): ?>
								<td class="text-center"><span class="badge badge-warning"> อยู่ระหว่างการจัดส่ง</span></td>
							<?php endif; ?>
							<?php if($row['status'] == 2): ?>
								<td class="text-center"><span class="badge badge-success"> จัดส่งสำเร็จ</span></td>
							<?php endif; ?>
							<?php if($row['status'] == 3): ?>
							<td class="text-center">
								<span class="badge badge-danger">ยกเลิกออร์เดอร์</span>
								<button class="btn btn-sm btn-warning view_reson" type="button" data-odrid="<?php echo $row['odrId'] ?>">เหตุผลการยกเลิก</button>	
							</td>						
							<?php endif; ?>
							<td>
								<button class="btn btn-sm btn-primary view_order" data-status="<?php echo $row['status'] ?>" data-date="<?php echo $row['odrdate'] ?>" data-id="<?php echo $row['odrId'] ?>" >รายละเอียด</button>
								<?php if($_SESSION['login_type'] == 1): ?>

								
								
								<button class="btn btn-sm btn-danger delete_order" type="button" data-odrid="<?php echo $row['odrId'] ?>">ลบข้อมูล</button>
								<?php endif; ?>
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

	$('.view_reson').click(function(){
		uni_modal('Cancel Reson','view-reson.php?odrId='+$(this).attr('data-odrid'))
	})

	$('.delete_order').click(function(){
		var oderId = $(this).attr('data-odrid');
		_conf("คุณแน่ใจหรือว่าต้องการลบเมนูนี้","delete_order",[oderId])
	})
	function delete_order($odrid){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_order',
			method:'POST',
			data:{odrid:$odrid},
			success:function(resp){
				if(resp==1){
					alert_toast("ลบข้อมูลสำเร็จ",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>