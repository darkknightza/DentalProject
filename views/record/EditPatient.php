<div class="row">
	<div class="contact-caption clearfix">
		<div class="col-md-6 col-md-offset-3 contact-form">
    		<div align="center">
    			<h3>แก้ไขข้อมูลผู้ป่วย</h3>
    		</div>			
				<form class="form" method="POST" action="/RecordController/UpdatePatient">
					<input type="hidden" name="Patient_id" value="<?php echo $data['Patient']['patient_id']; ?>">
					<p align="left" ><font size="4" color="white">ชื่อ-นามสกุล :</font></p> <input value="<?php echo $data['Patient']['patient_name']; ?>" type="text" placeholder="ชื่อ-นามสกุล" name="name" >
					<p align="left" ><font size="4" color="white">ที่อยู่</font></p> 
						<input value="<?php echo $data['Patient']['location']; ?>" type="text" placeholder="ที่อยู่" name="location" >
						<p align="left" ><font size="4" color="white">โทร</font></p> 
						<input value="<?php echo $data['Patient']['tel']; ?>" type="text" placeholder="ที่อยู่" name="tel" >
						<p align="left" ><font size="4" color="white">อาการแพ้</font></p> 
						<input value="<?php echo $data['Patient']['Allergic']; ?>" type="text" placeholder="อาการแพ้" name="Allergic" >
						<p align="left" ><font size="4" color="white">รายละเอียดอาการที่เป็นแต่กำเนิด</font></p> 
						<input value="<?php echo $data['Patient']['CongenitalDetail']; ?>" type="text" placeholder="รายละเอียดอาการที่เป็นแต่กำเนิด" name="CongenitalDetail" >
					<input class="submit-btn" type="submit" value="บันทึก">	
				</form>
		</div>
	</div>
</div>