<?php
require_once("initialize.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
 //some variables to be used
    //signup
    if (isset($_POST['createClass'])) {
        $cName = Program::$class = test_input($_POST['className']);
        if (isset($cName)) {
            if (empty($cName)) {
                echo $msg = 'Class name is required';
            }elseif(!preg_match("/^[a-zA-Z ]*$/", $cName)){
                echo $msg = 'Enter text only for course name';
            }else{
                $data = "class_name";
                $table = "classes";
                $where = "WHERE $data = '$cName'";
                Program::checkClass($connection,$data,$table,$where);
                if (Program::$result == 1) {
                   echo $msg = 'Class already exist';
                } else {
                    $dbvalues = "(class_name,number_of_students)";
                    $values = "VALUES('$cName',0)";
                    Program::createClass($connection,$table,$dbvalues,$values);
                    if (Program::$result == 1) {
                        echo $msg = 'Class has been created successfully';    
                    } else {
                        echo $msg = 'Class registration failed';
                    }  
                }
            }
    }
}
    elseif (isset($_POST['fetchClass'])) {
        $data = '*';
        $table = "classes";
        Program::checkClass($connection,$data,$table);
        if (Program::$result) {
            echo Program::$qry;
        } else {
            echo 'Data not fetched';
        }
        
    }else{
        echo 'not set';
    }
}
?>