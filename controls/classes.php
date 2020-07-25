<?php
    function my_autoload($class){
            include 'classes/' . $class . '.class.php';
    }
    
    spl_autoload_register("my_autoload");
?>