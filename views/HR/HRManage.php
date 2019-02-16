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
        			<th>Name</th>
        			<th>USERNAME</th>
        			<th>TYPE</th>
        			<th>EDIT</th>
        			<th>DELETE</th>
        		</tr>
        	</thead>
        	<tbody>
        	<?php foreach ($data['alluser'] as $row){ ?>
        		<tr>
        			<td><?php echo $row['user_id'] ?></td>
        			<td><?php echo $row['name'] ?></td>
        			<td><?php echo $row['username'] ?></td>
        			<td><?php echo $row['userType_name'] ?></td>
        			<td>แก้ไข</td>
        			<td>ลบ</td>
        		</tr>
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