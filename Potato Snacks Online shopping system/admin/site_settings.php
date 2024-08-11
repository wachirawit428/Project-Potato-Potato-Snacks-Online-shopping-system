<?php
include '../config/db_connect.php';
$qry = $conn->query("SELECT * from system_settings limit 1");
if($qry->num_rows > 0){
	foreach($qry->fetch_array() as $k => $val){
		$meta[$k] = $val;
	}
}
 ?>
<ol class="breadcrumb">
<li class="breadcrumb-item">
	<a href="index.php?page=home">ระบบจัดการ</a>
</li>
<li class="breadcrumb-item active">ข้อมูลร้าน</li>
</ol>
	<div class="card mb-5">
		<div class="card-body">
			<form action="" id="manage-settings">
				<div class="form-group">
					<label for="name" class="control-label">ชื่อเว็บ</label>
					<input type="text" class="form-control" id="name" name="name" value="<?php echo isset($meta['name']) ? $meta['name'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="email" class="control-label">อีเมล</label>
					<input type="email" class="form-control" id="email" name="email" value="<?php echo isset($meta['email']) ? $meta['email'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="contact" class="control-label">เบอร์โทรศัพท์</label>
					<input type="text" class="form-control" id="contact" name="contact" value="<?php echo isset($meta['contact']) ? $meta['contact'] : '' ?>" required>
				</div>
				<div class="form-group">
					<label for="contact" class="control-label">ที่อยู่</label>
					<textarea type="text" class="form-control" id="address" name="address"><?php echo isset($meta['address']) ? $meta['address'] : '' ?></textarea>
				</div>
				<div class="form-group">
					<label for="about" class="control-label">เกี่ยวกับเรา</label>
					<textarea name="about" class="text-jqte"><?php echo isset($meta['about_content']) ? $meta['about_content'] : '' ?></textarea>

				</div>
				<div class="form-group">
					<label for="" class="control-label">อัพโหลดโลโก้ร้าน</label>
					<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
				</div>
				<div class="form-group">
					<img src="<?php echo isset($meta['cover_img']) ? '../assets/img/'.$meta['cover_img'] :'' ?>" alt="" id="cimg">
				</div>
				<center>
					<button class="btn btn-info btn-primary btn-block col-md-2">บันทึกข้อมูล</button>
				</center>
			</form>
		</div>
	</div>

<script>
	function displayImg(input,_this) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
        	$('#cimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
	$('.text-jqte').jqte();

	$('#manage-settings').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_settings',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			error:err=>{
				console.log(err)
			},
			success:function(resp){
				if(resp == 1){
					alert_toast('บันทึกข้อมูลสำเร็จ','success')
					setTimeout(function(){
						location.reload()
					},1000)
				}
			}
		})

	})
</script>