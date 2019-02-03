<?php
namespace core\Cotroller;
use core\View;
use core\Session;

class Controller
{
    
    public function __construct()
    {
        header('Content-type: text/html; charset=utf-8');
        require_once 'core/View.php';
        $this->viwes = new View();

    }

    public function check_login()
    {
        Session::init();
        $user = Session::get('user');
        if ($user == '') {
            header('location:/LoginControllers/formlogin');
        }
    }

    protected function views($view, $data = [], $inc = FALSE)
    {
        $this->viwes->render($view, $inc, $data);
    }
}

?>