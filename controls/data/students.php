<?php
    require_once("../initialize.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = '*';
        $table = "account";
        Student::fetchStudents($connection,$data,$table);
        if (Student::$result) {
            echo Student::$qry;
        } else {
            echo 'Data not fetched';
        }
    }
?>