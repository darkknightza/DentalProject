<?php
use core\Cotroller\Controller;

class Dental extends Controller
{
    private $model;
    public function __construct()
    {
        parent::__construct();
        require_once 'models/login_model.php';
//         $this->model = new login_model();
    }
    public function Register()
    {
        $this->views('dental/Register');
    }
}


?>