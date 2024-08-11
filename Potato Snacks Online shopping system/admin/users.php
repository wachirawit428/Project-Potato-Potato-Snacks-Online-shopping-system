<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.php?page=home">ระบบจัดการ</a>
	</li>
	<li class="breadcrumb-item active">ผู้ดูแลระบบ</li>
</ol>
	<div class="row">
	<div class="col-lg-12">
			<button class="btn btn-primary float-right btn-sm" id="new_user"><i class="fa fa-plus"></i> เพิ่มผู้ดูแลระบบ</button>
	</div>
	</div>
	<br>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table-striped table-bordered datatable">
					<thead>
						<tr>
							<th style="max-width: 10px;" class="text-center">ลำดับ</th>
							<th style="max-width: 40px;" class="text-center">ชื่อ</th>
							<th style="max-width: 40px;" class="text-center">Username</th>
							<th style="max-width: 40px;" class="text-center">จัดการ</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include '../config/db_connect.php';
							$users = $conn->query("SELECT * FROM users order by name asc");
							$i = 1;
							while($row= $users->fetch_assoc()):
						?>
						<tr>
							<td>
								<?php echo $i++ ?>
							</td>
							<td>
								<?php echo $row['name'] ?>
							</td>
							<td>
								<?php echo $row['username'] ?>
							</td>
							<td>
								<center>
									<div class="btn-group">
									<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										จัดการ
									</button>
									<div class="dropdown-menu">
										<a class="dropdown-item edit_user" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>แก้ไขข้อมูล</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item delete_usrid" href="javascript:void(0)" data-usrid = '<?php echo $row['id'] ?>'>ลบข้อมูล</a>
									</div>
									</div>
								</center>
							</td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<script>
	
$('#new_user').click(function(){
	uni_modal('New User','manage_user.php')
})
$('.edit_user').click(function(){
	uni_modal('Edit User','manage_user.php?id='+$(this).attr('data-id'))
})
$('.delete_usrid').click(function(){
		_conf("คุณแน่ใจหรือว่าต้องการลบเมนูนี้","delete_usrid",[$(this).attr('data-usrid')])
})
	function delete_usrid($usrid){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_usrid',
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