<?php
namespace models;
use core\Model;
use PDO;

class owner_model extends Model{
		 public function __construct(){
        parent::__construct();

         

    }


    public function GetAllTransaction(){
        $sql ="SELECT t.Transaction_id as id,t.Transaction_type as Transaction_type,t.Transaction_detail as Transaction_detail , t.amount as amount ,u.name as UpdateBy FROM transaction_detail t inner join user u where t.UpdateBy = u.user_id";
        $pstm = $this->connect->prepare($sql);
        $pstm->execute();
        return $pstm->fetchAll(PDO::FETCH_ASSOC);
    }
	}


?>