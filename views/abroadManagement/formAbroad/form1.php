<?php require_once 'views/layout/header.php';?>

<div class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs-->
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="/public/#">Dashboard</a></li>
			<li class="breadcrumb-item active">My Dashboard</li>
		</ol>



<div class="container">

      <div class="card-header">
        <div class="text-center">แบบฟอร์มขออนุมัติเดินทาง</div>
      </div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">เขียนที่:</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="" value="คณะวิทยาศาสตร์ "
                  readonly="readonly">
              </div>
              <div class="col-md-6">
                <label for="exampleInputName">ส่วนงาน:</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="" value="คณะวิทยาศาสตร์ "
                  readonly="readonly">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-8">
                <label for="exampleInputName">เรื่อง:</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="" value="ขออนุมัติเดินทางไปปฏิบัติงาน ณ ต่างประเทศ (และจัดทำ E-Passport และ/หรือ VISA)"
                  readonly="readonly">
              </div>
              <div class="col-md-4">
                <label for="exampleInputName">เรียน:</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="" value="อธิการบดี"
                  readonly="readonly">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">ข้าพเจ้า:</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="" value="อ.ก ข" readonly="readonly">
              </div>
              <div class="col-md-6">
                <label for="exampleInputName">ประเภท:</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="" value="พนักงานมหาวิทยาลัย"
                  readonly="readonly">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">ตำแหน่ง:</label>
                <input class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="" value="-" readonly="readonly">
              </div>
              <div class="col-md-6">
                <label for="exampleInputEmail1">สังกัดงาน</label>
                <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="" value="มหาวิทยาลัยแม่โจ้ คณะวิทยาศาสตร์"
                  readonly="readonly">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleConfirmPassword">กอง/ฝ่าย</label>
                <input class="form-control" id="exampleConfirmPassword" type="text" placeholder="" value="-" readonly="readonly">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">คณะ/สำนัก</label>
                <input class="form-control" id="exampleConfirmPassword" type="text" placeholder="" value="วิทยาศาสตร์" readonly="readonly">
              </div>
            </div>

          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleConfirmPassword">มีความประสงค์จะขออนุมัติเดินทางไปปฏิบัติงาน ณ ต่างประเทศ เพื่อ</label>
                <select class="form-control">
                  <option value="">เพื่อเจรจาธุรกิจความร่วมมือทางวิชาการ</option>
                  <option value="">เพื่อเสนอผลงานทางวิชาการ</option>
                  <option value="">เพื่อร่วมประชุมสัมมนาทางวิชาการ</option>
                  <option value="">เพื่อศึกษา ฝึกอบรม ดูงาน</option>
                  <option value="">เพื่อนำหรือนิเทศนักศึกษาไปศึกษาดูงาน ฝึกงาน ทำงานสหกิจศึกษา หรือโครงการอื่นๆ</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">ประเทศ</label>
                <select class="form-control">
                  <option>กัมพูชา</option>
                  <option>ญี่ปุ่น</option>
                  <option>โครเอเชีย</option>
                  <option>ฝรั่งเศส</option>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-4">
                <label for="exampleConfirmPassword">ตั้งแต่วันที่</label>
                <input class="form-control" id="firstdate" type="date" placeholder="" required onchange="myFunction(this.value)">
              </div>
              <div class="col-md-4">
                <label for="exampleConfirmPassword">ถึงวันที่</label>
                <input class="form-control" id="lastdate" type="date" placeholder="" required onchange="myFunction1(this.value)">
              </div>
              <div class="col-md-4">
                <label for="exampleConfirmPassword">จำนวนกี่วัน</label>
                <input class="form-control" id="demo2" type="text" placeholder="" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleConfirmPassword">งบประมาณ</label>
                <br>
                <input id="exampleConfirmPassword" type="checkbox" placeholder="" name="dd" value="" required>
                <label for="exampleConfirmPassword">งบประมาณส่วนตัว </label>
                <input id="exampleConfirmPassword" type="checkbox" placeholder="" name="dd" value="" required>
                <label for="exampleConfirmPassword">งบประมาณภายนอกมหาวิทยาลัย</label>
              </div>
            </div>
          </div>

          <div id="div1">
            <div class="form-group">
              <label for="exampleConfirmPassword">1.ค่าใช้จ่ายในประเทศ</label>
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleConfirmPassword">ค่าเบี้ยเลี้ยง</label>
                  <input class="form-control" id="exampleConfirmPassword" type="text" placeholder="">
                </div>
                <div class="col-md-6">
                  <label for="exampleConfirmPassword">ค่าที่พัก</label>
                  <input class="form-control" id="exampleConfirmPassword" type="text" placeholder="">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleConfirmPassword">2.ค่าใช้จ่ายในต่างประเทศ</label>
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleConfirmPassword">ค่าเบี้ยเลี้ยง</label>
                  <input class="form-control" id="exampleConfirmPassword" type="text" placeholder="" value="250/วัน" readonly="readonly">
                </div>
                <div class="col-md-6">
                  <label for="exampleConfirmPassword">ค่าที่พัก</label>
                  <input class="form-control" id="exampleConfirmPassword" type="text" placeholder="" value="1500/คืน" readonly="readonly">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-6">
                  <label for="exampleConfirmPassword">ค่าพาหนะ</label>
                  <input class="form-control" id="exampleConfirmPassword" type="number" placeholder="">
                </div>
                <div class="col-md-6">
                  <label for="exampleConfirmPassword">ค่าลงทะเบียน</label>
                  <input class="form-control" id="exampleConfirmPassword" type="number" placeholder="">
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleConfirmPassword">3.ทั้งนี้ ข้าพเจ้ามีขอความอนุเคราะห์จากกองการเจ้าหน้าที่ สำนักงานอธิการบดี ในการทำเอกสารที่เกี่ยวข้องดังนี้
                </label>
                <br>
                <input id="exampleConfirmPassword" type="radio" placeholder="" name="aa" value="" onclick="show3();" required>
                <label for="exampleConfirmPassword"> ไม่ประสงค์จัดทำเอกสารทั้ง passport และ visa </label>
                <input id="exampleConfirmPassword" type="radio" placeholder="" name="aa" value="" onclick="show4();" required>
                <label for="exampleConfirmPassword"> ประสงค์จัดทำเอกสารดังนี้</label>
              </div>
            </div>
          </div>
          <div id="div2">
            <div class="form-group">
              <div class="form-row">
                <div class="col-md-12">

                  <input id="exampleConfirmPassword" type="checkbox" placeholder="" name="dd" value="" onclick="show1();">
                  <label for="exampleConfirmPassword">หนังสือเดินทาง (E-Passport)</label>
                  <input id="exampleConfirmPassword" type="checkbox" placeholder="" name="dd" value="" onclick="show2();">
                  <label for="exampleConfirmPassword">ตรวจลงตรา (VISA)</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleConfirmPassword">เอกสารที่แนบมาด้วย</label>
                <br>
                <label for="exampleConfirmPassword"> หนังสือเชิญ / หนังสือตอบรับ หรือโครงการที่ได้รับอนุมัติแล้ว (ต้องมี)</label>
                <input class="form-control" id="exampleConfirmPassword" type="file" placeholder="">
                <label for="exampleConfirmPassword">แบบรายงาน การฝึกอบรม/เสนอผลงาน/ดูงาน ณ ต่างประเทศ (ต้องมี)</label>
                <input class="form-control" id="exampleConfirmPassword" type="file" placeholder="">
                <label for="exampleConfirmPassword">สำเนาหนังสือเดินทาง (E-Passport) หน้าแรก (กรณีขอหนังสือ ขออำนวยความสะดวกในการตรวจลงตรา (VISA))</label>
                <input class="form-control" id="exampleConfirmPassword" type="file" placeholder="">
              </div>
            </div>
          </div>

          <button class="btn btn-primary btn-block" type="submit">ตกลง</button>
        </form>

      </div>
    </div>








	</div>
</div>
<?php require 'views/layout/footer.php';?>
