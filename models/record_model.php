<?php
namespace models;

use core\Model;
use PDO;

class record_model extends Model
{
    public function __construct(){
        parent::__construct();
    }
    
    public function InsertPatient(){
        
        $sql ="SELECT * FROM user WHERE username = :username";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':username', $username);
        $pstm->execute();
        return $pstm->fetch(PDO::FETCH_ASSOC);
    }
    
    
}

