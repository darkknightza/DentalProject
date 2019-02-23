<?php
use core\Session;
use core\Cotroller\Controller;
use models\record_model;

class RecordController extends Controller
{
    private $model;
    public function __construct(){
        parent::__construct();
        require_once 'models/record_model.php';
        $this->model = new record_model();
    }
    
    
     public function ToAddPatient(){
        $this->views('record/AddPatient',null);
    }

     public function ToManagePatient(){
         $allPatient = $this->model->GetAllPatient();
        $this->views('record/ManagePatient',[
            'allPatient' =>$allPatient
        ]);
    }


     public function ViewDetail($id){
        $Patient = $this->model->GetPatientDetail($id);
        $History = $this->model->GetPatientHistory($id);
        $this->views('record/ViewDetail',[
            'Patient' =>$Patient,
            'History' =>$History
        ]);
    }

    
    public function AddPatient(){
      $fname = filter_input(INPUT_POST, 'fname',FILTER_SANITIZE_STRING);
        $lname = filter_input(INPUT_POST, 'lname',FILTER_SANITIZE_STRING);
         $phone = filter_input(INPUT_POST, 'phone',FILTER_SANITIZE_STRING);
        $bdate = filter_input(INPUT_POST, 'bdate',FILTER_SANITIZE_STRING);
        $allegic = filter_input(INPUT_POST, 'allegic',FILTER_SANITIZE_STRING);
        $contagious = filter_input(INPUT_POST, 'contagious',FILTER_SANITIZE_STRING);
        $location = filter_input(INPUT_POST, 'location',FILTER_SANITIZE_STRING);
        $fullname = $fname." ".$lname;


        $data = array($fullname, $location, $phone,$allegic,$contagious,$bdate);
       
        $user= Session::get('user');
        $user_id = $user['userType_id'];

      
        $this->model->InsertPatient($data,$user_id);

        echo "<script type='text/javascript'>alert('เพิ่มข้อมูลผู้ป่วยสำเร็จ');
        window.location='/UserTypeController/Topage/".$user['userType_id']."';
        </script>";
        
        
    }



}
?>
