<?php
namespace core;

class View {
    
    function __construct() {
        Session::init();
        
    }
    
    public function render($name, $noInclude = false, $data = [])
    {
        $user = Session::get('user');
        if ($noInclude == true) {
            require 'views/' . $name . '.php';
        }
        else {
            require 'views/layout/header.php';
            require 'views/' . $name . '.php';
            require 'views/layout/footer.php';
        }
    }
    
}

