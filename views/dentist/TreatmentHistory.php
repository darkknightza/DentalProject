<!-- about section -->
<section class="about text-center" id="about">
	<div class="container">
		<div class="row">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		</div>
	</div>
</section>
<!-- end of about section -->
	<div class="container">
        <table class="table table-bordered" id="dataTable">
        	<thead>
        		<tr>
        			<th>ID</th>
        			<th>รหัสคนไข้</th>
        			<th>Name</th>
        			<th>เบอร์โทร</th>
        			<th>ดูรายละเอียด</th>
        		</tr>
        	</thead>
        	<tbody>
        	<?php $i = 1 ?>
        	<?php foreach ($data['ListTreatmentHis'] as $row){ ?>
        		<tr>
        			<td><?php echo $i ?></td>
        			<td><?php echo $row['patient_id'] ?></td>
        			<td><?php echo $row['patient_name'] ?></td>
        			<td><?php echo $row['tel'] ?></td>
        			<td><a href="/HRController/DeleteUser/<?php echo $row['user_id'] ?>">ดูรายละเอียด</a></td>
        		</tr>
        		<?php $i++ ?>
        	<?php } ?>
        	</tbody>
        </table>
     </div>
<script type="text/javascript">
			//คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
			$(function(){
				//กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
				$('#dataTable').dataTable();
			});
</script>