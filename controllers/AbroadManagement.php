<?php
use core\Cotroller\Controller;
use models\login_model;

class AbroadManagement extends Controller
{
    private $model;
    public function __construct()
    {
        parent::__construct();
         require_once 'models/login_model.php';
         $this->model = new login_model();
    }
    public function index()
    {
        $result = $this->model->getPasswordByUsername();
        $this->views('abroadManagement/index/index', [
            'list' => $result,
            'date_now' => "22"
        ]);
    }
    public function formAbroad($var)
    {
        switch ($var) {
            case 1:
                $this->views('abroadManagement/formAbroad/form1', null);
                break;

            default:
                header('location:/index');
        }
    }
}
