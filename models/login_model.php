<?php
namespace models;

use core\Model;
use PDO;

class login_model extends Model
{
    public function __construct(){
        parent::__construct();
    }
    
    public function getPasswordByUsername(){
        
        $sql ="SELECT * FROM `user_login` WHERE USER_ID = 1";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetch(PDO::FETCH_ASSOC);
        
    }
    
    public function getUserDetail($userId){
        
        $sql ="SELECT * FROM users where id = :userId ";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':userId', $userId);
        $pstm->execute();
        $result = $pstm->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

