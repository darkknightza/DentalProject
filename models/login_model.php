<?php
namespace models;
use core\Model;
use PDO;

class login_model extends Model
{
    public function __construct(){
        parent::__construct();
    }
    
    public function getPasswordByUsername($username){
        
        $sql ="SELECT * FROM user WHERE username = :username";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':username', $username);
        $pstm->execute();
        return $pstm->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getUserDetail($userId){
        
        $sql ="SELECT user_type.userType_name,`user`.userType_id,`user`.`password`,`user`.username,`user`.`name`,`user`.user_id FROM `user`
               INNER JOIN user_type ON `user`.userType_id = user_type.userType_id where user_id = :userId ";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':userId', $userId);
        $pstm->execute();
        $result = $pstm->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}

