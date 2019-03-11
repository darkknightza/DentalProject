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
		<!-- <div class="form-group row">
			<a href="/FinanceController/FormAddProduct" class="btn btn-primary">เพิ่มรายการรักษา</a>
		</div> -->
		<div class="form-group row">
        <table class="table table-bordered" id="dataTable">
        	<thead>
        		<tr>
        			<th>No.</th>
        			<th>ชื่อ-สกุล</th>
        			<th>รายการ</th>
        			<th>รายละเอียด</th>
        			<th>ดูรายละเอียดบิล</th>
        		</tr>
        	</thead>
        	<tbody>
        	<?php foreach ($data['getBill'] as $key => $row){ ?>
        		<tr>
        			<td><?php echo $key+1  ?></td>
        			<td><?php echo $row['patient_name'] ?></td>
        			<td><?php echo $row['treatment_name'] ?></td>
        			<td><?php echo $row['HowToTreatment'] ?></td>
					<td><a href="/FinanceController/PrintBill/<?php echo $row['treatment_Q_id'] ?>">ดูรายละเอียดบิล</a></td>
        		</tr>
        	<?php } ?>
        	</tbody>
        </table>
        </div>
     </div>
<script type="text/javascript">
			//คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
			$(function(){
				//กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
				$('#dataTable').dataTable();
			});
</script>