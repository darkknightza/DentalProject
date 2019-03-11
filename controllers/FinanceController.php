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
    public function DELETEIncome($id){
        $result = $this->model->DeleteIncome($id);
        echo '<script>alert("ทำรายการสำเร็จ"); window.location = "/FinanceController/ViewListIncome" </script>';
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
    public function VieHistoryBill(){
        $getBill = $this->model->getHistoryBill();
        $this->views('finance/HistoryBill',[
            'getBill' => $getBill
        ]);
    }
    public function FormBill($id){
        $getBillDetail = $this->model->getBillDetail($id);
        $getProductLog = $this->model->getProductByHisId($getBillDetail['treatment_history_id']);
        $getProduct= $this->model->GetProduct();
        $products = [];
        $productsAll = [];
        $arrayProtductNochoose = [];
        foreach ($getProductLog as $row){
            array_push($products, $row['product_id']);
        }
        foreach ($getProduct as $row){
            array_push($productsAll, $row['product_id']);
        }
        foreach (array_diff($productsAll,$products) as $row){
            $ProductNochoose= $this->model->getproductById($row);
            array_push($arrayProtductNochoose, $ProductNochoose);
        }
        $this->views('finance/BillDetail',[
            'getBillDetail' => $getBillDetail,
            'getProductLog' => $getProductLog,
            'arrayProtductNochoose' => $arrayProtductNochoose
        ]);
    }
    public function SubmitBill() {
        $treatment_history_id = filter_input(INPUT_POST, 'id',FILTER_SANITIZE_STRING);
        $treatment_Q_id = filter_input(INPUT_POST, 'treatment_Q_id',FILTER_SANITIZE_STRING);
        $product = $this->model->GetProduct();
        $count = count($product);
        if($treatment_Q_id){
            $this->model->UpdateQueue($treatment_Q_id);
        }
        $result = $this->model->DeleteProductlogByHisId($treatment_history_id);
        if($treatment_history_id){
            for($i = 0;$i<=$count;$i++){
                $product = filter_input(INPUT_POST, 'product'.$i,FILTER_SANITIZE_STRING);
                if($product){
                    $price = filter_input(INPUT_POST, 'price'.$i,FILTER_SANITIZE_STRING);
                    $amount = filter_input(INPUT_POST, 'amount'.$i,FILTER_SANITIZE_STRING);
                    $price = $price * $amount;
                    $data = [
                        'lastId' => $treatment_history_id,
                        'price' => $price,
                        'amount' => $amount,
                        'product' => $product
                    ];
                    $this->model->InsertProductlog($data);
                }
                
            }
        }

        echo '<script>alert("ทำรายการสำเร็จ"); window.location = "/FinanceController/PrintBill/'.$treatment_Q_id.'" </script>';
    }
    public function PrintBill($id){
        $getBillDetail = $this->model->getBillDetail($id);
        $Time_arrive = explode(' ', $getBillDetail['Time_arrive']);
        $date = explode('-', $Time_arrive[0]);
        $Time_arrive[0] = $date[2] . '/' . $date[1] . '/' . ($date[0] + 543);
        $getProductLog = $this->model->getProductByHisId($getBillDetail['treatment_history_id']);
        $this->views('finance/Bill',[
            'getBillDetail' => $getBillDetail,
            'getProductLog' => $getProductLog,
            'Time_arrive' => $Time_arrive
        ],TRUE);
    }
}