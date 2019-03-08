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

    public function ToRecordPage(){
        $this->views('record/index',null);
    }


    public function ToHistory_Page(){
        $this->views('record/History',null);
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



    public function ToQ_Page(){
         $allQ = $this->model->GetAllQ();
         $allPatient = $this->model->GetAllPatient();
         $Dentist = $this->model->GetAllDentist();
        $this->views('record/Patient_Q',[
            'allQ' =>$allQ,
            'allPatient' =>$allPatient,
            'Dentist' =>$Dentist
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


     public function ToEditPatientPage($id){
         $Patient = $this->model->GetPatientDetail($id);
        $this->views('record/EditPatient',[
            'Patient' =>$Patient
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

    public function UpdatePatient(){
        $id = filter_input(INPUT_POST, 'Patient_id',FILTER_SANITIZE_STRING);
        $name = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_STRING);
        $tel = filter_input(INPUT_POST, 'tel',FILTER_SANITIZE_STRING);
        $location = filter_input(INPUT_POST, 'location',FILTER_SANITIZE_STRING);
        $Allergic = filter_input(INPUT_POST, 'Allergic',FILTER_SANITIZE_STRING);
        $CongenitalDetail = filter_input(INPUT_POST, 'CongenitalDetail',FILTER_SANITIZE_STRING);
        $data = [
            'name' => $name,
            'location' => $location,
            'tel' => $tel,
            'Allergic' => $Allergic,
            'CongenitalDetail' => $CongenitalDetail,
            'id' => $id
        ];
        $result = $this->model->UpdatePatient($data);
        if($result){
            echo '<script>alert("ทำรายการสำเร็จ");window.location = "/RecordController/ToManagePatient"</script>';
        }else{
            echo '<script>alert("ทำรายการไม่สำเร็จ");window.location = "/RecordController/ToManagePatient'.$id.'"</script>';
        }
    }

     public function ToDeletePatient($id){
        $result = $this->model->DeletePatient($id);
        if($result){
            echo '<script>alert("ทำรายการสำเร็จ");window.location = "/RecordController/ToManagePatient"</script>';
        }else{
            echo '<script>alert("ทำรายการไม่สำเร็จ");window.location = "/RecordController/ToManagePatient"</script>';
        }
    }


    public function Add_Q(){
      $patient_id = filter_input(INPUT_POST, 'patient',FILTER_SANITIZE_STRING);
      $dentist_id = filter_input(INPUT_POST, 'dentist',FILTER_SANITIZE_STRING);
      $Treatment_q_time = filter_input(INPUT_POST, 'bdaytime',FILTER_SANITIZE_STRING);
      $detail = filter_input(INPUT_POST, 'detail',FILTER_SANITIZE_STRING);
      $user= Session::get('user');
      $UpdateBy = $user['user_id'];
      $status_id = 1;
       

      $data = array($patient_id, $dentist_id, $UpdateBy,$Treatment_q_time,$status_id,$detail); 
      $this->model->InsertPatient_Q($data);
      //echo '<script>alert("ทำรายการสำเร็จ");window.location = "/RecordController/ToQ_Page"</script>';
        
    }


      public function EditStatus($id){
         $Q_Detail = $this->model->GetQ_Detail($id);
         $Dentist = $this->model->GetAllDentist();
         $Q_Status = $this->model->GetAllQ_Status();
        $this->views('record/Q_Detail',[
            'Q_Detail' =>$Q_Detail,
            'Dentist' =>$Dentist,
            'Q_Status' =>$Q_Status,
            'id' => $id
        ]);
    }


    public function Save_Q(){
        $id = filter_input(INPUT_POST, 'Q_id',FILTER_SANITIZE_STRING);
        $dentist = filter_input(INPUT_POST, 'dentist',FILTER_SANITIZE_STRING);
        $bdaytime = filter_input(INPUT_POST, 'bdaytime',FILTER_SANITIZE_STRING);
        $detail = filter_input(INPUT_POST, 'detail',FILTER_SANITIZE_STRING);
        $status = filter_input(INPUT_POST, 'status',FILTER_SANITIZE_STRING);
        $user = Session::get('user');
        $UpdateBy = $user['user_id'];
        $time = date('Y-m-d\TH:i');
        $data = [
            'id' => $id,
            'dentist' => $dentist,
            'bdaytime' => $bdaytime,
            'detail' => $detail,
            'status' => $status,
            'UpdateBy' => $UpdateBy,
            'Time_arrive' => $time
        ];
        $result = $this->model->UpdateQ($data);
        if($result){
            echo '<script>alert("ทำรายการสำเร็จ");window.location = "/RecordController/ToQ_Page"</script>';
        }else{
            echo '<script>alert("ทำรายการไม่สำเร็จ");window.location = "/RecordController/EditStatus/'.$id.'"</script>';
        }
    }


    



}
?>
