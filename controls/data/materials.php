<?php
session_start();
require_once("../initialize.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['fetchMaterials'])) {
          
        if (isset($_SESSION['userEmail'])) {
            
            $eml = $_SESSION['userEmail'];

        $data = "email,school";
        $table = "account";
        $where = "WHERE email = '$eml'";
        Query::selectDataWhere($connection,$data,$table,$where);
        $email = Query::$row['email'];
        $sch = Query::$row['school'];
        
        if ($email == $eml) {
            //when email is found to be a student
            $where = "WHERE school = '$sch'";
        }else{
            //when email is found to be a lecturer
            $where = "WHERE lecturer_email = '$eml'";
        }

      
        $data = "*";
        $table = "materials";
        Material::fetchMaterials($connection,$data,$table,$where);
        if (Query::$row) {
            echo Query::$qry;
        } else {
            echo 'Data not fetched';
        }
    }else{
        echo 'Data not fetched';

    }
}
}
?>