<?php include('../config/db_connect.php');?>
<ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?page=home">ระบบจัดการ</a>
        </li>
        <li class="breadcrumb-item active">เมนูอาหาร</li>
      </ol>
		<div class="row">
			<!-- FORM Panel -->
			<div class="col-md-5">
				<form action="" id="manage-menu">
					<div class="card">
						<div class="card-header">
						แบบฟอร์มเมนู
						</div>
						<div class="card-body row">
								<input type="hidden" name="id">
								<div class="form-group col-sm-12">
									<label class="control-label">ชื่อเมนู</label>
									<input type="text" class="form-control" name="name">
								</div>
								<div class="form-group col-sm-12">
									<label class="control-label">รายละเอียดเมนู</label>
									<textarea cols="30" rows="3" class="form-control text-jqte" name="description"></textarea>
								</div>
								<div class="form-group col-sm-6 d-flex align-items-center">
									<div class="custom-control custom-switch">
									<input type="checkbox" name="status" class="custom-control-input" id="availability" checked>
									<label class="custom-control-label" for="availability">สถานะ</label>
									</div>
								</div>	
								<div class="form-group col-sm-6">
									<label class="control-label">หมวดหมู่ </label>
									<select name="category_id" id="" class="custom-select browser-default">
										<?php
										$cat = $conn->query("SELECT * FROM category_list order by name asc ");
										while($row=$cat->fetch_assoc()):
										?>
										<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
										<?php endwhile; ?>
									</select>									
								</div>
								<div class="form-group col-sm-6">
									<label class="control-label">ราคา(เต็ม)</label>
									<input type="number" class="form-control text-right" name="delprice" step="any">
								</div>
								<div class="form-group col-sm-6">
									<label class="control-label">ราคา(ลดราคา)</label>
									<input type="number" class="form-control text-right" name="price" step="any">
								</div>
								<div class="form-group  col-sm-6">
									<label for="" class="control-label">รูป</label>
									<input type="file" class="form-control" name="img" onchange="displayImg(this,$(this))">
								</div>
								<div class="form-group  col-sm-6">
									<img src="<?php echo isset($image_path) ? '../assets/img/'.$cover_img :'' ?>" alt="" id="cimg">
								</div>
						</div>
								
						<div class="card-footer">
							<div class="row">
								<div class="col-md-12">
									<button class="btn btn-sm btn-primary col-sm-3 offset-md-3"> บันทึก</button>
									<button class="btn btn-sm btn-default col-sm-3" type="button" onclick="$('#manage-menu').get(0).reset()"> ยกเลิก</button>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- FORM Panel -->

			<!-- Table Panel -->
			<div class="col-md-7">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover datatable">
								<thead>
									<tr>
										<th class="text-center">ลำดับ</th>
										<th class="text-center" style="min-width:120px;max-width:120px;">รูป</th>
										<th class="text-center" style="min-width:200px;">รายละเอียด</th>
										<th class="text-center">จัดการ</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									$i = 1;
									$cats = $conn->query("SELECT * FROM product_list order by id desc");
									while($row=$cats->fetch_assoc()):
									?>
									<tr class="<?php if($row['status']=="0"){ echo "disabled";} ?>">
										<td class="text-center"><?php echo $i++ ?></td>

									
										<td class="text-center">
											<img src="<?php echo isset($row['img_path']) ? '../assets/img/'.$row['img_path'] :'' ?>" alt="" id="cimg">
										</td>
										<td class="">
											<p>ชื่อเมนู : <b><?php echo $row['name'] ?></b></p>
											<?php
											$catr = $conn->query("SELECT * FROM category_list where id = ".$row['category_id']);
											$crow=$catr->fetch_assoc()
											?>
											<p>หมวดหมู : <b><?php echo $crow['name'] ?></b></p>
											<p>ราคา : <b><?php echo "฿".number_format($row['price'],2) ?></b> <small class="text-danger"><b><del><?php echo $row['delprice'] ?></del> /-</b></small></p>
										</td>
										<td class="text-center">
											<div class="pro_Des"><?php echo $row['description'];?></div>
											<button class="btn btn-sm btn-primary edit_menu" type="button" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>" data-cat="<?php echo $row['category_id'] ?>" data-status="<?php echo $row['status'] ?>"  data-delprice="<?php echo $row['delprice'] ?>" data-price="<?php echo $row['price'] ?>" data-img_path="<?php echo $row['img_path'] ?>">แก้ไข</button>
											<button class="btn btn-sm btn-danger delete_menu" type="button" data-id="<?php echo $row['id'] ?>">ลบข้อมูล</button>
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
		min-width:120px;
		vertical-align: middle !important;
	}
	td p{
		margin: unset !important;
	}

	b.truncate {
		 overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 3; 
   -webkit-box-orient: vertical;	
    font-size: small;
    color: #000000cf;
    font-style: italic;
}
.pro_Des{
	display:none;
}
</style>
<script>
		$('.text-jqte').jqte();
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#manage-menu').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_menu',
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
	$('.edit_menu').click(function(){
		start_load()
		var cat = $('#manage-menu')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find(".jqte_editor").html($(this).parent('td').find('.pro_Des').html())
		cat.find("[name='name']").val($(this).attr('data-name'))
		cat.find("[name='delprice']").val($(this).attr('data-delprice'))
		cat.find("[name='price']").val($(this).attr('data-price'))
		cat.find("[name='price']").val($(this).attr('data-price'))
		var catid = $(this).attr('data-cat')
		$(cat.find("[name='category_id'] option")).each(function() {
			if($(this).val() == catid) {
				$(this).prop("selected", true);
			}
		});
		if($(this).attr('data-status') == 1)
			$('#availability').prop('checked',true)
		else
			$('#availability').prop('checked',false)

		cat.find("#cimg").attr('src','../assets/img/'+$(this).attr('data-img_path'))
		end_load()
	})
	$('.delete_menu').click(function(){
		_conf("คุณแน่ใจหรือว่าต้องการลบเมนูนี้","delete_menu",[$(this).attr('data-id')])
	})
	function delete_menu($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_menu',
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