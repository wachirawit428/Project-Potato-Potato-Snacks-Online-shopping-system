<ol class="breadcrumb">
<li class="breadcrumb-item">
	<a href="index.php?page=home">ระบบจัดการ</a>
</li>
<li class="breadcrumb-item active">ผู้ใช้</li>
</ol>
<div class="card">
	<div class="card-body">
	    <div class="table-responsive">
			<table class="table table-bordered datatable">
				<thead>
					<tr>
					  <th style="min-width:10px;max-width:10px;">ลำดับ</th>
                      <th style="min-width:100px;max-width:100px;">ชื่อ</th>
                      <th style="min-width:100px;max-width:100px;">อีเมล</th>
                      <th style="min-width:70px;max-width:70px;">เบอร์โทรศัพท์</th>
                      <th style="min-width:120px;max-width:140px;">ที่อยู๋</th>
                      <th style="min-width:40px;max-width: 40px;">จัดการ</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i = 1;
					include '../config/db_connect.php';
					$qry = $conn->query("SELECT * FROM user_info ");
					while($row=$qry->fetch_assoc()):
					?>
					<tr>
							<td><?php echo $i++ ?></td>
							<td><?php echo $row['first_name'].' '.$row['last_name']  ?></td>
							<td><?php echo $row['email'] ?></td>
							<td><?php echo $row['mobile'] ?></td>
							<td><?php echo $row['address'] ?></td>
							<td>
								<button class="btn btn-sm btn-danger delete_ruser" type="button" data-usrid="<?php echo $row['user_id'] ?>">ลบข้อมูล</button>
							</td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$('.delete_ruser').click(function(){
		var usrid = $(this).attr('data-usrid');
		_conf("คุณแน่ใจหรือไม่ว่าต้องการลบหมวดหมู่นี้","delete_ruser",[usrid])
	})
	function delete_ruser($usrid){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_ruser',
			method:'POST',
			data:{usrid:$usrid},
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