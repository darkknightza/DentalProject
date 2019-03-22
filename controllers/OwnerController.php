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
         $allIncome = $this->model->GetSumIncomeTransaction();
         $allExpenses = $this->model->GetSumExpensesTransaction();


        $this->views('Owner/index',[
            'allTransaction' =>$allTransaction,
            'allIncome' =>$allIncome,
            'allExpenses' =>$allExpenses


        ]);
    }


     public function ToFindTransaction_Page(){

        $Fdate = filter_input(INPUT_POST, 'Fdate',FILTER_SANITIZE_STRING);
        $Ldate = filter_input(INPUT_POST, 'Ldate',FILTER_SANITIZE_STRING);
        $L = explode('-', $Ldate);
        $Ldate = $L[0].'-'.$L[1].'-'.($L[2]+1);
        $allTransaction = $this->model->FindTransaction($Fdate,$Ldate);
        $allIncome = $this->model->FindSumIncomeTransaction($Fdate,$Ldate);
        $allExpenses = $this->model->FindSumExpensesTransaction($Fdate,$Ldate);
        


         


        $this->views('Owner/index',[
            'allTransaction' =>$allTransaction,
            'allIncome' =>$allIncome,
            'allExpenses' =>$allExpenses
        ]);
    }


    public function GoHome_Page(){


        $this->views('Owner/home',null);
    }

    public function GoDentis_Page(){


        $this->views('dentist/index',null);
    }

}

?>