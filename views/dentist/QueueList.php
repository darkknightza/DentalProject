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
        			<th>รหัสคนไข้</th>
        			<th>ชื่อผู้ป่วย</th>
        			<th>รายการที่ทำ</th>
        			<th>เวลา</th>
        			<th>แพทย์</th>
        			<th>ดูรายละเอียด</th>
        		</tr>
        	</thead>
        	<tbody>
        	<?php foreach ($data['QueueToday'] as $row){ ?>
        		<tr>
        			<td><?php echo $row['patient_id'] ?></td>
        			<td><?php echo $row['patient_name'] ?></td>
        			<td><?php echo $row['detail'] ?></td>
        			<td><?php echo $row['Time_arrive'] ?></td>
        			<td><?php echo $row['name'] ?></td>
        			<td><a href="/DentistController/QueueDetail/<?php echo $row['patient_id'] ?>">ดูรายละเอียด</a></td>
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