

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
			<a href="/DentistController/QueueToday">
				<div class="col-md-6 col-sm-4">
					<div class="single-service">
						<div class="single-service-img">
							<div class="service-img">
								<img class="heart img-responsive" src="/public/img/50041.png"
									style="width: 60%; height: 80%" alt="">
							</div>
						</div>
						<h3>รายการนัดหมายของวันนี้</h3>
					</div>
				</div>
			</a>
			<a href="/DentistController/ViewHistories">
				<div class="col-md-6 col-sm-4">
					<div class="single-service">
						<div class="single-service-img">
							<div class="service-img">
								<img class="heart img-responsive" src="/public/img/user.png"
									style="width: 60%; height: 80%" alt="">
							</div>
						</div>
						<h3>รายการที่เคยรักษา</h3>
					</div>
				</div>
			</a> 
		</div>
	</div>
</section>
<!-- end of service section -->




<!-- map section -->


