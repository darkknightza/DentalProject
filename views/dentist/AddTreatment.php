<div class="row">
	<div class="contact-caption clearfix">
		<div class="col-md-6 col-md-offset-3 contact-form">
			<center><h3>เพิ่มรายละเอียดการรักษา</h3></center>				
				<form class="form" method="POST" action="/DentistController/SubmitTreatment">
					<font size="4" color="white"><p align="left" >ชื่อ-สกุล:</p></font> <input class="form-control" type="text" value="<?php echo $data['Patient']['patient_name']; ?>" placeholder="ชื่อ"  id="fname" name="name" readonly="readonly">
					<input type="hidden" value="<?php echo $data['Patient']['patient_id']; ?>" name="id">
					<input type="hidden" value="<?php echo $data['QueueToday']['treatment_Q_id']; ?>" name="treatment_Q_id">
					
					<font size="4" color="white"><p align="left" >การรักษา:</p></font><input class="form-control" type="text" placeholder="เบอร์ติดต่อ" id="phone" name="treatment_name" value="<?php echo $data['QueueToday']['detail']; ?>" readonly="readonly">
					<font size="4" color="white"><p align="left" >รายละเอียดการรักษา:</p></font><textarea class="form-control" cols="30" rows="10" placeholder="รายละเอียดการรักษา"  name="howtotreatment"></textarea>
					<font size="4" color="white"><p align="left" >ไฟล์เอกสาร</p></font> <input class="form-control" type="file" placeholder="การแพ้ยา" id="allegic" name="fileupload">
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
    							<?php foreach ( $data['product'] as $key => $row){ ?>
    							<tr>
    								<td><input type="checkbox" value="<?php echo $row['product_id'] ?>" name="product<?php echo $key  ?>"></td>
    								<td><?php echo $row['productName'] ?></td>
    								<td><input type="number" name="price<?php echo $key  ?>" id="price" value="<?php echo $row['Price'] ?>" placeholder="ราคา"></td>
    								<td><input type="number" name="amount<?php echo $key  ?>" id="amount" value="1" placeholder="จำนวน"></td>
    							</tr>
    							<?php } ?>
    						</tbody>
    					</table>
    					</div>
 						

					</div>
					<hr>
					<div class="form-group row">
    					<div class="col-md-1">
    						<input type="checkbox" value="1" name="appoint" id="appoint">
    					</div>
    					<div class="col-md-2">
    						<br>
    						<label style="color: white;">นัดหมาย</label>
    					</div>
					</div>
					<div class="form-group row" id="appointDIV">
						<font size="4" color="white"><p align="left">การนัดครั้งหน้า</p></font>
    					<div class="col-md-12">
    					<input type="datetime-local" class="form-control" name="datetime">
    					</div>
    					<font size="4" color="white"><p align="left">รายละเอียด</p></font>
    					<div class="col-md-12">
    					<textarea rows="" cols="" name="detail"></textarea>
    					</div>
					</div>
					<br>
					<input class="submit-btn" type="submit" value="SUBMIT">	
				</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	//คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
	$(function(){
		//กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
		$('#dataTable').dataTable({
			  "pageLength": 50
		});
		$("#appointDIV").hide();	
	});
	$( "#appoint" ).change(function() {
		if($('#appoint:checked').val()==1){
			$("#appointDIV").show();	
		}else{
			$("#appointDIV").hide();		
		}
		
	});
</script>