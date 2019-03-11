<?php
namespace models;
use core\Model;
use PDO;

class record_model extends Model
{

    public function __construct(){
        parent::__construct();
         

    }
    
    public function InsertPatient($data,$user_id){
        $sql ="insert into patient (patient_name,location,tel,Allergic,CongenitalDetail,BirthDate,UpdateBy) values(:patient,:location,:tel,:Allergic,:CongenitalDetail,:BirthDate,:UpdateBy)";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':patient', $data[0]);
        $pstm->bindParam(':location', $data[1]);
        $pstm->bindParam(':tel', $data[2]);
        $pstm->bindParam(':Allergic', $data[3]);
        $pstm->bindParam(':CongenitalDetail', $data[4]);
        $pstm->bindParam(':BirthDate', $data[5]);
        $pstm->bindParam(':UpdateBy', $user_id);
        $pstm->execute();
    }

    public function GetAllPatient(){
        $sql ="SELECT * FROM `Patient` ";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }


    public function GetAllDentist(){
        $sql ="SELECT * FROM `user` where userType_id = 5";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }


    public function GetAllQ_Status(){
        $sql ="SELECT * FROM `status`";
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
        $sql ="SELECT t.treatment_name as treatment_name,t.HowToTreatment as HowToTreatment,t.treatment_history_date as treatment_history_date,u.name as name  FROM treatment_history t INNER JOIN user u WHERE t.dentist_id = u.user_id and t.patient_id = :id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':id', $id);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }


    public function UpdatePatient($data){
        $sql ="UPDATE patient SET patient_name = :patient_name ,location = :location ,tel = :tel ,Allergic = :Allergic ,CongenitalDetail = :CongenitalDetail   WHERE patient_id = :id";

        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':patient_name', $data['name']);
        $pstm->bindParam(':location', $data['location']);
        $pstm->bindParam(':tel', $data['tel']);
        $pstm->bindParam(':Allergic', $data['Allergic']);
        $pstm->bindParam(':CongenitalDetail', $data['CongenitalDetail']);
        $pstm->bindParam(':id', $data['id']);
        return $pstm->execute();
    }

   


    

     public function DeletePatient($id){
        $sql ="DELETE FROM `patient` WHERE patient_id = :id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':id', $id);
        return $pstm->execute();
    }
    
    public function GetAllQ(){
        $sql ="SELECT p.patient_name as patientName,u.name as dentist,us.name as UpdateBy,t.Treatment_q_time as time,t.detail as detail,t.Time_arrive as arrive,s.status_name as status,s.color as color,t.status_id as status_id, t.treatment_Q_id as t_id FROM treatment_q t INNER JOIN patient p on t.patient_id = p.patient_id INNER join user u on t.dentist_id = u.user_id INNER join user us on t.UpdateBy = us.user_id INNER join status s on t.status_id=s.status_id WHERE t.Treatment_q_time > NOW() - INTERVAL 3 DAY and (t.status_id != 4||t.status_id != 5)   ORDER by t.Treatment_q_time";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }


    public function InsertPatient_Q($data){
        $sql ="insert into treatment_q (patient_id,dentist_id,UpdateBy,Treatment_q_time,status_id,detail) values(:patient_id,:dentist_id,:UpdateBy,:Treatment_q_time,:status_id,:detail)";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':patient_id', $data[0]);
        $pstm->bindParam(':dentist_id', $data[1]);
        $pstm->bindParam(':UpdateBy', $data[2]);
        $pstm->bindParam(':Treatment_q_time', $data[3]);
        $pstm->bindParam(':status_id', $data[4]);
        $pstm->bindParam(':detail', $data[5]);
        $pstm->execute();
        
           }


    public function GetQ_Detail($id){
        $sql ="SELECT p.patient_name as patientName,u.name as dentist,us.name as UpdateBy,t.Treatment_q_time as time,t.detail as detail,t.Time_arrive as arrive,s.status_name as status,s.color as color,t.status_id as status_id, t.treatment_Q_id as t_id FROM treatment_q t INNER JOIN patient p on t.patient_id = p.patient_id INNER join user u on t.dentist_id = u.user_id INNER join user us on t.UpdateBy = us.user_id INNER join status s on t.status_id=s.status_id  WHERE t.treatment_Q_id = :id ORDER by t.Treatment_q_time";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':id', $id);
        $pstm->execute();
        return $pstm->fetch(PDO::FETCH_ASSOC);
    }



    public function UpdateQ($data){
     $sql ="UPDATE treatment_q SET dentist_id = :dentist_id ,UpdateBy = :UpdateBy ,Treatment_q_time = :Treatment_q_time ,status_id = :status_id , detail = :detail , Time_arrive = :Time_arrive   WHERE treatment_Q_id = :id";

        
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':id', $data['id']);
        $pstm->bindParam(':dentist_id', $data['dentist']);
        $pstm->bindParam(':UpdateBy', $data['UpdateBy']);
        $pstm->bindParam(':Treatment_q_time', $data['bdaytime']);
        $pstm->bindParam(':status_id', $data['status']);
        $pstm->bindParam(':detail', $data['detail']);
        $pstm->bindParam(':Time_arrive', $data['Time_arrive']);
        return $pstm->execute();
    }

    
}

