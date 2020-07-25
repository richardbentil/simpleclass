<?php
    require_once("../initialize.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = '*';
        $table = "teachers_account";
        Lecturer::fetchLecturers($connection,$data,$table);
        if (Lecturer::$result) {
            echo Lecturer::$qry;
        } else {
            echo 'Data not fetched';
        }
    }
?>