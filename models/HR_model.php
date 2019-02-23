<?php
namespace models;
use core\Model;
use PDO;

class HR_model extends Model
{
    
    public function __construct(){
        parent::__construct();
        
        
    }
    
    public function getUserType(){
        $sql ="SELECT * FROM user_type";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function InsertUser($data){
        $sql ="INSERT INTO user (name,username,password,userType_id) VALUES(:name,:username,:password,:userType_id)";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':name', $data['name']);
        $pstm->bindParam(':username', $data['username']);
        $pstm->bindParam(':password', $data['pass']);
        $pstm->bindParam(':userType_id', $data['usertype']);
        return $pstm->execute();
    }
    public function UpdateUser($data){
        $sql ="UPDATE user SET name = :name ,userType_id = :userType_id WHERE user_id = :id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':name', $data['name']);
        $pstm->bindParam(':id', $data['id']);
        $pstm->bindParam(':userType_id', $data['usertype']);
        return $pstm->execute();
    }
    public function UpdatePassword($pass,$id){
        $sql ="UPDATE user SET password = :password WHERE user_id = :id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':password',$pass);
        $pstm->bindParam(':id', $id);
        return $pstm->execute();
    }
    public function DeleteUser($id){
        $sql ="DELETE FROM `user` WHERE user_id = :id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':id', $id);
        return $pstm->execute();
    }
    public function GetAllUser(){
        $sql ="SELECT * FROM `user` INNER JOIN user_type ON `user`.userType_id = user_type.userType_id";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
    public function GetUser($id){
        $sql ="SELECT * FROM `user` INNER JOIN user_type ON `user`.userType_id = user_type.userType_id WHERE user_id = :id";
        $pstm = $this->connect->prepare($sql);
        $pstm->bindParam(':id', $id);
        $pstm->execute();
        return $pstm->fetch(PDO::FETCH_ASSOC);
    }



    
    
    
}