<?php
class Course extends Query{
    public static $courseName, $courseCode;

    public static function createCourse($connection,$table,$dbvalues,$values){
        return static::insertData($connection,$table,$dbvalues,$values);
    }
    public static function checkCourses($connection,$data,$table,$where){
        return static::selectDataWhereAll($connection,$data,$table,$where);
    }
    public static function checkCourseExist($connection,$data,$table,$where){
        return static::selectDataWhere($connection,$data,$table,$where);
    }
    public static function editCourse($connection,$data,$table,$where){

    }
    
    public static function deleteCourse($connection,$data,$table,$where){

    }
}

?>