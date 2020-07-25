<?php
class Student extends Query{
    public static function fetchStudents($connection,$data,$table){
        return static::selectData($connection,$data,$table);
    }
}
?>