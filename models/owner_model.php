<?php
namespace models;
use core\Model;
use PDO;

class owner_model extends Model{
		 public function __construct(){
        parent::__construct();

         

    }


    public function GetAllTransaction(){
        $sql ="SELECT t.Transaction_id as id,t.Transaction_type as Transaction_type,t.Transaction_detail as Transaction_detail , t.amount as amount ,u.name as UpdateBy,t.time as time FROM transaction_detail t inner join user u where t.UpdateBy = u.user_id";
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

      public function FindTransaction($Fdate,$Ldate,$t1,$t2,$t3,$t4,$dentist){
        $sql ="SELECT t.Transaction_id as id,t.Transaction_type as Transaction_type,t.Transaction_detail as Transaction_detail , t.amount as amount ,u.name as UpdateBy, t.Time as time FROM transaction_detail t inner join user u where t.UpdateBy = u.user_id and (t.Time BETWEEN :Fdate and :Ldate) and (Transaction_type = :t1 || Transaction_type = :t2 || Transaction_type = :t3 || Transaction_type = :t4) and Transaction_detail like :dentist ";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Fdate',$Fdate);
        $pstm->bindParam(':Ldate',$Ldate);
        $pstm->bindParam(':t1',$t1);
        $pstm->bindParam(':t2',$t2);
        $pstm->bindParam(':t3',$t3);
        $pstm->bindParam(':t4',$t4);
        $pstm->bindParam(':dentist',$dentist);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FindSumIncomeTransaction($Fdate,$Ldate,$t1,$t3,$dentist){
        $sql ="SELECT sum(amount) as income FROM transaction_detail where (Transaction_type = :t1 || Transaction_type = :t3) and (Time BETWEEN  :Fdate and :Ldate)  and Transaction_detail like :dentist";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Fdate',$Fdate);
        $pstm->bindParam(':Ldate',$Ldate);
        $pstm->bindParam(':t1',$t1);
        $pstm->bindParam(':t3',$t3);
        $pstm->bindParam(':dentist',$dentist);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FindSumExpensesTransaction($Fdate,$Ldate,$t2,$t4,$dentist){
        $sql ="SELECT sum(amount) as expenses FROM transaction_detail where (Transaction_type = :t2 || Transaction_type = :t4) and (Time BETWEEN  :Fdate and :Ldate)  and Transaction_detail like :dentist";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Fdate',$Fdate);
        $pstm->bindParam(':Ldate',$Ldate);
        $pstm->bindParam(':t2',$t2);
        $pstm->bindParam(':t4',$t4);
        $pstm->bindParam(':dentist',$dentist);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetAllDentist(){
        $sql ="SELECT * FROM `user` where userType_id = 5 or userType_id = 7";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }





	}


?>