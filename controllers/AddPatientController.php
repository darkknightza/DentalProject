<?php
use core\Session;
use core\Cotroller\Controller;
use models\login_model;

class AddPatientController extends Controller
{

	private $model;
    public function __construct(){
        parent::__construct();
        Session::init();
    }


    public function AddPatient(){
    	$this->views('record/AddPatient',null);
    }


}



?>