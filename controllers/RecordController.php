<?php
use core\Session;
use core\Cotroller\Controller;
use models\login_model;

class RecordController extends Controller
{
    private $model;
    public function __construct(){
        parent::__construct();
        Session::init();
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
        
        $this->model->getUserDetail($userId);
        
        
    }
}