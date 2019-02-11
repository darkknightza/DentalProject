<?php
use core\Session;
use core\Cotroller\Controller;
use models\login_model;

class LoginControllers extends Controller
{
    private $model;
    public function __construct(){
        parent::__construct();
        require_once 'models/login_model.php';
        $this->model = new login_model();
        Session::init();
    }
    public function logout(){
        Session::destroy();
        header('location:/LoginControllers/FormLogin');
    }
    
    public function FormLogin(){
        $this->views('dental/Login',null);
    }
    

    
    public function Login(){
       
        $username = filter_input(INPUT_POST, 'username',FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password',FILTER_SANITIZE_STRING);
        $result = $this->model->getPasswordByUsername($username);
        $passwordHash = $result['password']; 
        $userId = $result['user_id'];
        $pass = password_hash($password, PASSWORD_DEFAULT);
        if(password_verify($password, $passwordHash)){
            $user = $this->model->getUserDetail($userId);
            Session::set('user', $user);
            Session::set('userType_id', $user);

           header('location:/UserTypeController/Topage/'.$user['userType_id']);

        }else {
            $this->views('dental/Login',null);
        }
    }
}

