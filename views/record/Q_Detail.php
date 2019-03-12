<!-- about section -->

<link rel="stylesheet" href="/public/css/jquery.inputpicker.css" />
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="/public/js/jquery.inputpicker.js"></script>
<div class="row">
    <div class="contact-caption clearfix">
        <div class="col-md-6 col-md-offset-3 contact-form">
            <div align="center">
                <h3>แก้ไขการนัดหมาย</h3>
            </div>          
                <form class="form" method="POST" action="/RecordController/Save_Q">
                    <input type="hidden"  value="<?php echo $data['id']; ?>" name="Q_id"/> 
                    <p align="left" ><font size="4" color="white">ชื่อคนไข้</font></p> <input value="<?php echo $data['Q_Detail']['patientName']; ?>" name="patient"/ disabled>
                    <p align="left" ><font size="4" color="white">แพทย์ผู้นัดหมาย</font></p> <input id="test2" value="<?php echo $data['Q_Detail']['dentist']; ?>" name="dentist"/>
                    <p align="left" ><font size="4" color="white">วันที่นัดหมาย</font></p><input type="datetime-local" name="bdaytime" value="<?php echo date('Y-m-d\TH:i', strtotime($data['Q_Detail']['time'])); ?>">
                    <p align="left" ><font size="4" color="white">หมายเหตุ</font></p> 
                    <input value="<?php echo $data['Q_Detail']['detail']; ?>" type="text"  name="detail" >
                    <p align="left" ><font size="4" color="white">สถานะการนัดหมาย</font></p> 
                    <select value="<?php echo $data['Q_Detail']['status'] ?>" name="status" align="left" class="form-control">
                        <option value="1">ยังไม่มา</option>
                        <option value="2">รอพบแพทย์</option>
                        <option value="3">รอจ่ายเงิน</option>
                        <option value="4">ยกเลิกนัด</option>
                        <option value="5">เสร็จสิ้น</option>
                    </select>
                    <br>
                    <input class="submit-btn" type="submit" value="บันทึก">
                </form>
        </div>
    </div>
</div>
<script>
// $('#test').inputpicker({
//     data:[
//         {value:"<?php echo $data['Q_Detail']['status_id'] ?>",text:"<?php echo $data['Q_Detail']['status'] ?>"},
//     <?php foreach($data['Q_Status'] as $row){ ?>
//         <?php if($data['Q_Detail']['status_id'] == $row['status_id']){
//         }else{ ?>
//         {value:"<?php echo $row['status_id'] ?>",text:"<?php echo $row['status_name'] ?>"},
//         <?php }} ?>
//         {}
//     ],
//     fields:['value','text'],
//     fieldText : 'text',
//     headShow: true,
//     filterOpen: true,
//     autoOpen: true
// });

$('#test2').inputpicker({
    data:[
    {value:"<?php echo $data['Q_Detail']['dentist_id'] ?>",text:"<?php echo $data['Q_Detail']['dentist']; ?>"},
    <?php foreach($data['Dentist'] as $row){ ?>
        <?php if($row['user_id']==$data['Q_Detail']['dentist_id']){}else{  ?>
        {value:"<?php echo $row['user_id'] ?>",text:"<?php echo $row['name'] ?>"},
        <?php }} ?>
        {}
    ],
    fields:['value','text'],
    fieldText : 'text',
    headShow: true,
    filterOpen: true,
    autoOpen: true
});
</script>