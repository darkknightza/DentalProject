<?php
namespace core;

class View {
    
    function __construct() {
        //echo 'this is the view';
    }
    
    public function render($name, $noInclude = false, $data = [])
    {
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

