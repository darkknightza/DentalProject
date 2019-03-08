<?php
namespace models;
use core\Model;
use PDO;

class owner_model extends Model{
		 public function __construct(){
        parent::__construct();
         

    }


    public function GetAllTransaction(){
        $sql ="SELECT * FROM `transaction_detail` ";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
	}


?>