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
        $QueueToday =$this->model->getQueueNow();
        $this->views('dentist/QueueList',[
            'QueueToday' =>$QueueToday
        ]);
        
    }
    public function QueueDetail($id) {
        $Patient = $this->model->GetPatientDetail($id);
        $History = $this->model->GetPatientHistory($id);
        $this->views('dentist/QueueDetail',[
            'Patient' =>$Patient,
            'History' =>$History
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
    public function SubmitTreatment() {
        $user= Session::get('user');
        $Patientid = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING);
        $treatment_Q_id = filter_input(INPUT_POST, 'treatment_Q_id',FILTER_SANITIZE_STRING);
        $treatment_name = filter_input(INPUT_POST, 'treatment_name',FILTER_SANITIZE_STRING);
        $howtotreatment = filter_input(INPUT_POST, 'howtotreatment',FILTER_SANITIZE_STRING);
        $fileupload = filter_input(INPUT_POST, 'fileupload',FILTER_SANITIZE_STRING);
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
            'fileupload' => $fileupload,
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
                    $price = $price * $amount;
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
    }
    
}