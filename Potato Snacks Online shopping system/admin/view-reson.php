
	<?php
	include '../config/db_connect.php';
    $qry = $conn->query("SELECT * FROM orders where odrId =".$_GET['odrId'])->fetch_array();
	?>
	<div class="table-responsive">
	<table class="table table-bordered">
		<tbody>		
			<tr>
                <td>
                    <?php echo $qry['cnclreson'];?>
                </td>
			</tr>
		</tbody>
	</table>
	</div>
<style>
	#uni_modal .modal-footer{
		display: none
	}
</style>