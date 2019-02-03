<?php
use core\Cotroller\Controller;


class LeaveManagement extends Controller
{


    public function __construct()
    {
      parent::__construct();
    }

    public function index()
    {
        $this->views('leaveManagement/index/index', null);
    }

    public function formLeave($var)
    {
        switch ($var) {
            case 1:
                $this->views('leaveManagement/formLeave/formSickLeave',null);
                break;
            case 2:
                $this->views('leaveManagement/formLeave/formPersonLeave',null);
                break;
            case 3:
                $this->views('leaveManagement/formLeave/formMaternityLeave',null);
                break;
            case 4:
                $this->views('leaveManagement/formLeave/formVacationLeave',null);
                break;
            case 5:
                $this->views('leaveManagement/formLeave/formWifematernityLeave',null);
                break;
            case 6:
                $this->views('leaveManagement/formLeave/formOrdainLeave',null);
                break;
            case 7:
                $this->views('leaveManagement/formLeave/formSoldierLeave',null);
                break;   
            
            default:
                header('location:/index');
        }
        
    }
    

}

