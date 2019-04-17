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
				<?php if($data['type']){ ?>
				<br>
				<div class="row">
                    <div class="col-md-12 contact-form" align="center">
                        	<a href="/DentistController/FormTreatment/<?php echo $data['Patient']['patient_id'];  ?>" class="btn btn-info">เพิ่มรายละเอียดการรักษา</a>
                    </div>
                </div>
                <?php } ?>
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
					<div class="col-sm-8">
						<table style="width: 100%;">
							<thead>
								<tr>
									<th></th>
									<th>แผนการรักษา</th>
									<th>ประมาณค่าใช้จ่าย</th>
								</tr>
							</thead>
							<tbody>
        	<?php $i = 1 ?>
        	<?php foreach ($data['History'] as $row){ ?>
        				<tr>
									<td><?php echo $i ?>.</td>
									<td id="textRow"><?php echo $row['treatment_name'] ?></td>
									<td id="textRow"><?php echo $row['totalPrice'] ?> บาท</td>
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

<!-- end of about section -->
<script type="text/javascript">
    $( "#print" ).click(function() {
        window.print();
    });
</script>