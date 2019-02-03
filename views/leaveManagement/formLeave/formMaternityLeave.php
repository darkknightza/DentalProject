<?php require_once 'views/layout/header.php';?>

<div class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/public/#">Dashboard</a></li>
			<li class="breadcrumb-item active">My Dashboard</li>
		</ol>
		<!-- Icon Cards-->
		<div class="container">
            <div class="card card-register mx-auto mt-5">
              <div class="card-header text-center">แบบฟอร์มลาคลอดบุตร</div>
              <div class="card-body">
                <form>
                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputName">เขียนที่</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="มหาวิทยาลัยแม่โจ้">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputLastName">วันที่</label>
                            <input class="form-control" id="exampleInputLastName" type="date" aria-describedby="nameHelp">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">เรื่อง</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="ขออนุญาติการลา">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">เรียน</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp">
                        </div>
                        
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputName">ข้าพเจ้า</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">ตำแหน่ง</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">ขอลาคลอดบุตรตั้งแต่วันที่</label>
                            <input class="form-control" id="exampleInputName" type="date" aria-describedby="nameHelp" placeholder="ขออนุญาติการลา">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">ถึง</label>
                            <input class="form-control" id="exampleInputName" type="date" aria-describedby="nameHelp">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">มีกำหนด</label>
                            <input class="form-control" id="exampleInputName" type="number" aria-describedby="nameHelp">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="exampleInputName">หมายเลขโทรศัพท์</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp">
                        </div>
                        <div class="col-md-12">
                            <label for="exampleInputName">ในระหว่างลาจะติดต่อข้าพเจ้าได้ที่</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" >
                        </div>
                    </div>
                  </div>
                  <a class="btn btn-primary btn-block" href="login.html">ส่ง</a>
                </form>
                <div class="text-center">
                  <a class="d-block small mt-3" href="login.html">Login Page</a>
                  <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div>
              </div>
            </div>
          </div>

		<!-- /.container-fluid-->
		<!-- /.content-wrapper-->
	</div>
</div>
<?php require 'views/layout/footer.php';?>
