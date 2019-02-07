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
        $this->views('index/index',null);
    }
    

    
}

