<div class="row">
	<div class="contact-caption clearfix">
		<div class="col-md-6 col-md-offset-3 contact-form">
			<center><h3>เพิ่มรายละเอียดการรักษา</h3></center>				
				<form class="form" method="POST" action="/FinanceController/SubmitBill">
					<font size="4" color="white"><p align="left" >ชื่อ-สกุล:</p></font> <input class="form-control" type="text" value="<?php echo $data['getBillDetail']['patient_name']; ?>" placeholder="ชื่อ"  id="fname" name="name" readonly="readonly">
					<input type="hidden" value="<?php echo $data['getBillDetail']['treatment_history_id']; ?>" name="id">	
					<input type="hidden" value="<?php echo $data['getBillDetail']['treatment_Q_id']; ?>" name="treatment_Q_id">	
					<font size="4" color="white"><p align="left" >การรักษา:</p></font><input class="form-control" type="text" placeholder="เบอร์ติดต่อ" id="phone" name="treatment_name" value="<?php echo $data['getBillDetail']['treatment_name']; ?>" readonly="readonly">
					<font size="4" color="white"><p align="left" >รายละเอียดการรักษา:</p></font><textarea class="form-control" cols="30" rows="10" placeholder="รายละเอียดการรักษา"  name="howtotreatment" readonly="readonly"><?php echo $data['getBillDetail']['HowToTreatment']; ?></textarea>
					<hr>
					<div class="form-group row">
    					<div class="col-md-12">
    					<table border="1" id="dataTable">
    						<thead>
    							<tr>
    								<th>เลือก</th>
    								<th>ชื่อรายการที่ทำ</th>
    								<th>ราคา</th>
    								<th>จำนวน</th>
    							</tr>
    						</thead>
    						<tbody>
    							<?php $i = 0; ?>
    							<?php foreach ( $data['getProductLog'] as $key => $row){ ?>
    							<tr>
    								<td><input type="checkbox" value="<?php echo $row['product_id'] ?>" checked="checked" name="product<?php echo $i  ?>"></td>
    								<td><?php echo $row['productName'] ?></td>
    								<td><input type="number" name="price<?php echo $i  ?>" id="price" value="<?php echo $row['Price'] ?>" placeholder="ราคา"></td>
    								<td><input type="number" name="amount<?php echo $i  ?>" id="amount" value="1" placeholder="จำนวน"></td>
    							</tr>
    							
    							<?php $i++; } ?>
    							<?php foreach ( $data['arrayProtductNochoose'] as $key => $row){ ?>
    							<tr>
    								<td><input type="checkbox" value="<?php echo $row['product_id'] ?>" name="product<?php echo $i  ?>"></td>
    								<td><?php echo $row['productName'] ?></td>
    								<td><input type="number" name="price<?php echo $i  ?>" id="price" value="<?php echo $row['Price'] ?>" placeholder="ราคา"></td>
    								<td><input type="number" name="amount<?php echo $i  ?>" id="amount" value="1" placeholder="จำนวน"></td>
    							</tr>
    							<?php $i++; } ?>
    						</tbody>
    					</table>
    					</div>
 						

					</div>
					<hr>
					<input class="submit-btn" type="submit" value="SUBMIT">	
				</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	//คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
	$(function(){
		//กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
		$('#dataTable').dataTable();
	});
	$( "#appoint" ).change(function() {
				
	});
</script>