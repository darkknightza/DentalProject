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
}