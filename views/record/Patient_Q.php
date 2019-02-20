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
        			<th>ชื่อผู้ป่วย</th>
                    <th>แพทย์ผู้นัด</th>
        			<th>เวลานัด</th>
        			<th>เวลาที่มาจริง</th>
        			<th>สถานะ</th>
        			<th>อัพเดตโดย</th>
        			<th>หมายเหตุ</th>
        		</tr>
        	</thead>
        	<tbody>
        	<?php $i = 1 ?>
        	<?php foreach ($data['allQ'] as $row){ ?>
        		<tr>
        			<td><?php echo $i ?></td>
        			<td><?php echo $row['patientName'] ?></td>
                    <td><?php echo $row['dentist'] ?></td>
        			<td><?php echo $row['time'] ?></td>
        			<td><?php echo $row['arrive'] ?></td>
         			<td><a href="/RecordController/ViewDetail/<?php echo $row['patient_id'] ?>">เพิ่มเติม</a></td>
        			<td><a href="/RecordController/ToEditPatientPage/<?php echo $row['patient_id'] ?>">แก้ไข</a></td>
        			<td><a href="/RecordController/ToDeletePatient/<?php echo $row['patient_id'] ?>" onclick="return confirm('Are you sure?')">ลบ</a></td>
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