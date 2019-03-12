<div class="row">
	<div class="contact-caption clearfix">
		<div class="col-md-6 col-md-offset-3 contact-form">
			<center><h3>แก้ไขรายละเอียดการรักษา</h3></center>				
				<form class="form" method="POST" action="/DentistController/UpdateTreatment">
					<font size="4" color="white"><p align="left" >ชื่อ-สกุล:</p></font> <input class="form-control" type="text" value="<?php echo $data['His']['patient_name']; ?>" placeholder="ชื่อ"  id="fname" name="name" readonly="readonly">
					<input type="hidden" value="<?php echo $data['His']['treatment_history_id']; ?>" name="id">	
					<input type="hidden" value="<?php echo $data['His']['patient_id']; ?>" name="patientid">	
					<font size="4" color="white"><p align="left" >การรักษา:</p></font><input class="form-control" type="text" placeholder="เบอร์ติดต่อ" id="phone" name="treatment_name" value="<?php echo $data['His']['treatment_name']; ?>">
					<font size="4" color="white"><p align="left" >รายละเอียดการรักษา:</p></font><textarea class="form-control" cols="30" rows="10" placeholder="รายละเอียดการรักษา"  name="howtotreatment" ><?php echo $data['His']['HowToTreatment']; ?></textarea>
					<hr>
					<input class="submit-btn" type="submit" value="SUBMIT">	
				</form>
		</div>
	</div>
</div>