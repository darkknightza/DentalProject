<?php
use core\Session;
use core\Cotroller\Controller;
use models\owner_model;


class OwnerController extends Controller
{

	private $model;
    public function __construct(){
        parent::__construct();
        require_once 'models/owner_model.php';
        $this->model = new owner_model();
    }
	 public function ToTransaction_Page(){
	 	 $allTransaction = $this->model->GetAllTransaction();
        $this->views('Owner/index',[
            'allTransaction' =>$allTransaction
        ]);
    }

}

?>