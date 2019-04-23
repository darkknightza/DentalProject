<div class="row">
	<div class="contact-caption clearfix">
		<div class="col-md-6 col-md-offset-3 contact-form">
    		<div align="center">
    			<h3>เพิ่มข้อมูลพนักงาน</h3>
    		</div>			
				<form class="form" method="POST" action="/HRController/ADDUser">
					<p align="left" ><font size="4" color="white">ชื่อ-นามสกุล :</font></p> <input type="text" placeholder="ชื่อ-นามสกุล" name="name" required>
					<p align="left" ><font size="4" color="white">Username : </font></p><input type="text" placeholder="ชื่อผู้ใช้" name="username" required>
					<p align="left" ><font size="4" color="white">Password : <label id="alerttext" style="color: red"></label></font></p><input type="password" id="password" placeholder="รหัสผ่าน" name="password" required>
					<p align="left" ><font size="4" color="white">Confirm Password :</font></p><input type="password" id="cpassword" placeholder="ยื่นยันรหัสผ่าน" name="bdate" required>
					<p align="left" ><font size="4" color="white">สถานะ</font></p> 
					<select class="form-control" name="usertype">
					<?php foreach ($data['type'] as $row) {?>
						<option value="<?php echo $row['userType_id'] ?>"><?php echo $row['userType_name'] ?></option>
					<?php } ?>
					</select>
					<input class="submit-btn" id="submit" type="submit" value="SUBMIT">	
				</form>
		</div>
	</div>
</div>
<script>
$( "input[type='password']" ).change(function() {
	var password = $('#password').val();
	var cpassword = $('#cpassword').val();
	if(password != cpassword){
		$("#submit").attr("disabled", true);
		$( "#alerttext" ).text( "รหัสผ่านไม่ตรงกัน" );
	}else{
		$("#submit").attr("disabled", false);
		$( "#alerttext" ).text( "" );
	}
});
</script>