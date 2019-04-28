
<!-- end of about section -->

<div class="row">
    <div class="contact-caption clearfix">
        <div class="col-md-6 col-md-offset-3 contact-form">
            <div align="center">
                <h3>ค้นหารายการสรุปรายรับรายจ่าย</h3>
            </div>          
                <form class="form" method="POST" action="/OwnerController/ToFindTransaction_Page">
                    <p align="left" ><font size="4" color="white">ช่วงเวลาที่ต้องการค้นหา</font><br><input type="date" name="Fdate" required style="width: 25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="4" color="white">ถึงวันที่</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="Ldate" required style="width: 25%"></p>
                    <?php foreach ($data['allIncome'] as $rowO){ ?>
                    <p align="left" ><font size="4" color="white">รายรับ</font> 

                    <br><input type="text" placeholder="<?php echo $rowO['income'] ?>" name="productName" disabled style="width: 62%"></p>
                    <?php }foreach ($data['allExpenses'] as $rowT){ ?>
                    <p align="left" ><font size="4" color="white">รายจ่าย</font>
                    <br><input type="text" placeholder="<?php echo $rowT['expenses'] ?>" name="Price" disabled style="width: 62%">
                    <?php } ?>
                    </p>

                    <p align="left" ><font size="4" color="white">ระบุแพทย์ที่ต้องการค้นหา</font>
                        <select name="dentist" class="form-control" style="width: 62%">
                             <option value="">ไม่ระบุแพทย์</option>
                            <?php foreach($data['Dentist'] as $row){ ?>
                                <option value="<?php echo $row['name'] ?>"><?php echo $row['name'] ?></option>
                            <?php } ?>
                        </select>
                        </p>
                        <br>
                    <center>
                        <p align="left" ><font size="4" color="white">ประเภทรายการที่ต้องการตรวจสอบ</font>
                        <br><select name="condition" class="form-control" style="width: 62%">
                             <option value="รับทั้งหมด">รายรับรวมทั้งหมด</option>
                             <option value="จ่ายทั้งหมด">รายจ่ายรวมทั้งหมด</option>
                             <option value="รับรวม">รายรับของการรักษาที่ยังไม่หักค่าใช้จ่าย</option>
                             <option value="รับ(ค่าบริการ)">รายรับหลังจากหักค่าใช้จ่าย</option>
                             <option value="จ่าย(แพทย์)">รายจ่ายสำหรับแพทย์</option>
                             <option value="รับ">รายรับอื่นๆ</option>
                             <option value="จ่าย">รายจ่ายอื่นๆ</option>
                        </select>
                        
                    </p>


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