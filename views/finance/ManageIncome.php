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
		<div class="form-group row">
			<a href="/FinanceController/FormAddIncome" class="btn btn-primary">เพิ่มรายการ</a>
		</div>
		<div class="form-group row">
        <table class="table table-bordered" id="dataTable">
        	<thead>
        		<tr>
        			<th>No.</th>
        			<th>ประเภท</th>
        			<th>รายละเอียด</th>
        			<th>จำนวน</th>
        			<th>แก้ไข</th>
        			<th>ลบ</th>
        		</tr>
        	</thead>
        	<tbody>
        	<?php foreach ($data['AllIncome'] as $key => $row){ ?>
        		<tr>
        			<td><?php echo $key+1  ?></td>
        			<td><?php echo $row['Transaction_type'] ?></td>
        			<td><?php echo $row['Transaction_detail'] ?></td>
        			<td><?php echo $row['amount'] ?></td>
					<td><a href="/FinanceController/FormEditIncome/<?php echo $row['Transaction_id'] ?>">แก้ไข</a></td>
        			<td><a href="/FinanceController/DeleteProduct/<?php echo $row['Transaction_id'] ?>">ลบ</a></td>
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