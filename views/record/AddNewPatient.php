<div class="row">
	<div class="contact-caption clearfix">
		<div class="col-md-6 col-md-offset-3 contact-form">
			<center><h3>ทำบัตรผู้ป่วยรายใหม่</h3></center>				
				<form class="form" method="POST" action="/RecordController/AddNewPatient">
					<font size="4" color="white"><p align="left" >ชื่อ</p></font> <input class="name" type="text" placeholder="ชื่อ" id="fname" name="fname" required>
					<font size="4" color="white"><p align="left" >นามสกุล</p></font> <input class="name" type="text" placeholder="นามสกุล" id="lname" name="lname" required>
					<font size="4" color="white"><p align="left" >เบอร์ติดต่อ</p></font><input class="phone" type="text" placeholder="เบอร์ติดต่อ" id="phone" name="phone" required>
					<font size="4" color="white"><p align="left" >วันเดือนปีเกิด</p></font><input type="date" id="bdate" name="bdate" id="bdate" required>
					<font size="4" color="white"><p align="left" >การแพ้ยา</p></font> <input type="text" placeholder="การแพ้ยา" id="allegic" name="allegic" required>
					<font size="4" color="white"><p align="left" >โรคประจำตัว</p></font> <input type="text" placeholder="โรคประจำตัว" id="contagious" name="contagious" required>
					<font size="4" color="white"><p align="left" >ที่อยู่ติดต่อ</p></font>
					<textarea required class="message" cols="30" rows="10" placeholder="ที่อยู่ติดต่อ" id="location" name="location"></textarea>
					<input class="submit-btn" type="submit" value="SUBMIT">	
				</form>
		</div>
	</div>
</div>