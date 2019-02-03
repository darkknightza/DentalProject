<?php
use core\Cotroller\Controller;

class Index extends Controller
{

    private $model;

    public function __construct()
    {
        parent::__construct();
    }

    public function Index()
    {
        $this->views('index/index', null);
    }
    

    
}

