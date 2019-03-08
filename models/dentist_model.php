<?php
namespace models;
use core\Model;
use PDO;
use PDOException;
class dentist_model extends Model
{
    
    public function __construct(){
        parent::__construct();
        
        
    }
    public function getListTreatment() {
        $sql ="SELECT * FROM treatment_q INNER JOIN treatment_history ON treatment_history.treatment_Q_id = treatment_q.treatment_Q_id
               INNER JOIN patient ON treatment_q.patient_id = patient.patient_id GROUP BY patient.patient_id";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getQueueNow() {
        $sql ="SELECT `user`.`name`,treatment_q.patient_id,treatment_q.dentist_id,treatment_q.Time_arrive,treatment_q.detail,
                patient.patient_name,treatment_q.treatment_Q_id FROM `user` INNER JOIN treatment_q ON treatment_q.dentist_id = `user`.user_id
                INNER JOIN patient ON treatment_q.patient_id = patient.patient_id WHERE status_id = 2 ORDER BY Time_arrive ASC";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getQueueByPatientID($id) {
        $sql ="SELECT * FROM treatment_q WHERE status_id = 2 AND patient_id = :id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':id', $id);
        $pstm->execute();
        return $pstm->fetch(PDO::FETCH_ASSOC);
    }
    public function GetPatientDetail($id){
        $sql ="SELECT * FROM `Patient` where patient_id = :id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':id', $id);
        $pstm->execute();
        return $pstm->fetch(PDO::FETCH_ASSOC);
    }
    public function GetProduct(){
        $sql ="SELECT * FROM product";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function InsertTreatment($data){
        $sql ="INSERT INTO treatment_history (treatment_name,HowToTreatment,treatment_Q_id,file) 
               VALUE(:treatment_name,:howtotreatment,:treatment_Q_id,:fileupload)";
        try {
            $this->connect->beginTransaction();
            $pstm = $this->connect->prepare($sql);
            $pstm->bindParam(':treatment_name', $data['treatment_name']);
            $pstm->bindParam(':howtotreatment', $data['howtotreatment']);
            $pstm->bindParam(':treatment_Q_id', $data['treatment_Q_id']);
            $pstm->bindParam(':fileupload', $data['fileupload']);
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
    public function UpdateQueue($Qid){
        $sql ="UPDATE treatment_q SET status_id = 3 WHERE treatment_Q_id = :treatment_Q_id";
            $pstm = $this->connect->prepare($sql);
            $pstm->bindParam(':treatment_Q_id',$Qid);
            return $pstm->execute();
    }
    public function InsertProductlog($lastId,$productId){
        $sql ="INSERT INTO product_log (product_id,treatment_history_id)
               VALUE(:product_id,:treatment_history_id)";
        try {
            $this->connect->beginTransaction();
            $pstm = $this->connect->prepare($sql);
            $pstm->bindParam(':product_id',$productId);
            $pstm->bindParam(':treatment_history_id', $lastId);
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
    public function InsertQueue($data){
        $sql ="INSERT INTO treatment_q (patient_id,dentist_id,UpdateBy,Treatment_q_time,detail)
               VALUE(:patient_id,:dentist_id,:UpdateBy,:Treatment_q_time,:detail)";
            $pstm = $this->connect->prepare($sql);
            $pstm->bindParam(':patient_id',$data['Patientid']);
            $pstm->bindParam(':dentist_id', $data['user_id']);
            $pstm->bindParam(':UpdateBy', $data['user_id']);
            $pstm->bindParam(':Treatment_q_time', $data['datetime']);
            $pstm->bindParam(':detail', $data['detail']);
            $pstm->execute();
    }
    public function GetPatientHistory($id){
        $sql ="SELECT * FROM patient INNER JOIN treatment_q ON treatment_q.patient_id = patient.patient_id
                INNER JOIN treatment_history ON treatment_history.treatment_Q_id = treatment_q.treatment_Q_id
                INNER JOIN `user` ON treatment_q.dentist_id = `user`.user_id WHERE patient.patient_id = :id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':id', $id);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
}