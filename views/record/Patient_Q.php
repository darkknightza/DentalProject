<!-- about section -->

<link rel="stylesheet" href="/public/css/jquery.inputpicker.css" />
<script src="/public/js/jquery.inputpicker.js"></script>
<link href="/public/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<?php if($data['page_type']=='all'){ ?>
<div class="row">
    <div class="contact-caption clearfix">
        <div class="col-md-6 col-md-offset-3 contact-form">
            <div align="center">
                <h3>เพิ่มการนัดหมาย</h3>
            </div>          
                <form class="form" method="POST" action="/RecordController/Add_Q">
                    <p align="left" ><font size="4" color="white">ชื่อคนไข้</font></p> <input id="test" value="" name="patient"/>
                    <p align="left" ><font size="4" color="white">แพทย์ผู้นัดหมาย</font></p>
                        <select name="dentist" class="form-control">
                            <?php foreach($data['Dentist'] as $row){ ?>
                            	<option value="<?php echo $row['user_id'] ?>"><?php echo $row['name'] ?></option>
                        	<?php } ?>
                        </select>
                    <p align="left" ><font size="4" color="white">วันที่นัดหมาย</font></p>
                    <div class="input-group date form_time" data-date="" data-date-format="yyyy-mm-dd hh:ii" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd hh:ii">
                        <input class="form-control" size="16" type="text" value="" name="bdaytime" readonly="readonly">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
    					<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                    </div>
                    <p align="left" ><font size="4" color="white">หมายเหตุ</font></p> 
                    <textarea value="" type="text" placeholder="ชื่อ-นามสกุล" name="detail"> </textarea>
                    <input class="submit-btn" type="submit" value="เพิ่มการนัดหมาย">
                </form>
        </div>
    </div>
</div>
<?php } ?>


<section class="about text-center" id="about">
	<div class="container">
		<div class="row">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		</div>
	</div>
</section>
<!-- end of about section -->

	<div class="container">
        <table class="table table-bordered" id="dataTable" style="width: 100%">
        	<thead>
        		<tr>
        			<th>ID</th>
        			<th style="width: 30%">ชื่อผู้ป่วย</th>
                    <th>แพทย์ผู้นัด</th>
        			<th style="width: 100%">เวลานัด</th>
        			<th>เวลาทำรายการ</th>
        			<th>สถานะ</th>
        			<th>อัพเดตโดย</th>
        			<th>หมายเหตุ</th>
                    <th>เบอร์ติดต่อ</th>
        		</tr>
        	</thead>
        	<tbody>
        	<?php $i = 1 ?>
        	<?php foreach ($data['allQ'] as $row){ ?>
        		<tr>
        			<td><?php echo $i ?></td>
        			<td><?php echo $row['patientName'] ?></td>
                    <td><select onchange="UpdateDentist(this.value,<?php echo $row['t_id'] ?>)">
                    <option value="<?php echo $row['UserId'] ?>"><?php echo $row['dentist'] ?></option>
                    <?php foreach($data['Dentist'] as $value){ ?>
                    	<?php if($row['UserId'] != $value['user_id']){ ?> 
                    		<option value="<?php echo $value['user_id'] ?>"><?php echo $value['name'] ?></option>
                    	<?php } ?>
                    <?php } ?>
                    </select>
                    </td>
        			<td>
            			<div class="input-group date form_time" data-date="" data-date-format="yyyy-mm-dd hh:ii" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd hh:ii">
                            <input class="form-control" size="16" type="text" value="<?php echo $row['time'] ?>" name="bdaytime" readonly="readonly" onchange="UpdateTime(this.value,<?php echo $row['t_id'] ?>)">
        					<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        					<span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                        </div>
                    </td>
        			<td><?php echo $row['arrive'] ?></td>
         			<td><select id="select<?php echo $i ?>" onchange="UpdateStatus(this.value,<?php echo $row['t_id'] ?>)">
                    	<option style="color:<?php echo $row['color'] ?>" value="<?php echo $row['status_id'] ?>"><?php echo $row['status'] ?></option>
                    <?php foreach($data['Q_Status'] as $value){ ?>
                    	<?php if($row['status_id'] != $value['status_id']){ ?> 
                    		<option style="color:<?php echo $value['color'] ?>" value="<?php echo $value['status_id'] ?>"><?php echo $value['status_name'] ?></option>
                    	<?php } ?>
                    <?php } ?>
                    </select>
         			</td>
        			<td><?php echo $row['UpdateBy'] ?></td>
        			<td><?php echo $row['detail'] ?></td>
                    <td><?php echo $row['tel'] ?></td>
        		</tr>
        		<?php $i++ ?>
        	<?php } ?>
        	</tbody>
        </table>
     </div>
<script type="text/javascript">
			//คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
			$(function(){
				//กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
				$('#dataTable').dataTable();
			});
</script>
<script type="text/javascript" src="/public/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/public/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script>
function UpdateDentist(value,id){
	$.ajax({
        method: "POST",
        url: "/RecordController/EditDentistByAjax",
        cache: false,
        data: { dentist:value,Qid:id },
        success: function(data){
            if(data){
            	//alert("ทำรายการสำเร็จ");
            }else{
            	//alert("ทำรายการไม่สำเร็จ");
            }
        }
    });
}
function UpdateTime(value,id){
	$.ajax({
        method: "POST",
        url: "/RecordController/EditTimeByAjax",
        cache: false,
        data: { Time:value,Qid:id },
        success: function(data){
            if(data){
            	//alert("ทำรายการสำเร็จ");
            }else{
            	//alert("ทำรายการไม่สำเร็จ");
            }
        }
    });
}
function UpdateStatus(value,id){
	$.ajax({
        method: "POST",
        url: "/RecordController/EditStatusByAjax",
        cache: false,
        data: { StatusId:value,Qid:id },
        success: function(data){
            if(data){
            	//alert("ทำรายการสำเร็จ");
            }else{
            	//alert("ทำรายการไม่สำเร็จ");
            }
            location.reload();
        }
    });
}
var countQ = <?php echo count($data['allQ']) ?>;
<?php foreach($data['allQ'] as $key => $value){ ?>
	$('#select'+<?php echo $key+1 ?>).css('color','<?php echo $value['color'] ?>');
<?php } ?>
// for(var i=1;i<=countQ;i++){
// 	$('#select'+i).css('color','red');	
// 	$('#select'+i).change(function() {
// 	    var current = $('#select'+i).val();
// 	    if (current != 'null') {
// 	    	$('#select'+i).css('color','black');
// 	    } else {
// 	    	$('#select'+i).css('color','red');
// 	    }
// 	}); 
// }
$('#test').inputpicker({
    data:[
    {value:"",text:""},
    <?php foreach($data['allPatient'] as $row){ ?>
        {value:"<?php echo $row['patient_id'] ?>",text:"<?php echo $row['patient_name'] ?>"},
        <?php } ?>
        {}
    ],
    fields:['value','text'],
    fieldText : 'text',
    headShow: 0,
    filterOpen: true,
    autoOpen: true
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
</script>



