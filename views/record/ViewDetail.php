<div class="row">
	<div class="contact-caption clearfix">
		<div class="col-md-6 col-md-offset-3 contact-form">
    		<div align="center">
    			<h3>แก้ไขผู้ใช้</h3>
    		</div>			
				<form class="form" method="POST" action="/HRController/UpdateUser">
					<input type="hidden" name="user_id" value="<?php echo $data['user']['user_id']; ?>">
					<p align="left" ><font size="4" color="white">ชื่อ-นามสกุล :</font></p> <input value="<?php echo $data['user']['name']; ?>" type="text" placeholder="ชื่อ-นามสกุล" name="name" >
					<p align="left" ><font size="4" color="white">สถานะ</font></p> 
					<select class="form-control" name="usertype">
						<option value="<?php echo $data['user']['userType_id']; ?>"><?php echo $data['user']['userType_name']; ?></option>
					<?php foreach ($data['type'] as $row) {?>
						<?php if($data['user']['userType_id'] != $row['userType_id']){ ?>
						<option value="<?php echo $row['userType_id'] ?>"><?php echo $row['userType_name'] ?></option>
						<?php } ?>
					<?php } ?>
					</select>
					<input class="submit-btn" type="submit" value="SUBMIT">	
				</form>
		</div>
	</div>
</div>