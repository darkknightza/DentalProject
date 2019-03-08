<div class="row">
	<div class="contact-caption clearfix">
		<div class="col-md-6 col-md-offset-3 contact-form">
    		<div align="center">
    			<h3>เพิ่มรายการรักษา</h3>
    		</div>			
				<form class="form" method="POST" action="/FinanceController/InsertProduct">
					<p align="left" ><font size="4" color="white">รายการรักษา</font></p> 
					<input type="text" placeholder="รายการรักษา" name="productName" >
					<p align="left" ><font size="4" color="white">ราคา</font></p> 
					<input type="text" placeholder="ราคา" name="Price" >
					<input class="submit-btn" type="submit" value="บันทึก">	
				</form>
		</div>
	</div>
</div>