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
    
    
    

    
    public function Topage($type){
        if($type==''){
            $this->views('index/index',null);

        }else{
        if($type=='1'){
            $this->views('record/index',null);

        }else{
             $this->views('index/index',null);

        }
    }
       
        
    }
}