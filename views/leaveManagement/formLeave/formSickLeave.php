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
              <div class="card-header"><center>แบบฟอร์มลาป่วย</center></div>
              <div class="card-body">
              <form>
                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputName">เขียนที่</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" value="มหาวิทยาลัยแม่โจ้" readonly="readonly">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputLastName">วันที่</label>
                            <input class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" value="11/05/1997" readonly="readonly">
                        </div>

                        
                    </div>
                  </div>

                <div class="form-group">
                    <div class="form-row">
                        
                        <div class="col-md-6">
                            <label for="exampleInputName">เรื่อง</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp">
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
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" value="อ.สมบูรณ์ พูนสุข" readonly="readonly">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">ตำแหน่ง</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" value="อาจารย์" readonly="readonly">
                        </div>
                     </div>
                   </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputName">สังกัด</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" value="มหาวิทยาลัยแม่โจ้ วิทยาศาสตร์" readonly="readonly">
                        </div>
                        <div class="col-md-6">
                          <label for="sel1">รูปแบบการลา:</label>
                            <select class="form-control" id="sel1">
                              <option>ลาป่วย</option>
                              <option>ลากิจส่วนตัว</option>
                              <option>ลาพักผ่อน</option>
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-12">
                            <label for="exampleInputName">เนื่องจาก</label>
                            <textarea class="form-control" rows="3" id="comment"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-12">
                            <label for="exampleInputName">ไฟล์แนบ</label>
                            <input class="form-control" id="exampleInputName" type="file" aria-describedby="nameHelp">
                        </div>
                      </div>
                    </div>
                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputName">ขอลากิจส่วนตัวตั้งแต่วันที่</label>
                            <input class="form-control" id="exampleInputName" type="date" aria-describedby="nameHelp" placeholder="ขออนุญาติการลา">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">ถึง</label>
                            <input class="form-control" id="exampleInputName" type="date" aria-describedby="nameHelp">
                        </div>
                    </div>
                  </div>  
                  <div class="form-group">
                    <div class="form-row">
                    <label for="sel1">รูปแบบการลา:</label>
                      <select class="form-control" id="sel1">
                        <option>ลาเต็มวัน</option>
                        <option>ลาครึ่งเช้า (08:00 - 12:00 น)</option>
                        <option>ลาครึ่งบ่าย (13:00 - 16:30 น)</option>
                      </select>
                    </div>
                  </div>  
                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="exampleInputName">มีกำหนด</label>
                            <input class="form-control" id="exampleInputName" type="number" aria-describedby="nameHelp" placeholder="จำนวนวันลา">
                        </div>
                        <div class="col-md-6">
                            <label for="exampleInputName">หมายเลขโทรศัพท์</label>
                            <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp">
                        </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="exampleInputName">ในระหว่างลาจะติดต่อข้าพเจ้าได้ที่</label>
                            <textarea class="form-control" rows="3" id="comment"></textarea>
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

  </div>

<?php require_once 'views/layout/footer.php' ?>