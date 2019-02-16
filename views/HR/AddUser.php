<div class="row">
	<div class="contact-caption clearfix">
		<div class="col-md-6 col-md-offset-3 contact-form">
    		<div align="center">
    			<h3>ทำบัตรผู้ป่วยรายใหม่</h3>
    		</div>			
				<form class="form" method="POST" action="/HRController/ADDUser">
					<p align="left" ><font size="4" color="white">ชื่อ-นามสกุล :</font></p> <input type="text" placeholder="ชื่อ-นามสกุล" name="name" required>
					<p align="left" ><font size="4" color="white">Username :</font></p><input type="text" placeholder="ชื่อผู้ใช้" name="username" required>
					<p align="left" ><font size="4" color="white">Password :</font></p><input type="password" id="bdate" placeholder="รหัสผ่าน" name="password" required>
					<p align="left" ><font size="4" color="white">Confirm Password :</font></p><input type="password" id="bdate" placeholder="ยื่นยันรหัสผ่าน" name="bdate" required>
					<p align="left" ><font size="4" color="white">สถานะ</font></p> 
					<select class="form-control" name="usertype">
					<?php foreach ($data['type'] as $row) {?>
						<option value="<?php echo $row['userType_id'] ?>"><?php echo $row['userType_name'] ?></option>
					<?php } ?>
					</select>
					<input class="submit-btn" type="submit" value="SUBMIT">	
				</form>
		</div>
	</div>
</div>