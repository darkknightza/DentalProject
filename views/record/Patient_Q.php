<!-- about section -->

<link rel="stylesheet" href="/public/css/jquery.inputpicker.css" />
<script src="/public/js/jquery.inputpicker.js"></script>
<div class="row">
    <div class="contact-caption clearfix">
        <div class="col-md-6 col-md-offset-3 contact-form">
            <div align="center">
                <h3>เพิ่มการนัดหมาย</h3>
            </div>          
                <form class="form" method="POST" action="/RecordController/Add_Q">
                    <p align="left" ><font size="4" color="white">ชื่อคนไข้</font></p> <input id="test" value=" " name="patient"/>
                    <p align="left" ><font size="4" color="white">แพทย์ผู้นัดหมาย</font></p> <input id="test2" value=" " name="dentist"/>
                    <p align="left" ><font size="4" color="white">วันที่นัดหมาย</font></p><input type="datetime-local" name="bdaytime" required="">
                    <p align="left" ><font size="4" color="white">หมายเหตุ</font></p> 
                    <textarea value="" type="text" placeholder="ชื่อ-นามสกุล" name="detail"> </textarea>
                    <input class="submit-btn" type="submit" value="เพิ่มการนัดหมาย">
                </form>
        </div>
    </div>
</div>


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
        <table class="table table-bordered" id="dataTable">
        	<thead>
        		<tr>
        			<th>ID</th>
        			<th>ชื่อผู้ป่วย</th>
                    <th>แพทย์ผู้นัด</th>
        			<th>เวลานัด</th>
        			<th>เวลาที่มาจริง</th>
        			<th>สถานะ</th>
        			<th>อัพเดตโดย</th>
        			<th>หมายเหตุ</th>
                    <th>การจัดการ</th>
        		</tr>
        	</thead>
        	<tbody>
        	<?php $i = 1 ?>
        	<?php foreach ($data['allQ'] as $row){ ?>
        		<tr>
        			<td><?php echo $i ?></td>
        			<td><?php echo $row['patientName'] ?></td>
                    <td><?php echo $row['dentist'] ?></td>
        			<td><?php echo $row['time'] ?></td>
        			<td><?php echo $row['arrive'] ?></td>
         			<td><p style="color: <?php echo $row['color'] ?>"><?php echo $row['status'] ?>  </p></a></td>
        			<td><?php echo $row['UpdateBy'] ?></td>
        			<td><?php echo $row['detail'] ?></td>
                    <td><a href="/RecordController/EditStatus/<?php echo $row['t_id'] ?>">จัดการ</td>
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

<script>
$('#test').inputpicker({
    data:[
    <?php foreach($data['allPatient'] as $row){ ?>
        {value:"<?php echo $row['patient_id'] ?>",text:"<?php echo $row['patient_name'] ?>"},
        <?php } ?>
        {}
    ],
    fields:['value','text'],
    fieldText : 'text',
    headShow: true,
    filterOpen: true,
    autoOpen: true
});

$('#test2').inputpicker({
    data:[
    <?php foreach($data['Dentist'] as $row){ ?>
        {value:"<?php echo $row['user_id'] ?>",text:"<?php echo $row['name'] ?>"},
        <?php } ?>
        {}
    ],
    fields:['value','text'],
    fieldText : 'text',
    headShow: true,
    filterOpen: true,
    autoOpen: true
});
</script>