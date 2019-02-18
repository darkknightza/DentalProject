<?php
use core\Session;
use core\Cotroller\Controller;

class Index extends Controller
{

    private $model;

    public function __construct()
    {
        parent::__construct();
        Session::init();
    }

    public function Index()
    {
        $user = session::get('user');
        $type = $user['userType_id'];
        if($type==null){
            $this->views('index/index',null);
            
        }else{
            if($type=='1'){
                $this->views('record/index',null);
                
            }else if($type=='2'){
                $this->views('HR/index',null);
            }else if($type=='5'){
                $this->views('dentist/index',null);
            }else if($type=='6'){
                $this->views('HR/index',null);
            }else{
                $this->views('index/index',null);
            }
        }
    }
    

    
}

