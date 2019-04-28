

<link rel="stylesheet" href="/public/css/picker.min.css">
<script type="text/javascript" src="/public/js/picker.min.js"></script>
<link href="/public/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<div class="row">

	<div class="contact-caption clearfix">

		<img src="/public/img/th_pic.jpg" class="rounded mx-auto d-block" alt="...">

		<div class="col-md-6 col-md-offset-3 contact-form">

			<center><h3>เพิ่มรายละเอียดการรักษา</h3></center>


				<form  method="POST" action="/DentistController/SubmitTreatment" enctype="multipart/form-data" runat="server">
					
					<font size="4" color="white"><p align="left" >ชื่อ-สกุล:</p></font> <input class="form-control" type="text" value="<?php echo $data['Patient']['patient_name']; ?>" placeholder="ชื่อ"  id="fname" name="name" readonly="readonly">
					<input type="hidden" value="<?php echo $data['Patient']['patient_id']; ?>" name="id">
					<input type="hidden" value="<?php echo $data['QueueToday']['treatment_Q_id']; ?>" name="treatment_Q_id">
					
					<font size="4" color="white"><p align="left" >การรักษา:</p></font><input class="form-control" type="text" placeholder="เบอร์ติดต่อ" id="phone" name="treatment_name" value="<?php echo $data['QueueToday']['detail']; ?>" readonly="readonly">

					<!-- <p align="left" ><font size="4" color="white">ประเภทการรักษา</font></p> 
                    <select value="<?php echo $data['Q_Detail']['status'] ?>" name="status" align="left" class="form-control">
                        <option value="1">ยังไม่มา</option>
                        <option value="2">รอพบแพทย์</option>
                        <option value="3">รอจ่ายเงิน</option>
                        <option value="4">ยกเลิกนัด</option>
                        <option value="5">เสร็จสิ้น</option>
                    </select> -->

<p align="left" ><font size="4" color="white">ระบุตำแหน่งการรักษา</font></p>
<p style="color: white">M = ฟันที่ถอน / ผ่าฟันคุดครั้งนี้ , F = ฟันที่อุดครั้งนี้ , A = ฟันเทียมชนิดถอดได้</p>

                   <select name="point[]" id="ex-search" multiple align="left" class="form-control">
                   	<?php 
                   	$t = 1;
                   	$t_name = 'M';
                   	while($t<33){ ?>
                        <option value="<?php echo $t_name.$t ?>"><?php echo $t_name.$t ?></option>
                        
                        <?php 
                        $t++;
                        if($t==33){
                        	
                        	if($t_name == 'M'){
                        		$t=1;
                        		$t_name = 'F';
                        	}else if($t_name == 'F'){
                        		$t=1;
                        		$t_name = 'A';
                        	}else{

                        	}
                        }

                    } ?>
                    </select>

                    
                    
                    <br>

					<font size="4" color="white"><p align="left" >รายละเอียดการรักษา:</p></font><textarea class="form-control" cols="30" rows="10" placeholder="รายละเอียดการรักษา"  name="howtotreatment"></textarea>
					<font size="4" color="white"><p align="left" >ไฟล์เอกสาร</p></font> <input class="form-control" type="file" placeholder="การแพ้ยา" id="allegic" name="fileupload">
					<hr>
					<div class="form-group row">
    					<div class="col-md-12">
    					<table border="1" id="dataTable">
    						<thead>
    							<tr>
    								<th>เลือก</th>
    								<th>ชื่อรายการที่ทำ</th>
    								<th>ราคา</th>
    								<th>จำนวน</th>
    							</tr>
    						</thead>
    						<tbody>
    							<?php foreach ( $data['product'] as $key => $row){ ?>
    							<tr>
    								<td><input type="checkbox" value="<?php echo $row['product_id'] ?>" name="product<?php echo $key  ?>"></td>
    								<td><?php echo $row['productName'] ?></td>
    								<td><input type="number" name="price<?php echo $key  ?>" id="price" value="<?php echo $row['Price'] ?>" placeholder="ราคา" step="0.01"></td>
    								<td><input type="number" name="amount<?php echo $key  ?>" id="amount" value="1" placeholder="จำนวน"></td>
    							</tr>
    							<?php } ?>
    						</tbody>
    					</table>
    					</div>
 						

					</div>
					<hr>
					<div class="form-group row">
    					<div class="col-md-1">
    						<input type="checkbox" value="1" name="appoint" id="appoint">
    					</div>
    					<div class="col-md-2">
    						<br>
    						<label style="color: white;">นัดหมาย</label>
    					</div>
					</div>
					<div class="form-group row" id="appointDIV">
						<font size="4" color="white"><p align="left">การนัดครั้งหน้า</p></font>
    					<div class="col-md-12">
        					<div class="input-group date form_time" data-date="" data-date-format="yyyy-mm-dd hh:ii" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd hh:ii">
                                <input class="form-control" size="16" type="text" value="" name="datetime" readonly="readonly">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            					<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                            </div>
    					</div>
    					<font size="4" color="white"><p align="left">รายละเอียด</p></font>
    					<div class="col-md-12">
    					<textarea rows="" cols="" name="detail"></textarea>
    					</div>
					</div>
					<br>
					<input class="submit-btn" type="submit" value="SUBMIT">	
				</form>
		</div>
	</div>
</div>
<script type="text/javascript" src="/public/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/public/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
	//คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
	$(function(){
		//กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
		$('#dataTable').dataTable({
			  "pageLength": 50
		});
		$("#appointDIV").hide();	
	});
	$( "#appoint" ).change(function() {
		if($('#appoint:checked').val()==1){
			$("#appointDIV").show();	
		}else{
			$("#appointDIV").hide();		
		}
		
	});
	$('.form_time').datetimepicker({
	    language:  'th',
	    weekStart: 1,
	    todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 0,
		maxView: 1,
		forceParse: 0
	});
	$('#ex-search').picker({search : true});
</script>