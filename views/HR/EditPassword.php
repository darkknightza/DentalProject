<div class="row">
	<div class="contact-caption clearfix">
		<div class="col-md-6 col-md-offset-3 contact-form">
    		<div align="center">
    			<h3>แก้ไขรหัสผ่าน</h3>
    		</div>			
				<form class="form" method="POST" action="/HRController/UpdatePassword">
					<input type="hidden" name="user_id" value="<?php echo $data['user']['user_id']; ?>">
					<p align="left" ><font size="4" color="white">Password :</font></p><input type="password" id="bdate" placeholder="รหัสผ่าน" name="password" required>
					<p align="left" ><font size="4" color="white">Confirm Password :</font></p><input type="password" id="bdate" placeholder="ยื่นยันรหัสผ่าน" name="bdate" required>
					<input class="submit-btn" type="submit" value="SUBMIT">	
				</form>
		</div>
	</div>
</div>