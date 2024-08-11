<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.php?page=home">ระบบจัดการ</a>
	</li>
	<!--https://getbootstrap.com/docs/4.0/components/breadcrumb/-->
	<li class="breadcrumb-item active">การแจ้งเตือนโปรโมชัน</li>
</ol>
	<br>
	<div class="card">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th style="min-width: 10px;">ลำดับ</th>
							<th style="min-width: 220px;">วัน-เวลาโปรโมชัน</th>
							<th style="min-width: 300px;">ข้อความ</th>
							<th style="min-width: 95px;">เปิกใช้งาน</th>
							<th style="min-width: 77px;">จัดการ</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include '../config/db_connect.php';
							$offers = $conn->query("SELECT * FROM odernotification where id = 1");
							$i = 1;
							while($row= $offers->fetch_assoc()):
						?>
						<tr>
							<td>
								<?php echo $i++ ?>
							</td>
							<td>
								<?php echo date('d-m-Y',strtotime($row['osdate'])).' To '.date('d-m-Y',strtotime($row['oedate'])); ?>
							</td>
							<td>
								<?php echo $row['omssg']; ?>
							</td>
							<td>
                                <?php if($row['status'] == 1): ?>
                                    <span class="badge badge-success">เปิด</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">ปิด</span>
                                <?php endif; ?>
							</td>
							<td>
								<a class="btn btn-primary edit_noti" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>แก้ไขข้อมูล</a>
							</td>
						</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<script>

$('.edit_noti').click(function(){
	uni_modal('แจ้งเตือนโปรโมชัน','edit-notification.php?id='+$(this).attr('data-id'))
})
</script>