<?php
use core\Session;
use core\Cotroller\Controller;
use models\finance_model;


class FinanceController extends Controller
{
    private $model;
    public function __construct(){
        parent::__construct();
        require_once 'models/finance_model.php';
        $this->model = new finance_model();
        Session::init();
    }
    public function index(){
        $this->views('finance/index',null);
    }
    public function ViewAllProduct(){
        $Products = $this->model->getAllproduct();
        $this->views('finance/ProductList',[
            'Products' =>$Products
        ]);
    }
    public function FormAddProduct(){
        $this->views('finance/AddProduct',null);
    }
    public function InsertProduct(){
        $productName = filter_input(INPUT_POST, 'productName',FILTER_SANITIZE_STRING);
        $Price = filter_input(INPUT_POST, 'Price',FILTER_SANITIZE_STRING);
        $data = [
            'productName' =>  $productName,
            'Price' => $Price
        ];
        $result = $this->model->Insertproduct($data);
        echo '<script>alert("ทำรายการสำเร็จ"); window.location = "/FinanceController/ViewAllProduct" </script>';
    }
    public function FormEditProduct($id){
        $Product = $this->model->getproductById($id);
        $this->views('finance/EditProduct',[
            'Product' =>$Product
        ]);
    }
    public function UpdateProduct(){
        $product_id = filter_input(INPUT_POST, 'product_id',FILTER_SANITIZE_STRING);
        $productName = filter_input(INPUT_POST, 'productName',FILTER_SANITIZE_STRING);
        $Price = filter_input(INPUT_POST, 'Price',FILTER_SANITIZE_STRING);
        $data = [
            'product_id' => $product_id,
            'productName' =>  $productName,
            'Price' => $Price
        ];
        $result = $this->model->Updateproduct($data);
        echo '<script>alert("ทำรายการสำเร็จ"); window.location = "/FinanceController/ViewAllProduct" </script>';
    }
    public function DeleteProduct($id){
        $result = $this->model->Deleteproduct($id);
        echo '<script>alert("ทำรายการสำเร็จ"); window.location = "/FinanceController/ViewAllProduct" </script>';
    }
    public function ViewListIncome(){
        $AllIncome = $this->model->getAllIncome();
        $this->views('finance/ManageIncome',[
            'AllIncome' =>$AllIncome
        ]);
    }
    public function FormAddIncome(){
        $this->views('finance/AddIncome',null);
    }
    public function InsertIncome(){
        $Income = filter_input(INPUT_POST, 'Income',FILTER_SANITIZE_STRING);
        $detail = filter_input(INPUT_POST, 'detail',FILTER_SANITIZE_STRING);
        $amount = filter_input(INPUT_POST, 'amount',FILTER_SANITIZE_STRING);
        $user= Session::get('user');
        if($Income == 1){
            $Income = 'รับ';
        }else{
            $Income = 'จ่าย';
        }
        $data = [
            'Income' =>  $Income,
            'detail' => $detail,
            'amount' =>$amount,
            'user_id' => $user['user_id']
        ];
        $result = $this->model->InsertIncome($data);
        echo '<script>alert("ทำรายการสำเร็จ"); window.location = "/FinanceController/ViewListIncome" </script>';
    }
    public function FormEditIncome($id){
        $Income = $this->model->getIncomeById($id);
        $this->views('finance/EditIncome',[
            'Income' =>$Income
        ]);
    }
    public function UpdateIncome(){
        $id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING);
        $Income = filter_input(INPUT_POST, 'Income',FILTER_SANITIZE_STRING);
        $detail = filter_input(INPUT_POST, 'detail',FILTER_SANITIZE_STRING);
        $amount = filter_input(INPUT_POST, 'amount',FILTER_SANITIZE_STRING);
        if($Income == 1){
            $Income = 'รับ;';
        }else{
            $Income = 'จ่าย';
        }
        $data = [
            'Income' =>  $Income,
            'detail' => $detail,
            'amount' =>$amount,
            'id' => $id
        ];
        $result = $this->model->UpdateIncome($data);
        echo '<script>alert("ทำรายการสำเร็จ"); window.location = "/FinanceController/ViewListIncome" </script>';
    }
    public function ViewBill(){
        $getBill = $this->model->getBill();
        $this->views('finance/BillList',[
            'getBill' => $getBill
        ]);
    }
}