<?php
use core\Session;
use core\Cotroller\Controller;
use models\record_model;


class OwnerController extends Controller
{
	 public function ToTransaction_Page(){
	 	 $allTransaction = $this->model->GetAllTransaction();
        $this->views('Owner/index',[
            'allTransaction' =>$allTransaction
        ]);
    }

}

?>