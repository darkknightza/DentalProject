

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
		</div>
	</div>
</section>
<!-- end of about section -->


<!-- service section starts here -->
<section class="service text-center" id="service">
	<div class="container">
		<div class="row">
			<h2>ยินดีต้อนรับ</h2>
			<h4><?php echo $user['name'] ?> ( <?php echo $user['userType_name'] ?> ) </h4>
			<a href="/HRController/FROMAddUser">
				<div class="col-md-6 col-sm-6">
					<div class="single-service">
						<div class="single-service-img">
							<div class="service-img">
								<img class="heart img-responsive" src="/public/img/50041.png"
									style="width: 60%; height: 80%" alt="">
							</div>
						</div>
						<h3>เพิ่มข้อมูลผู้ใช้</h3>
					</div>
				</div>
			</a> 
			<a href="/HRController/ManageUsers">
				<div class="col-md-6 col-sm-6">
					<div class="single-service">
						<div class="single-service-img">
							<div class="service-img">
								<img class="heart img-responsive" src="/public/img/user.png"
									style="width: 60%; height: 80%" alt="">
							</div>
						</div>
						<h3>จัดการข้อมูลผู้ป่วย</h3>
					</div>
				</div>
			</a>
		</div>
	</div>
</section>
<!-- end of service section -->




<!-- map section -->


