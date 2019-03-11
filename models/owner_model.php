<?php
namespace models;
use core\Model;
use PDO;

class owner_model extends Model{
		 public function __construct(){
        parent::__construct();

         

    }


    public function GetAllTransaction(){
        $sql ="SELECT t.Transaction_id as id,t.Transaction_type as Transaction_type,t.Transaction_detail as Transaction_detail , t.amount as amount ,u.name as UpdateBy FROM transaction_detail t inner join user u where t.UpdateBy = u.user_id";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetSumIncomeTransaction(){
        $sql ="SELECT sum(amount) as income FROM transaction_detail where Transaction_type = 'รับ'";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetSumExpensesTransaction(){
        $sql ="SELECT sum(amount) as expenses FROM transaction_detail where Transaction_type = 'จ่าย'";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

      public function FindTransaction($Fdate,$Ldate){
        $sql ="SELECT t.Transaction_id as id,t.Transaction_type as Transaction_type,t.Transaction_detail as Transaction_detail , t.amount as amount ,u.name as UpdateBy, t.Time FROM transaction_detail t inner join user u where t.UpdateBy = u.user_id and (t.Time BETWEEN :Fdate and :Ldate)";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Fdate',$Fdate);
        $pstm->bindParam(':Ldate',$Ldate);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FindSumIncomeTransaction($Fdate,$Ldate){
        $sql ="SELECT sum(amount) as income FROM transaction_detail where Transaction_type = 'รับ' and (Time BETWEEN  :Fdate and :Ldate)";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Fdate',$Fdate);
        $pstm->bindParam(':Ldate',$Ldate);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FindSumExpensesTransaction($Fdate,$Ldate){
        $sql ="SELECT sum(amount) as expenses FROM transaction_detail where Transaction_type = 'จ่าย' and (Time BETWEEN  :Fdate and :Ldate)";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Fdate',$Fdate);
        $pstm->bindParam(':Ldate',$Ldate);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }





	}


?>