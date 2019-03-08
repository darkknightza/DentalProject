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
        			<th>ประเภท</th>
                    <th>รายละเอียด</th>
        			<th>จำนวน</th>
        			<th>เพิ่มโดย</th>
        			
        		</tr>
        	</thead>
        	<tbody>
        	<?php $i = 1 ?>
        	<?php foreach ($data['allTransaction'] as $row){ ?>
        		<tr>
        			<td><?php echo $i ?></td>

                    <?php if($row['Transaction_type']=='รับ'){ ?>



                    <td> <p style="color: green"><?php echo $row['Transaction_type'] ?></p></td>

                    <?php }if($row['Transaction_type']=='จ่าย'){ ?>


                    <td> <p style="color: red"><?php echo $row['Transaction_type'] ?></p></td>

                    <?php } ?>



                    <td><?php echo $row['Transaction_detail'] ?></td>
        			<td><?php echo $row['amount'] ?></td>
        			<td><?php echo $row['UpdateBy'] ?></td>
         			
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