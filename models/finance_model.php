<?php
namespace models;
use core\Model;
use PDO;
use PDOException;
class finance_model extends Model
{
    public function __construct(){
        parent::__construct();
  
    }
    public function getAllproduct() {
        $sql ="SELECT * FROM product";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getproductById($id) {
        $sql ="SELECT * FROM product WHERE product_id = :productId";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':productId', $id);
        $pstm->execute();
        return $pstm->fetch(PDO::FETCH_ASSOC);
    }
    public function Insertproduct($data) {
        $sql ="INSERT INTO product (productName,Price) VALUE (:productName,:Price)";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':productName', $data['productName']);
        $pstm->bindParam(':Price', $data['Price']);
        return $pstm->execute();
    }
    public function Updateproduct($data) {
        $sql ="UPDATE product SET productName = :productName,Price =:Price WHERE product_id = :productId";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':productName', $data['productName']);
        $pstm->bindParam(':Price', $data['Price']);
        $pstm->bindParam(':productId', $data['product_id']);
        return $pstm->execute();
    }
    public function DeleteProduct($id) {
        $sql ="DELETE FROM product WHERE product_id = :id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':id', $id);
        return $pstm->execute();
    }
    public function getAllIncome() {
        $sql ="SELECT * FROM transaction_detail";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function InsertIncome($data) {
        $sql ="INSERT INTO transaction_detail (Transaction_type,Transaction_detail,amount,updateBy) VALUE (:Transaction_type,:Transaction_detail,:amount,:updateBy)";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Transaction_type', $data['Income']);
        $pstm->bindParam(':Transaction_detail', $data['detail']);
        $pstm->bindParam(':amount', $data['amount']);
        $pstm->bindParam(':updateBy', $data['user_id']);
        return $pstm->execute();
    }
    public function getIncomeById($id) {
        $sql ="SELECT * FROM transaction_detail WHERE Transaction_id = :id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':id', $id);
        $pstm->execute();
        return $pstm->fetch(PDO::FETCH_ASSOC);
    }
    public function UpdateIncome($data) {
        $sql ="UPDATE transaction_detail SET Transaction_type = :Transaction_type,Transaction_detail =:Transaction_detail,amount = :amount WHERE Transaction_id = :Transaction_id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Transaction_type', $data['Income']);
        $pstm->bindParam(':Transaction_detail', $data['detail']);
        $pstm->bindParam(':amount', $data['amount']);
        $pstm->bindParam(':Transaction_id', $data['id']);
        return $pstm->execute();
    }
    public function getBill() {
        $sql ="SELECT * FROM treatment_q WHERE status_id = 3";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
}