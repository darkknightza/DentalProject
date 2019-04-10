
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<link rel="stylesheet" href="/public/css/jquery.inputpicker.css" />
<script src="/public/js/jquery.inputpicker.js"></script>



<div class="row">
	<div class="contact-caption clearfix">
		<div class="col-md-6 col-md-offset-3 contact-form">
			<center><h3>ทำบัตรผู้ป่วยรายใหม่</h3></center>				
				<form class="form" method="POST" action="/RecordController/AddPatient">
					<font size="4" color="white"><p align="left" >ชื่อ</p></font> <input class="name" type="text" placeholder="ชื่อ" id="fname" name="fname" required maxlength="20">
					<font size="4" color="white"><p align="left" >นามสกุล</p></font> <input class="name" type="text" placeholder="นามสกุล" id="lname" name="lname" required maxlength="25">
					<font size="4" color="white"><p align="left" >ชื่อเล่น</p></font> <input class="name" type="text" placeholder="ชื่อเล่น" id="nickname" name="nickname" required>
					<font size="4" color="white"><p align="left" >รหัสประจำตัวประชาชน</p></font> <input class="name" type="text" placeholder="เลขประจำตัวประชาชน" id="personal_ID" name="personal_ID" required maxlength="13">
					<font size="4" color="white"><p align="left" >ที่อยู่ติดต่อ</p></font>
					<textarea required class="message" cols="30" rows="10" placeholder="ที่อยู่ติดต่อ" id="location" name="location" maxlength="100"></textarea>
					<font size="4" color="white"><p align="left" >สัญชาติ</p></font><input class="phone" type="text" placeholder="สัญชาติ" id="phone" name="nation" required maxlength="100">
					<font size="4" color="white"><p align="left" >อาชีพ</p></font><input class="phone" type="text" placeholder="อาชีพ" id="phone" name="Occupation" required maxlength="100">
					<font size="4" color="white"><p align="left" >เบอร์ติดต่อ</p></font><input class="phone" type="text" placeholder="เบอร์ติดต่อ" id="phone" name="phone" required maxlength="10">

					<font size="4" color="white"><p align="left" >อีเมล์</p></font><input class="phone" type="email" placeholder="อีเมล์" id="phone" name="email" required maxlength="100">

					
					<font size="4" color="white"><p align="left" >การแพ้ยา</p></font> <input type="text" placeholder="การแพ้ยา" id="allegic" name="allegic" required maxlength="100">
					<font size="4" color="white"><p align="left" >โรคประจำตัว</p></font> <input type="text" placeholder="โรคประจำตัว" id="contagious" name="contagious" required maxlength="100">

					<font size="4" color="white"><p align="left" >วันเดือนปีเกิด</p></font><input type="date" id="bdate" name="bdate" id="bdate" required>

					<font size="4" color="white"><p align="left" >น้ำหนัก</p></font><input class="phone" type="number" placeholder="น้ำหนัก" id="phone" name="weight" required maxlength="10">

					<font size="4" color="white"><p align="left" >ส่วนสูง</p></font><input class="phone" type="number" placeholder="ส่วนสูง" id="phone" name="height" required maxlength="10">

					<p align="left" ><font size="4" color="white">หมู่เลือด</font></p> 
                    <select value="" name="blood_type" align="left" class="form-control">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>
                    <br>


                    <font size="4" color="white"><p align="center" >พบแพทย์ทันที</p></font><input type="checkbox" checked id="phone" name="height" class="btn" >
                 <!-- <div class="dentist" style="display:none;"> -->
                 	<div class="dentist">
                    <p align="left" ><font size="4" color="white">แพทย์ผู้รับผิดชอบ</font></p>
                    <select  name="dentist" align="left" class="form-control">
                        <?php foreach($data['Dentist'] as $row){ ?>
                        <option value="<?php echo $row['user_id'] ?>"><?php echo $row['name'] ?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <br>
					<input class="submit-btn" type="submit" value="SUBMIT">	
				</form>
		</div>
	</div>
</div>

<script>
$(document).ready(function(){
  $(".btn").click(function(){
  		$(".dentist").toggle();
  });
  
});

// $('#test2').inputpicker({
//     data:[
//     {value:"",text:""},
//     <?php foreach($data['Dentist'] as $row){ ?>
//         {value:"<?php echo $row['user_id'] ?>",text:"<?php echo $row['name'] ?>"},
//         <?php } ?>
//         {}
//     ],
//     fields:['value','text'],
//     fieldText : 'text',
//     headShow: 0,
//     filterOpen: true,
//     autoOpen: true
// });
</script>