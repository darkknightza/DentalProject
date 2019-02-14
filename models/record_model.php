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
    
    
}

