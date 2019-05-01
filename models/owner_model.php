<?php
namespace models;
use core\Model;
use PDO;

class owner_model extends Model{
		 public function __construct(){
        parent::__construct();

         

    }


    public function GetAllTransaction(){
        $sql ="SELECT t.Transaction_id as id,t.Transaction_type as Transaction_type,t.Transaction_detail as Transaction_detail , t.amount as amount ,u.name as UpdateBy,t.time as time FROM transaction_detail t inner join user u where t.UpdateBy = u.user_id and 0";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetSumIncomeTransaction(){
        $sql ="SELECT ROUND(SUM(amount),2) as income FROM transaction_detail where (Transaction_type = 'รับ' or Transaction_type = 'รับ(ค่าบริการ)') and 0";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetSumExpensesTransaction(){
        $sql ="SELECT ROUND(SUM(amount),2) as expenses FROM transaction_detail where (Transaction_type = 'จ่าย' or Transaction_type = 'จ่าย(แพทย์)') and 0";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

      public function FindTransaction($Fdate,$Ldate,$condition,$dentist){
        $sql ="SELECT t.Transaction_id as id,t.Transaction_type as Transaction_type,t.Transaction_detail as Transaction_detail , t.amount as amount ,u.name as UpdateBy, t.Time as time FROM transaction_detail t inner join user u where t.UpdateBy = u.user_id and (t.Time BETWEEN :Fdate and :Ldate) and Transaction_type = :condition and Transaction_detail like :dentist ";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Fdate',$Fdate);
        $pstm->bindParam(':Ldate',$Ldate);
        $pstm->bindParam(':condition',$condition);
        $pstm->bindParam(':dentist',$dentist);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FindSumIncomeTransaction($Fdate,$Ldate,$condition,$dentist){
        $sql ="SELECT ROUND(SUM(amount),2) as income FROM transaction_detail where (Transaction_type = :condition and (Transaction_type ='รับ' or Transaction_type = 'รับ(ค่าบริการ)')) and (Time BETWEEN  :Fdate and :Ldate)  and Transaction_detail like :dentist";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Fdate',$Fdate);
        $pstm->bindParam(':Ldate',$Ldate);
        $pstm->bindParam(':condition',$condition);
        $pstm->bindParam(':dentist',$dentist);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FindSumExpensesTransaction($Fdate,$Ldate,$condition,$dentist){
        $sql ="SELECT ROUND(SUM(amount),2) as expenses FROM transaction_detail where (Transaction_type = :condition and (Transaction_type='จ่าย' or Transaction_type = 'จ่าย(แพทย์)')) and (Time BETWEEN  :Fdate and :Ldate)  and Transaction_detail like :dentist";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Fdate',$Fdate);
        $pstm->bindParam(':Ldate',$Ldate);
        $pstm->bindParam(':condition',$condition);
        $pstm->bindParam(':dentist',$dentist);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

          public function FindTransaction_All($Fdate,$Ldate,$condition,$con,$dentist){
        $sql ="SELECT t.Transaction_id as id,t.Transaction_type as Transaction_type,t.Transaction_detail as Transaction_detail , t.amount as amount ,u.name as UpdateBy, t.Time as time FROM transaction_detail t inner join user u where t.UpdateBy = u.user_id and (t.Time BETWEEN :Fdate and :Ldate) and ((Transaction_type = :condition)or(Transaction_type = :con)) and Transaction_detail like :dentist ";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Fdate',$Fdate);
        $pstm->bindParam(':Ldate',$Ldate);
        $pstm->bindParam(':condition',$condition);
        $pstm->bindParam(':dentist',$dentist);
        $pstm->bindParam(':con',$con);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FindSumIncomeTransaction_All($Fdate,$Ldate,$condition,$con,$dentist){
        $sql ="SELECT ROUND(SUM(amount),2) as income FROM transaction_detail where ((Transaction_type = :condition and Transaction_type = 'รับ')or(Transaction_type = :con and Transaction_type = 'รับ(ค่าบริการ)'))  and (Time BETWEEN  :Fdate and :Ldate)  and Transaction_detail like :dentist";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Fdate',$Fdate);
        $pstm->bindParam(':Ldate',$Ldate);
        $pstm->bindParam(':condition',$condition);
        $pstm->bindParam(':dentist',$dentist);
        $pstm->bindParam(':con',$con);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FindSumExpensesTransaction_All($Fdate,$Ldate,$condition,$con,$dentist){
        $sql ="SELECT ROUND(SUM(amount),2) as expenses FROM transaction_detail where ((Transaction_type = :condition and Transaction_type = 'จ่าย')or(Transaction_type = :con and Transaction_type = 'จ่าย(แพทย์)')) and (Time BETWEEN  :Fdate and :Ldate)  and Transaction_detail like :dentist";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Fdate',$Fdate);
        $pstm->bindParam(':Ldate',$Ldate);
        $pstm->bindParam(':condition',$condition);
        $pstm->bindParam(':dentist',$dentist);
        $pstm->bindParam(':con',$con);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

     public function FindTransaction_Income($Fdate,$Ldate,$dentist){
        $sql ="SELECT t.Transaction_id as id,t.Transaction_type as Transaction_type,t.Transaction_detail as Transaction_detail , t.amount*2 as amount ,u.name as UpdateBy, t.Time as time FROM transaction_detail t inner join user u where t.UpdateBy = u.user_id and (t.Time BETWEEN :Fdate and :Ldate) and Transaction_type = 'รับ(ค่าบริการ)' and Transaction_detail like :dentist ";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Fdate',$Fdate);
        $pstm->bindParam(':Ldate',$Ldate);
        $pstm->bindParam(':dentist',$dentist);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FindSumIncomeTransaction_Income($Fdate,$Ldate,$dentist){
        $sql ="SELECT ROUND(SUM(amount),2)*2 as income FROM transaction_detail where  Transaction_type = 'รับ(ค่าบริการ)' and (Time BETWEEN  :Fdate and :Ldate)  and Transaction_detail like :dentist";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Fdate',$Fdate);
        $pstm->bindParam(':Ldate',$Ldate);
        $pstm->bindParam(':dentist',$dentist);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }

    public function FindSumExpensesTransaction_Income($Fdate,$Ldate,$dentist){
        $sql ="SELECT ROUND(SUM(amount),2)*2 as expenses FROM transaction_detail where Transaction_type = 'ไม่รับ' and (Time BETWEEN  :Fdate and :Ldate)  and Transaction_detail like :dentist";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':Fdate',$Fdate);
        $pstm->bindParam(':Ldate',$Ldate);
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