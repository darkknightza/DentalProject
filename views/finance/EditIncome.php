<div class="row">
	<div class="contact-caption clearfix">
		<div class="col-md-6 col-md-offset-3 contact-form">
    		<div align="center">
    			<h3>เพิ่มรายการ</h3>
    		</div>			
				<form class="form" method="POST" action="/FinanceController/UpdateIncome">
					<input type="hidden" value="<?php echo $data['Income']['Transaction_id']; ?>" name="id">
					<p align="left" ><font size="4" color="white">ประเภท</font></p> 
					<select class="form-control" name="Income">
						<option value="1">รายรับ</option>
						<option value="2">รายจ่าย</option>
					</select>
					<p align="left" ><font size="4" color="white">รายละเอียด</font></p> 
					<input type="text" placeholder="รายละเอียด" name="detail" value="<?php echo $data['Income']['Transaction_detail']; ?>">
					<p align="left" ><font size="4" color="white">จำนวน</font></p> 
					<input type="number" placeholder="จำนวน" name="amount" value="<?php echo $data['Income']['amount']; ?>" step="0.01">
					<input class="submit-btn" type="submit" value="บันทึก">	
				</form>
		</div>
	</div>
</div>