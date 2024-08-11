<?php include('../config/db_connect.php');?>
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?page=home">ระบบจัดการ</a>
        </li>
        <li class="breadcrumb-item active">เพิ่มเวลาเปิดทำการ</li>
      </ol>
<div class="row">
	<!-- FORM Panel -->
	<div class="col-md-4">
	<form action="" id="manage-day">
		<div class="card">
			<div class="card-header">
			เวลาเปิดทำการ
			</div>
			<div class="card-body">
					<input type="hidden" name="id">
					<div class="form-group">
						<label class="control-label">วันที่</label>
						<select class="form-control" name="sday">
                            <option value="Sunday">อาทิตย์</option>
                            <option value="Monday">จันทร์</option>
                            <option value="Tuesday">อังคาร</option>
                            <option value="Wednesday">พุธ</option>
                            <option value="Thursday">พฤหัสบดี</option>
                            <option value="Friday">ศุกร์</option>
                            <option value="Saturday">เสาร์</option>
                        </select>
					</div>
					<div class="form-group">
                        <label class="control-label">เวลาเปิดทำการ</label>
						<input type="time" class="form-control" name="stime">
					</div>
					<div class="form-group">
                        <label class="control-label">เวลาปิดทำการ</label>
						<input type="time" class="form-control" name="etime">
					</div>
			</div>
					
			<div class="card-footer">
				<div class="row">
					<div class="col-md-12">
                        <?php
                            $dayqry = $conn->query("SELECT * FROM abailday ");
                            $countday=$dayqry->num_rows;
                            if($countday > 6){
                                echo '<button class="btn btn-sm btn-primary col-sm-3 offset-md-3 disabled" disabled> บันทึก</button>';
                            }
                            else{
                                echo '<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> บันทึก</button>';
                            }
                        ?>
						
						<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-day').get(0).reset()"> ยกเลิก</button>
					</div>
				</div>
			</div>
		</div>
	</form>
	</div>
	<!-- FORM Panel -->

	<!-- Table Panel -->
	 <div class="col-md-8">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover datatable">
						<thead>
							<tr>
								<th class="text-center">ลำดับ</th>
								<th class="text-center">วัน</th>
								<th class="text-center" style="min-width: 132px;">เวลา</th>
								<th class="text-center" style="min-width: 92px;">จัดการ</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$i = 1;
							$days = $conn->query("SELECT * FROM abailday order by id ASC");
							while($row=$days->fetch_assoc()):
							?>
							<tr>
								<td class="text-center"><?php echo $i++ ?></td>
								<td class="">
									<?php echo $row['sday'] ?>
								</td>
                                <td class="">
                                    <?php
                                        if(empty($row['stime']) && empty($row['etime'])){
                                            echo "<span class='bg-danger px-2 rounded text-white'>ปิดทำการ</span>";
                                        }
                                        else{
                                            echo date('h:i a', strtotime($row['stime'])).' - '.date('h:i a', strtotime($row['etime']));  
                                        }
                                    ?>
								</td>
								<td class="text-center">
									<button class="btn btn-sm btn-primary edit_day" type="button" data-id="<?php echo $row['id'] ?>" data-day="<?php echo $row['sday'] ?>" data-stime="<?php echo $row['stime'] ?>" data-etime="<?php echo $row['etime'] ?>" >แก้ไขข้อมูล</button>
									<button class="btn btn-sm btn-danger delete_day" type="button" data-id="<?php echo $row['id'] ?>">ลบข้อมูล</button>
								</td>
							</tr>
							<?php endwhile; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div> 
	<!-- Table Panel -->
</div>
<style>
	
	td{
		vertical-align: middle !important;
	}
</style>
<script>
	$('#manage-day').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_day',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp==1){
					alert_toast("เพิ่มข้อมูลสำเร็จ",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("อัพเดตข้อมูลสำเร็จ",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_day').click(function(){
		start_load()
		var day = $('#manage-day')
		day.get(0).reset()
		day.find("[name='id']").val($(this).attr('data-id'))
		day.find("[name='sday']").val($(this).attr('data-day'))	
		day.find("[name='stime']").val($(this).attr('data-stime'))	
		day.find("[name='etime']").val($(this).attr('data-etime'))		
		end_load()
	})
	$('.delete_day').click(function(){
		_conf("คุณแน่ใจหรือไม่ว่าต้องการลบหมวดหมู่นี้","delete_day",[$(this).attr('data-id')])
	})
	function delete_day($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_day',
			method:'POST',
			data:{id:$id},
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