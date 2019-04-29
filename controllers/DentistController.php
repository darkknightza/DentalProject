<?php
use core\Session;
use core\Cotroller\Controller;
use models\dentist_model;

class DentistController extends Controller
{
    private $model;
    public function __construct(){
        parent::__construct();
        require_once 'models/dentist_model.php';
        $this->model = new dentist_model();
        Session::init();
    }
    public function ViewHistories(){
        $ListTreatmentHis = $this->model->getListTreatment();
        $this->views('dentist/TreatmentHistory',[
            'ListTreatmentHis' =>$ListTreatmentHis
        ]);
    }
    public function ViewHistoryDetail($id){
        $Patient = $this->model->GetPatientDetail($id);
        $History = $this->model->GetPatientHistory($id);
        $this->views('dentist/TreatmentDetail',[
            'Patient' =>$Patient,
            'History' =>$History
        ]);
    }
    public function QueueToday() {
        $user= Session::get('user');
        $user_id = $user['user_id'];
        $QueueToday =$this->model->getQueueNow($user_id);
        $this->views('dentist/QueueList',[
            'QueueToday' =>$QueueToday
        ]);
        
    }
    public function QueueDetail($id) {
        $Patient = $this->model->GetPatientDetail($id);
        $History = $this->model->GetPatientHistory($id);
        $this->views('record/ViewDetail',[
            'Patient' =>$Patient,
            'History' =>$History,
            'type' => 1
        ]);
    }
    public function FormTreatment($id) {
        $Patient = $this->model->GetPatientDetail($id);
        $QueueToday =$this->model->getQueueByPatientID($id);
        $product = $this->model->GetProduct();
        $this->views('dentist/AddTreatment',[
            'Patient' =>$Patient,
            'product' =>$product,
            'QueueToday' => $QueueToday
        ]);
    }
    public function FormEditTreatment($id) {
        $His = $this->model->GetHistorytreatment($id);
        $this->views('dentist/EditTreatment',[
            'His' =>$His
        ]);
    }
    public function UpdateTreatment() {
        $id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING);
        $treatment_name = filter_input(INPUT_POST, 'treatment_name',FILTER_SANITIZE_STRING);
        $howtotreatment = filter_input(INPUT_POST, 'howtotreatment',FILTER_SANITIZE_STRING);
        $patientid = filter_input(INPUT_POST, 'patientid',FILTER_SANITIZE_STRING);
        print_r($patientid);
        $data = [
            'id' => $id,
            'treatment_name' => $treatment_name,
            'howtotreatment' => $howtotreatment
        ];
        $this->model->UpdateTreatment($data);
        echo '<script>alert("ทำรายการสำเร็จ"); window.location = "/DentistController/ViewHistoryDetail/'.$patientid.'" </script>';
        //echo '<script> window.location = "/DentistController/ViewHistoryDetail/'.$patientid.'" </script>';
    }
    public function DeleteTreatment($id) {
        $this->model->DELETEProductLog($id);
        // $result = $this->model->DELETETreatment($id);
        // if($result){
        //     echo '<script>alert("ทำรายการสำเร็จ");</script>';
        //     if (isset($_SERVER["HTTP_REFERER"])) {
        //         header("Location: " . $_SERVER["HTTP_REFERER"]);
        //     }
        // }else{
        //     echo '<script>alert("ไม่ทำรายการสำเร็จ");</script>';
        //     if (isset($_SERVER["HTTP_REFERER"])) {
        //         header("Location: " . $_SERVER["HTTP_REFERER"]);
        //     }
        // }
        $result = $this->model->DELETETreatment($id);
        if($result){
            echo '<script>alert("ทำรายการสำเร็จ");</script>';
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }else{
            echo '<script>alert("ไม่ทำรายการสำเร็จ");</script>';
            if (isset($_SERVER["HTTP_REFERER"])) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            }
        }
    }


    public function LookX_rey($id) {
        $this->views('dentist/X_ray',[
            'Picture' =>$id
        ]);
        
    }
    public function SubmitTreatment() {
        $user= Session::get('user');
        $Patientid = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING);
        $treatment_Q_id = filter_input(INPUT_POST, 'treatment_Q_id',FILTER_SANITIZE_STRING);
        $treatment_name = filter_input(INPUT_POST, 'treatment_name',FILTER_SANITIZE_STRING);
        $howtotreatment = filter_input(INPUT_POST, 'howtotreatment',FILTER_SANITIZE_STRING);
        $fileupload = filter_input(INPUT_POST, 'fileupload',FILTER_SANITIZE_STRING);

        $target_dir = "public/uploads/";

        if($_FILES["fileupload"]["name"]){
            $target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
            $PictureName =  basename($_FILES["fileupload"]["name"]);
            $pieces = explode(".", $PictureName);

            $path = getcwd();
            $t = microtime(true);
            $micro = sprintf("%06d",($t - floor($t)) * 1000000);
            $PictureName = $pieces[0].date("Y-m-d H:i:s").".$micro$t.";
            $PictureName = str_replace(".","","$PictureName");
            $PictureName = str_replace("-","","$PictureName");
            $PictureName = str_replace(":","","$PictureName");
            $PictureName = str_replace(" ","","$PictureName");

            $PictureName = $PictureName.".".$pieces[1];

            $uploadOk = 1;

            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
                if($check !== false) {
                     $uploadOk = 1;
                 }else{
                    $uploadOk = 0;
                 }
            }

            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ){
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {

            }else{
                if(move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file)){
                     rename("$target_file","$target_dir"."$PictureName");

                }else{

                }
            }

        }else{
            $PictureName = "DF.png";
        }



        $point = filter_input(INPUT_POST, 'point',FILTER_DEFAULT,FILTER_REQUIRE_ARRAY);

        $i=0;
        if(!empty($point)){
            while ($i<sizeof($point)) {
            $howtotreatment = $howtotreatment.",".$point[$i];
            $i++;
        }

        }
        

        
        
            
        




        $product = $this->model->GetProduct();
        $appoint = filter_input(INPUT_POST, 'appoint',FILTER_SANITIZE_STRING);
        if($treatment_Q_id){
            $this->model->UpdateQueue($treatment_Q_id);
        }
        if($appoint){
            $datetime = filter_input(INPUT_POST, 'datetime', FILTER_DEFAULT);
            $detail = filter_input(INPUT_POST, 'detail', FILTER_DEFAULT);
            $data = [
                'datetime' => $datetime,
                'detail' => $detail,
                'user_id' => $user['user_id'],
                'Patientid' => $Patientid
            ];
           $this->model->InsertQueue($data);
        }
        $data = [
            'treatment_name' => $treatment_name,
            'howtotreatment' => $howtotreatment,
            'fileupload' => $PictureName,
            'treatment_Q_id' => $treatment_Q_id
        ];
        $lastId = $this->model->InsertTreatment($data);
        $count = count($product);
        if($lastId){
            for($i = 0;$i<=$count;$i++){
                $product = filter_input(INPUT_POST, 'product'.$i,FILTER_SANITIZE_STRING);
                if($product){
                    $price = filter_input(INPUT_POST, 'price'.$i,FILTER_SANITIZE_STRING);
                    $amount = filter_input(INPUT_POST, 'amount'.$i,FILTER_SANITIZE_STRING);
                    $data = [
                        'lastId' => $lastId,
                        'price' => $price,
                        'amount' => $amount,
                        'product' => $product
                    ];

                    $this->model->InsertProductlog($data);
                }
                
            }
        }
        echo '<script>alert("ทำรายการสำเร็จ"); window.location = "/DentistController/QueueToday" </script>';
        

        //echo '<script>window.location = "/DentistController/QueueToday" </script>';
    }
    
}