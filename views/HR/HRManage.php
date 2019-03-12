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
		<div class="form-group row">
			<a href="/HRController/FROMAddUser" class="btn btn-primary">เพิ่มพนักงาน</a>
		</div>
		<div class="form-group row">
        <table class="table table-bordered" id="dataTable">
        	<thead>
        		<tr>
        			<th>ID</th>
        			<th>Name</th>
        			<th>USERNAME</th>
        			<th>TYPE</th>
        			<th>EDITPASS</th>
        			<th>EDIT</th>
        			<th>DELETE</th>
        		</tr>
        	</thead>
        	<tbody>
        	<?php $i = 1 ?>
        	<?php foreach ($data['alluser'] as $row){ ?>
        		<tr>
        			<td><?php echo $i ?></td>
        			<td><?php echo $row['name'] ?></td>
        			<td><?php echo $row['username'] ?></td>
        			<td><?php echo $row['userType_name'] ?></td>
         			<td><a href="/HRController/EditPassword/<?php echo $row['user_id'] ?>">แก้ไขรหัสผ่าน</a></td>
        			<td><a href="/HRController/EditUser/<?php echo $row['user_id'] ?>">แก้ไข</a></td>
                    <?php if($row['user_id']==$user['user_id']){ ?>
                    <td>ไม่สามารถลบได้</td>

                    <?php }else{ ?>
        			<td><a href="/HRController/DeleteUser/<?php echo $row['user_id'] ?>" onclick="return confirm('Are you sure?')">ลบ</a></td>
                    <?php } ?>
        		</tr>
        		<?php $i++ ?>
        	<?php } ?>
        	</tbody>
        </table>
        </div>
     </div>
<script type="text/javascript">
			//คำสั่ง Jquery เริ่มทำงาน เมื่อ โหลดหน้า Page เสร็จ 
			$(function(){
				//กำหนดให้  Plug-in dataTable ทำงาน ใน ตาราง Html ที่มี id เท่ากับ example
				$('#dataTable').dataTable();
			});
</script>