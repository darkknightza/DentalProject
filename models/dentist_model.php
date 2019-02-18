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
}