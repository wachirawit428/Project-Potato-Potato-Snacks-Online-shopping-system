<?php 
include('../config/db_connect.php');
if(isset($_GET['id'])){
$noti = $conn->query("SELECT * FROM odernotification where id =".$_GET['id']);
foreach($noti->fetch_array() as $k =>$v){
	$meta[$k] = $v;
}
}
?>
<div class="container-fluid">
	
	<form action="" id="manage-noti">
		<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
		<div class="form-group">
			<label for="osdate">วันเริ่ม</label>
			<input type="date" name="osdate" id="osdate" class="form-control" value="<?php echo isset($meta['osdate']) ? $meta['osdate']: '' ?>" required>
		</div>
        <div class="form-group">
			<label for="oedate">วันที่สิ้นสุด</label>
			<input type="date" name="oedate" id="oedate" class="form-control" value="<?php echo isset($meta['oedate']) ? $meta['oedate']: '' ?>" required>
		</div>
		<div class="form-group">
        <label for="message">ข้อความ</label>
        <textarea name="omssg" class="form-control" id="message"  rows="10" required><?php echo isset($meta['omssg']) ? $meta['omssg']: '' ?></textarea>
		</div>
		<div class="form-group">
			<label for="status">สถานะ</label>
			<select name="status" id="status" class="custom-select">
				<option value="1" <?php echo isset($meta['status']) && $meta['status'] == 1 ? 'selected': '' ?>>เปิด</option>
				<option value="0" <?php echo isset($meta['status']) && $meta['status'] == 0 ? 'selected': '' ?>>ปิด</option>
			</select>
		</div>
	</form>
</div>
<script>
	$('#manage-noti').submit(function(e){
		e.preventDefault();
		start_load()
		$.ajax({
			url:'ajax.php?action=save_noti',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp ==1){
					alert_toast("บันทึกข้อมูลสำเร็จ",'success')
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	})
</script>