<?php
class Lecturer extends Course{
    public static $lecturerName;
    public static $lecturerEmail;
    

    public static function fetchLecturers($connection,$data,$table){
        return static::selectData($connection,$data,$table);
    }
    public static function addCountToMaterial($connection,$table,$columnvalues,$where){
        return static::editData($connection,$table,$columnvalues,$where);
    }
}

?>