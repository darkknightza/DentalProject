
<!-- end of about section -->

<div class="row">
    <div class="contact-caption clearfix">
        <div class="col-md-6 col-md-offset-3 contact-form">
            <div align="center">
                <h3>ค้นหารายการบัญชี</h3>
            </div>          
                <form class="form" method="POST" action="/OwnerController/ToFindTransaction_Page">
                    <p align="left" ><font size="4" color="white">ช่วงเวลาที่ต้องการค้นหา</font></p><input type="date" name="Fdate" required>
                    <input type="date" name="Ldate" required>
                    <?php foreach ($data['allIncome'] as $rowO){ ?>
                    <p align="left" ><font size="4" color="white">รายรับ</font></p> 

                    <input type="text" placeholder="<?php echo $rowO['income'] ?>" name="productName" disabled>
                    <?php }foreach ($data['allExpenses'] as $rowT){ ?>
                    <p align="left" ><font size="4" color="white">รายจ่าย</font></p> 
                    <input type="text" placeholder="<?php echo $rowT['expenses'] ?>" name="Price" disabled>
                    <?php } ?>

                    <p align="left" ><font size="4" color="white">ระบุแพทย์ที่ต้องการค้นหา</font></p>
                        <select name="dentist" class="form-control">
                             <option value="">ไม่ระบุแพทย์</option>
                            <?php foreach($data['Dentist'] as $row){ ?>
                                <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                            <?php } ?>
                        </select>
                        <br>
                    <center>
                        

  <!-- <label style="color: white"><input type="checkbox" value="รับ(ค่าบริการ)" name="t1">ค่าบริการ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

  <label style="color: white"><input type="checkbox" value="จ่าย(แพทย์)" name="t2">ส่วนแบ่งแพทย์&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>

  <label style="color: white"><input type="checkbox" value="รับ" name="t3">รายรับอื่นๆ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
  <label style="color: white"><input type="checkbox" value="จ่าย" name="t4">รายจ่ายอื่นๆ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> -->
  </center>
<br><br>
                    <input class="submit-btn" type="submit" value="ค้นหา"> 
                </form>
        </div>
    </div>
</div>
<br><br>
	<div class="container">
        <table class="table table-bordered" id="dataTable">
        	<thead>
        		<tr>
        			<th>ID</th>
        			<th>ประเภท</th>
                    <th>รายละเอียด</th>
        			<th>จำนวน</th>
                    <th>เวลา</th>
        			<th>เพิ่มโดย</th>
        			
        		</tr>
        	</thead>
        	<tbody>
        	<?php $i = 1 ?>
        	<?php foreach ($data['allTransaction'] as $row){ ?>
        		<tr>
        			<td><?php echo $i ?></td>

                    <?php if($row['Transaction_type']=='รับ'||$row['Transaction_type']=='รับ(ค่าบริการ)'){ ?>



                    <td> <p style="color: green"><?php echo $row['Transaction_type'] ?></p></td>
                    <td><p style="color: green"><?php echo $row['Transaction_detail'] ?></p></td>
                    <td><p style="color: green"><?php echo $row['amount'] ?></p></td>
                    <td><p style="color: green"><?php echo $row['time'] ?></p></td>
                    <td><p style="color: green"><?php echo $row['UpdateBy'] ?></p></td>

                    <?php }if($row['Transaction_type']=='จ่าย'||$row['Transaction_type']=='จ่าย(แพทย์)'){ ?>



                    <td> <p style="color: red"><?php echo $row['Transaction_type'] ?></p></td>
                    <td><p style="color: red"><?php echo $row['Transaction_detail'] ?></p></td>
                    <td><p style="color: red"><?php echo $row['amount'] ?></p></td>
                    <td><p style="color: red"><?php echo $row['time'] ?></p></td>
                    <td><p style="color: red"><?php echo $row['UpdateBy'] ?></p></td>

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