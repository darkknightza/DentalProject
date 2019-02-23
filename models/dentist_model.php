<?php
namespace models;
use core\Model;
use PDO;
class dentist_model extends Model
{
    
    public function __construct(){
        parent::__construct();
        
        
    }
    public function getListTreatment() {
        $sql ="SELECT * FROM treatment_history INNER JOIN patient ON treatment_history.patient_id = patient.patient_id GROUP BY patient.patient_id";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function GetPatientDetail($id){
        $sql ="SELECT * FROM `Patient` where patient_id = :id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':id', $id);
        $pstm->execute();
        return $pstm->fetch(PDO::FETCH_ASSOC);
    }
    public function GetPatientHistory($id){
        $sql ="SELECT t.treatment_history_id,t.treatment_name as treatment_name,t.HowToTreatment as HowToTreatment,t.treatment_history_date as treatment_history_date,u.name as name  FROM treatment_history t INNER JOIN user u WHERE t.dentist_id = u.user_id and t.patient_id = :id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':id', $id);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
}