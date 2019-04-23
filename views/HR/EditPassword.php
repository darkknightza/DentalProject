<div class="row">
	<div class="contact-caption clearfix">
		<div class="col-md-6 col-md-offset-3 contact-form">
    		<div align="center">
    			<h3>แก้ไขรหัสผ่าน</h3>
    		</div>			
				<form class="form" method="POST" action="/HRController/UpdatePassword">
					<input type="hidden" name="user_id" value="<?php echo $data['user']['user_id']; ?>">
					<p align="left" ><font size="4" color="white">Password : <label id="alerttext" style="color: red"></label></font></p><input type="password" id="password" placeholder="รหัสผ่าน" name="password" required>
					<p align="left" ><font size="4" color="white">Confirm Password :</font></p><input type="password" id="cpassword" placeholder="ยื่นยันรหัสผ่าน" name="bdate" required>
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