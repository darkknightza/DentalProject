<div class="row">
	<div class="contact-caption clearfix">
		<div class="col-md-6 col-md-offset-3 contact-form">
    		<div align="center">
    			<h3><?php echo $data['Patient']['patient_name']; ?></h3>
    		</div>			
			<p align="left" ><font size="4" color="white">อาการแพ้ :</font></p> <input value="<?php echo $data['Patient']['Allergic']; ?>" type="text" placeholder="ชื่อ-นามสกุล" name="name" disabled>
			<p align="left" ><font size="4" color="white">รายละเอียดการแพ้</font></p> 
			<textarea value="<?php echo $data['Patient']['CongenitalDetail']; ?>" type="text" placeholder="ชื่อ-นามสกุล" name="name" disabled><?php echo $data['Patient']['CongenitalDetail']; ?> </textarea>
		</div>
	</div>
</div>

<!-- about section -->
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
        			<th>อาการ</th>
        			<th>การรักษา</th>
        			<th>แพทย์ผู้รับผิดชอบ</th>
        			<th>เวลา</th>
        			<th>แก้ไข</th>
        			<th>ลบ</th>
                    <th>ไฟล์ x-ray</th>
        		</tr>
        	</thead>
        	<tbody>
        	<?php $i = 1 ?>
        	<?php foreach ($data['History'] as $row){ ?>
        		<tr>
        			<td><?php echo $i ?></td>
        			<td><?php echo $row['treatment_name'] ?></td>
        			<td><?php echo $row['HowToTreatment'] ?></td>
        			<td><?php echo $row['name'] ?></td>
        			<td><?php echo $row['treatment_history_date'] ?></td>
        			<td><a href="/DentistController/FormEditTreatment/<?php echo $row['treatment_history_id'] ?>" >แก้ไข</a></td>
        			<td><a href="/DentistController/DeleteTreatment/<?php echo $row['treatment_history_id'] ?>" onclick="return confirm('คุณต้องการลบ?');">ลบ</a></td>
                    <?php if($row['file']==''){ ?>
                    <td><a href="/DentistController/LookX_rey/DF.png">ดูรูป X-ray</a></td>

                    <?php }else{ ?>
                    <td><a href="/DentistController/LookX_rey/<?php echo $row['file']?>">ดูรูป X-ray</a></td>

                    <?php } ?>
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