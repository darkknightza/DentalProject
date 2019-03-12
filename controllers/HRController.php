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
           echo "<script type='text/javascript'>alert('ทำรายการสำเร็จ');
        window.location='/UserTypeController/Topage/".$user['userType_id']."';
        </script>";
        }else{
            echo "<script type='text/javascript'>alert('ทำรายไม่สำเร็จ');
        window.location='/UserTypeController/Topage/".$user['userType_id']."';
        </script>";
        }
    }
    public function ManageUsers(){
        $alluser = $this->model->GetAllUser();
        $this->views('HR/HRManage',[
            'alluser' =>$alluser
        ]);
    }
    public function EditUser($id){
        $user = $this->model->GetUser($id);
        $usertype = $this->model->getUserType();
        $this->views('HR/EditUser',[
            'user' =>$user,
            'type' => $usertype
        ]);
    }
    public function UpdateUser(){
        $id = filter_input(INPUT_POST, 'user_id',FILTER_SANITIZE_STRING);
        $name = filter_input(INPUT_POST, 'name',FILTER_SANITIZE_STRING);
        $usertype = filter_input(INPUT_POST, 'usertype',FILTER_SANITIZE_STRING);
        $data = [
            'name' => $name,
            'usertype' => $usertype,
            'id' => $id
        ];
        if($result){
           echo "<script type='text/javascript'>alert('ทำรายการสำเร็จ');
        window.location='/UserTypeController/Topage/".$user['userType_id']."';
        </script>";
        }else{
            echo "<script type='text/javascript'>alert('ทำรายไม่สำเร็จ');
        window.location='/UserTypeController/Topage/".$user['userType_id']."';
        </script>";
        }
    }
    public function DeleteUser($id){
        $user= Session::get('user');
        $user_id = $user['user_id'];
        $this->model->ChangeUserPermissionPatient($id,$user_id);
        $this->model->ChangeUserPermissionTreatment($id,$user_id);
        $this->model->ChangeUserPermissionTransaction($id,$user_id);
        $result = $this->model->DeleteUser($id);
        if($result){
           echo "<script type='text/javascript'>alert('ทำรายการสำเร็จ');
        window.location='/UserTypeController/Topage/".$user['userType_id']."';
        </script>";
        }else{
            echo "<script type='text/javascript'>alert('ทำรายไม่สำเร็จ');
        window.location='/UserTypeController/Topage/".$user['userType_id']."';
        </script>";
        }
    }
    public function EditPassword($id){
        $user = $this->model->GetUser($id);
        $this->views('HR/EditPassword',[
            'user' =>$user
        ]);
    }
    public function UpdatePassword(){
        $password = filter_input(INPUT_POST, 'password',FILTER_SANITIZE_STRING);
        $pass = password_hash($password, PASSWORD_DEFAULT);
        $id = filter_input(INPUT_POST, 'user_id',FILTER_SANITIZE_STRING);
        $result = $this->model->UpdatePassword($pass,$id);
        if($result){
           echo "<script type='text/javascript'>alert('ทำรายการสำเร็จ');
        window.location='/UserTypeController/Topage/".$user['userType_id']."';
        </script>";
        }else{
            echo "<script type='text/javascript'>alert('ทำรายไม่สำเร็จ');
        window.location='/UserTypeController/Topage/".$user['userType_id']."';
        </script>";
        }
    }

}



?>