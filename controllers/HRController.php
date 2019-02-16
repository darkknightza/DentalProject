<?php
use core\Session;
use core\Cotroller\Controller;
use models\HR_model;

class HRController extends Controller
{

	private $model;
    public function __construct(){
        parent::__construct();
        require_once 'models/HR_model.php';
        $this->model = new HR_model();
        Session::init();
    }


    public function FROMAddUser(){
        $usertype = $this->model->getUserType();
        $this->views('HR/AddUser',[
            'type' => $usertype
        ]);
    }
    public function ADDUser(){
        $name = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, 'username',FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password',FILTER_SANITIZE_STRING);
        $usertype = filter_input(INPUT_POST, 'usertype',FILTER_SANITIZE_STRING);
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $data = [
            'name' => $name,
            'username' => $username,
            'pass' => $pass,
            'usertype' => $usertype
        ];
        $result = $this->model->InsertUser($data);
        if($result){
            echo '<script>alert("ทำรายการสำเร็จ");window.location = "/index"</script>';
        }else{
            echo '<script>alert("ทำรายการไม่สำเร็จ");window.location = "/index"</script>';
        }
    }
    public function ManageUsers(){
        $alluser = $this->model->GetUser();
        $this->views('HR/HRManage',[
            'alluser' =>$alluser
        ]);
    }

}



?>