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
    public function DeleteIncome($id){
        $sql ="DELETE FROM `transaction_detail` WHERE Transaction_id = :id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':id', $id);
        return $pstm->execute();
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
        $sql ="SELECT * FROM treatment_q INNER JOIN treatment_history ON treatment_history.treatment_Q_id = treatment_q.treatment_Q_id
                INNER JOIN patient ON treatment_q.patient_id = patient.patient_id WHERE treatment_q.status_id = 3 GROUP BY
                treatment_history.treatment_Q_id";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getHistoryBill() {
        $sql ="SELECT * FROM treatment_q INNER JOIN treatment_history ON treatment_history.treatment_Q_id = treatment_q.treatment_Q_id
                INNER JOIN patient ON treatment_q.patient_id = patient.patient_id WHERE treatment_q.status_id = 5 GROUP BY
                treatment_history.treatment_Q_id";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getBillDetail($Id) {
        $sql ="SELECT patient.patient_id,treatment_q.treatment_Q_id,treatment_history.treatment_history_id,treatment_history.treatment_name,treatment_history.HowToTreatment,patient.patient_name,
                patient.tel,treatment_q.Time_arrive
                FROM treatment_q INNER JOIN patient ON treatment_q.patient_id = patient.patient_id
                INNER JOIN treatment_history ON treatment_history.treatment_Q_id = treatment_q.treatment_Q_id
                WHERE treatment_q.treatment_Q_id = :Id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Id', $Id);
        $pstm->execute();
        return $pstm->fetch(PDO::FETCH_ASSOC);
    }
    public function getProductByHisId($Id) {
        $sql ="SELECT product.productName,product_log.amount,product_log.totalPrice,product.product_id,product.Price FROM product_log
                INNER JOIN product ON product_log.product_id = product.product_id WHERE
                product_log.treatment_history_id = :Id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Id', $Id);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function GetProduct(){
        $sql ="SELECT * FROM product";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function DeleteProductlogByHisId($id){
        $sql ="DELETE FROM product_log WHERE treatment_history_id = :treatment_history_id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':treatment_history_id',$id);
        return $pstm->execute();
    }
    public function DeleteProductlogById($id){
        $sql ="DELETE FROM product_log WHERE product_id = :product_id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':product_id',$id);
        return $pstm->execute();
    }
    public function UpdateQueue($Qid){
        $sql ="UPDATE treatment_q SET status_id = 5 WHERE treatment_Q_id = :treatment_Q_id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':treatment_Q_id',$Qid);
        return $pstm->execute();
    }
    public function InsertProductlog($data){
        $sql ="INSERT INTO product_log (product_id,totalPrice,amount,treatment_history_id)
               VALUE(:product_id,:totalPrice,:amount,:treatment_history_id)";
        try {
            $this->connect->beginTransaction();
            $pstm = $this->connect->prepare($sql);
            $pstm->bindParam(':product_id',$data['product']);
            $pstm->bindParam(':totalPrice',$data['price']);
            $pstm->bindParam(':amount',$data['amount']);
            $pstm->bindParam(':treatment_history_id', $data['lastId']);
            $pstm->execute();
            $lastId = $this->connect->lastInsertId();
            $this->connect->commit();
            return $lastId;
        } catch (PDOException $e) {
            $this->connect->rollBack();
            echo $e->getMessage();
            return FALSE;
        }
        
    }
}