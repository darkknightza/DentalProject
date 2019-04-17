<style>
.medical {
	border-style: solid;
	border-color: black;
	padding-left: 20px;
	padding-right: 20px;
	background-color: white;
}

label {
	text-decoration: underline;
	color: blue;
}

table {
	font-size: 20px;
	text-align: center;
}

th {
	text-align: center;
}

tr #textRow {
	text-decoration: underline;
}
</style>
<div class="row">
	<div class="contact-caption clearfix">
		<div class="container">
			<br>
            <br>
			<div class="medical">
				<div class="row">
					<div class="col-sm-3" align="left">
						<h1>Medical History</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12" align="left">
						<h3>
							Name: <label><?php echo $data['Patient']['patient_name']; ?></label>
						</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3" align="left">
						<h3>
							Height: <label><?php echo $data['Patient']['Height']; ?></label>
						</h3>
					</div>
					<div class="col-sm-3" align="left">
						<h3>
							Weight: <label><?php echo $data['Patient']['Weight']; ?></label>
						</h3>
					</div>
					<div class="col-sm-3" align="left">
						<h3>
							Blood Type: <label><?php echo $data['Patient']['Blood_type']; ?></label>
						</h3>
					</div>
					<div class="col-sm-3" align="left">
						<h3>
							Allergy: <label><?php echo $data['Patient']['Allergic']; ?></label>
						</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12" align="left">
						<h3>
							Additional Comments: <label><?php echo $data['Patient']['CongenitalDetail']; ?></label>
						</h3>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3" align="left">
						<h1>Dental History</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3" align="left">
						<h3>
							Post Treatments: <label></label>
						</h3>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-sm-12">
						<table style="width: 100%;">
							<thead>
								<tr>
									<th></th>
									<th>แผนการรักษา</th>
									<th>ประมาณค่าใช้จ่าย</th>
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
									<td><?php echo $i ?>.</td>
									<td id="textRow"><?php echo $row['treatment_name'] ?></td>
									<td id="textRow"><?php echo $row['totalPrice'] ?> บาท</td>
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
				</div>
				<br>
			</div>
		</div>
	<br>
	</div>
</div>