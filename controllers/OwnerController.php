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
         $Dentist = $this->model->GetAllDentist();


        $this->views('Owner/index',[
            'allTransaction' =>$allTransaction,
            'allIncome' =>$allIncome,
            'allExpenses' =>$allExpenses,
            'Dentist'=>$Dentist


        ]);
    }


     public function ToFindTransaction_Page(){

        $Fdate = filter_input(INPUT_POST, 'Fdate',FILTER_SANITIZE_STRING);
        $Ldate = filter_input(INPUT_POST, 'Ldate',FILTER_SANITIZE_STRING);
        $L = explode('-', $Ldate);
        $Ldate = $L[0].'-'.$L[1].'-'.($L[2]+1);
        
        $t1= filter_input(INPUT_POST, 't1',FILTER_SANITIZE_STRING);
        $t2= filter_input(INPUT_POST, 't2',FILTER_SANITIZE_STRING);
        $t3= filter_input(INPUT_POST, 't3',FILTER_SANITIZE_STRING);
        $t4= filter_input(INPUT_POST, 't4',FILTER_SANITIZE_STRING);
        $dentist= filter_input(INPUT_POST, 'dentist',FILTER_SANITIZE_STRING);

        echo $dentist;

        




        $allTransaction = $this->model->FindTransaction($Fdate,$Ldate,$t1,$t2,$t3,$t4,$dentist);
        $allIncome = $this->model->FindSumIncomeTransaction($Fdate,$Ldate,$t1,$t3,$dentist);
        $allExpenses = $this->model->FindSumExpensesTransaction($Fdate,$Ldate,$t2,$t4,$dentist);
        $Dentist = $this->model->GetAllDentist();
        


         


        // $this->views('Owner/index',[
        //     'allTransaction' =>$allTransaction,
        //     'allIncome' =>$allIncome,
        //     'allExpenses' =>$allExpenses,
        //     'dentist' => $Dentist
        // ]);
    }


    public function GoHome_Page(){


        $this->views('Owner/home',null);
    }

    public function GoDentis_Page(){


        $this->views('dentist/index',null);
    }

}

?>