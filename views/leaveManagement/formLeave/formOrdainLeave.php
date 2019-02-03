<?php require_once 'views/layout/header.php' ?>
  <!-- Navigation-->
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="btn-group dropright">
                <button type="button" class="btn btn-secondary">
                    ลาป่วย
                </button>
                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Toggle Dropright</span>
                </button>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="/LeaveManagement/formLeave/1">ลาป่วย</a>
                  <a class="dropdown-item" href="/LeaveManagement/formLeave/2">ลากิจส่วนตัว</a>
                  <a class="dropdown-item" href="/LeaveManagement/formLeave/3">ลาคลอดบุตร</a>
                  <a class="dropdown-item" href="/LeaveManagement/formLeave/4">ลาพักผ่อน</a>
                  <a class="dropdown-item" href="/LeaveManagement/formLeave/5">ลาไปช่วยเหลือภริยาที่คลอดบุตร</a>
                  <a class="dropdown-item" href="/LeaveManagement/formLeave/6">ลาอุปสมบท</a>
                  <a class="dropdown-item" href="/LeaveManagement/formLeave/7">ลาเข้ารับการตรวจเลือกหรือเข้ารับการเตรียมพล</a>
                  <a class="dropdown-item" href="leave-holiday.html">ลาวันหยุดนักขัตฤกษ์</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">อื่นๆ</a>
                </div>
              </div>
        </div>
      </div>
      
    <!-- /.container-fluid-->
    <div class="container">
            <div class="card card-register mx-auto mt-5">
              <div class="card-header"><center>แบบฟอร์มลาอุปสมบท</center></div>
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
                            <label for="exampleInputName">เกิดวันที่</label>
                            <input class="form-control" id="exampleInputName" type="date" aria-describedby="nameHelp">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">เข้ารับราชการเมื่อวันที่</label>
                            <input class="form-control" id="exampleInputName" type="date" aria-describedby="nameHelp">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">ข้าพเจ้าเคย/ไม่เคยอุปสมบท</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">มีศรัทธาจะอุปสมบทในพระพุทธศาสนา ณ วัด</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">ตั้งอยู่ ณ</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">และจำพรรษาอยู่ ณ วัด</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">ตั้งอยู่ ณ</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">จึงขอลาอุปสมบทมีกำหนด</label>
                            <input class="form-control" id="exampleInputName" type="number" aria-describedby="nameHelp" placeholder="จำนวนวัน">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">ตั้งแต่วันที่</label>
                            <input class="form-control" id="exampleInputName" type="date" aria-describedby="nameHelp">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">ถึงวันที่</label>
                            <input class="form-control" id="exampleInputName" type="date" aria-describedby="nameHelp">
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
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <?php require_once 'views/layout/footer.php' ?>
