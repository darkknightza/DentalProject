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
        
        $condition= filter_input(INPUT_POST, 'condition',FILTER_SANITIZE_STRING);

        $dentist= filter_input(INPUT_POST, 'dentist',FILTER_SANITIZE_STRING);

        $dentist = '%'.$dentist.'%';
        $con='รับ(ค่าบริการ)';


        if($condition=='รับทั้งหมด'||$condition=='จ่ายทั้งหมด'){
            if($condition=='รับทั้งหมด'){
                $condition='รับ';
                $con='รับ(ค่าบริการ)';
                
            }else{
                $condition='จ่าย';
                $con='จ่าย(แพทย์)';
            }
            
            $allTransaction = $this->model->FindTransaction_All($Fdate,$Ldate,$condition,$con,$dentist);
            $allIncome = $this->model->FindSumIncomeTransaction_All($Fdate,$Ldate,$condition,$con,$dentist);
            $allExpenses = $this->model->FindSumExpensesTransaction_All($Fdate,$Ldate,$condition,$con,$dentist);

      
        }else if($condition=='รับรวม'){
            $allTransaction = $this->model->FindTransaction_Income($Fdate,$Ldate,$dentist);
            $allIncome = $this->model->FindSumIncomeTransaction_Income($Fdate,$Ldate,$dentist);
            $allExpenses = $this->model->FindSumExpensesTransaction_Income($Fdate,$Ldate,$dentist);


        }else{
            
            $allTransaction = $this->model->FindTransaction($Fdate,$Ldate,$condition,$dentist);
            $allIncome = $this->model->FindSumIncomeTransaction($Fdate,$Ldate,$condition,$dentist);
            $allExpenses = $this->model->FindSumExpensesTransaction($Fdate,$Ldate,$condition,$dentist);

        }
        

        //echo $dentist;

        




        
        $Dentist = $this->model->GetAllDentist();

        //print_r($Dentist);
        


         


        $this->views('Owner/index',[
            'allTransaction' =>$allTransaction,
            'allIncome' =>$allIncome,
            'allExpenses' =>$allExpenses,
            'Dentist' => $Dentist
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