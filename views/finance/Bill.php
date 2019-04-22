<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
</head>
<style type="text/css">
body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        font-size: 22px;
        font-family:Angsana New;
    }
    table th{
        text-align: center;
    }
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 220mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;

        }
    }
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<body> 
<div class="page">
<div class="row">
    	<div class="col-xs-2 col-md-2 col-sm-2 col-lg-2" style="margin-top: 10px">
    		<img src="/public/img/logo.png" width="100" alt="" class="img-responsive logo">
		</div>
		<div class="col-xs-6 col-md-6 col-sm-6 col-lg-6" >
			<h3>คลินิคทันตกรรม</h3>
    		<p>63 หมู่4 ต.หนองหาร อ.สันทราย จ.เชียงใหม่</p>
		</div>
		<div class="col-xs-4 col-md-4 col-sm-4 col-lg-4" align="right">
			<p>ใบเสร็จรับเงิน/RECEPT</p>
    		<p>เลขที่ใบเสร็จ <?php echo $data['getBillDetail']['treatment_history_id'] ?></p>
		</div>
    </div>
    <br>
	<div class="row">
		<p>ได้รับเงินจาก</p>
	</div>
	<div class="row">
		<div class="col-xs-7 col-md-7 col-sm-7 col-lg-7" style="padding-top: 10px">
			<table border="1" style="width: 100%;text-align: left;">
				<tr>
					<td>
						<p>รหัส/ชื่อผู้ป่วย: <?php echo $data['getBillDetail']['patient_id'] ?> <?php echo $data['getBillDetail']['patient_name'] ?></p>
						<p>โทร: <?php echo $data['getBillDetail']['tel'] ?></p>
					</td>
				</tr>
            </table>
        </div>
        <div class="col-xs-1 col-md-1 col-sm-1 col-lg-1" style="padding-top: 10px">
         
        </div>
        <div class="col-xs-4 col-md-4 col-sm-4 col-lg-4" style="padding-top: 10px">
            <table border="1" style="width: 100%;text-align: right;">
				<tr>
					<td>
    					<p>วันที่ <?php echo $data['Time_arrive'][0] ?></p>
    					<p>เวลา <?php echo $data['Time_arrive'][1] ?></p>
    				</td>
				</tr>
            </table>
        </div>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12">
            <table border="1" style="width: 100%;text-align: center" >
            	<thead>
            		<tr>
            			<th>ลำดับ</th>
            			<th>รายการ</th>
            			<th>จำนวน</th>
            			<th>ราคาต่อหน่วย</th>
            			<th>เป็นเงิน</th>
            		</tr>
            	</thead>
            	<tbody>
            		<?php $sumTotal = 0?>
            		<?php foreach ( $data['getProductLog'] as $key => $row){ ?>
            		<?php 
    					$sumTotal += $row['totalPrice']*$row['amount'];
    			    ?>
            		<tr>
            			<td><?php echo $key+1 ?></td>
            			<td><?php echo $row['productName'] ?></td>
            			<td><?php echo $row['amount'] ?></td>
            			<td><?php echo $row['totalPrice'] ?></td>
            			<td><?php echo $row['totalPrice']*$row['amount']; ?></td>
            		</tr>
            		<?php } ?>
            		<tr>
            			<td colspan="4">รวมทั้งสิ้น</td>
            			<td><?php echo $sumTotal ?></td>
            		</tr>
            	</tbody>
            </table>
        </div>        
	</div>
	<br>
	<div class="row">
		<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12" align="right">
            <p>ผู้รับ____________________________</p>
        </div>        
	</div>
	<br>
	<div class="row">
		<div class="col-xs-12 col-md-12 col-sm-12 col-lg-12" align="center">
            <button type="button" id="print">พิมพ์เอกสาร</button>
            <a href="/FinanceController/ViewBill" ><button type="button">กลับไปหน้าออกบิล</button></a>

        </div>        
	</div>
</div>
</body>
<script type="text/javascript">
	$( "#print" ).click(function() {
		window.print();
	});
</script>
</html>