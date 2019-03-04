<!-- about section -->

<link rel="stylesheet" href="/public/css/jquery.inputpicker.css" />
<script src="/public/js/jquery.inputpicker.js"></script>
<div class="row">
    <div class="contact-caption clearfix">
        <div class="col-md-6 col-md-offset-3 contact-form">
            <div align="center">
                <h3>แก้ไขการนัดหมาย</h3>
            </div>          
                <form class="form" method="POST" action="/RecordController/Add_Q">
                    <p align="left" ><font size="4" color="white">ชื่อคนไข้</font></p> <input  value="<?php echo $data['Q_Detail']['patientName']; ?>" name="patient"/>
                    <p align="left" ><font size="4" color="white">แพทย์ผู้นัดหมาย</font></p> <input id="test2" value=" " name="dentist"/>
                    <p align="left" ><font size="4" color="white">วันที่นัดหมาย</font></p><input type="datetime-local" name="bdaytime" value="<?php echo date('Y-m-d\TH:i', strtotime($data['Q_Detail']['time'])); ?>">
                    <p align="left" ><font size="4" color="white">หมายเหตุ</font></p> 
                    <input value="<?php echo $data['Q_Detail']['detail']; ?>" type="text" placeholder="รายละเอียดอาการที่เป็นแต่กำเนิด" name="detail" >
                    <p align="left" ><font size="4" color="white">สถานะการนัดหมาย</font></p> <input id="test" value="<?php echo $data['Q_Detail']['status'] ?>" name="status"/>
                    <input class="submit-btn" type="submit" value="บันทึก">
                </form>
        </div>
    </div>
</div>


<script>
$('#test').inputpicker({
    data:[
        {value:"<?php echo $data['Q_Detail']['status_id'] ?>",text:"<?php echo $data['Q_Detail']['status'] ?>"},
    <?php foreach($data['Q_Status'] as $row){ ?>


        <?php if($data['Q_Detail']['status_id'] == $row['status_id']){

        }else{ ?>
        {value:"<?php echo $row['status_id'] ?>",text:"<?php echo $row['status_name'] ?>"},
        <?php }} ?>
        {}
    ],
    fields:['value','text'],
    fieldText : 'text',
    headShow: true,
    filterOpen: true,
    autoOpen: true
});

$('#test2').inputpicker({
    data:[
    <?php foreach($data['Dentist'] as $row){ ?>
        {value:"<?php echo $row['user_id'] ?>",text:"<?php echo $row['name'] ?>"},
        <?php } ?>
        {}
    ],
    fields:['value','text'],
    fieldText : 'text',
    headShow: true,
    filterOpen: true,
    autoOpen: true
});
</script>