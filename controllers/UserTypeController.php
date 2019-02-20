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
            if($type=='7'){
                $this->views('HR/index',null);
            }else if($type=='5'){
                $this->views('dentist/index',null);
            }else if($type=='8'||$type=='9'){
                $this->views('HR/index',null);
            }else{
                $this->views('index/index',null);
            }
        }
       
        
    }
}