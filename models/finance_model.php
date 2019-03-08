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
        $sql ="UPDATE product SET productName = :productName,Price =:Price";
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
}