<?php
use core\Session;
use core\Cotroller\Controller;
use models\login_model;

class UserTypeController extends Controller
{
    private $model;
    public function __construct(){
        parent::__construct();
        Session::init();
    }
    
    
    

    
    public function Topage($type=null){
        if($type==null){
            $this->views('index/index',null);

        }else{
            if($type=='7'){ //เจ้าของคลีนิค
                $this->views('HR/index',null);
            }else if($type=='5'){ //หมอ
                $this->views('dentist/index',null);
            }else if($type=='8'||$type=='9'){ //พวกแอดมิน
                $this->views('HR/index',null);
            }else{ //พวกพนักงานที่เหลือ
                $this->views('index/index',null);
            }
        }
       
        
    }
}