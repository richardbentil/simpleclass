<?php
session_start();
require_once("initialize.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
 //some variables to be used
    //signup
    if (isset($_POST['createCourse'])) {
        $cName = Course::$courseName = test_input($_POST['courseName']);
        $cCode = Course::$courseCode = test_input($_POST['courseCode']);
        $eml = test_input($_POST['email']);
        $sch = test_input($_POST['school']);
        $yr = test_input($_POST['year']);
        $sem = test_input($_POST['semester']);
        if (isset($eml)) {
            if (empty($cName)) {
                echo $msg = 'Course name is required';
            }elseif(!preg_match("/^[a-zA-Z ]*$/", $cName)){
                echo $msg = 'Enter text only for course name';
            }elseif(empty($cCode)){
                echo $msg = 'Course code is required';
            }elseif(!preg_match("/^[a-zA-Z 0-9 ]*$/", $cCode)){
                echo $msg = 'Course code should be a combination of digits and number';
            }else{
                $data = "course_code,school";
                $table = "courses";
                $where = "WHERE course_code = '$cCode' AND school = '$sch'";
                Course::checkCourseExist($connection,$data,$table,$where);
                if (Query::$row) {
                   echo $msg = 'Course already exist';
                } else {
                    
                    $dbvalues = "(course_name,course_code,lecturer_email,school,year,semester)";
                    $values = "VALUES('$cName','$cCode','$eml','$sch','$yr','$sem')";
                    Course::createCourse($connection,$table,$dbvalues,$values);
                    if (Course::$result) {
                        echo $msg = 'Course has been created successfully';    
                    } else {
                        echo $msg = 'Course registration failed';
                    }  
                }
            }
        }
    }elseif (isset($_POST['regCourse'])) {
        $cCode = Course::$courseCode = test_input($_POST['courseCode']);
        if (isset($_SESSION['userEmail'])) {
        
        $eml = $_SESSION['userEmail'];
        //fetch email and compare to the session email to 
        //register coursee
        $data = "email,course_code,school";
        $table = "registered_for";
        $where = "WHERE email = '$eml' AND course_code = '$cCode'";
        Query::selectDataWhere($connection,$data,$table,$where);    
        if (Query::$row) {
            echo 'You have already registered for this course';
        } else {
            
            
        $data = "email,school";
        $table = "account";
        $where = "WHERE email = '$eml'";
        Query::selectDataWhere($connection,$data,$table,$where);    
            if (Query::$row) {
                $sch = Query::$row['school'];
        
                $data = "course_name,course_code,school,year,semester";
                $table = "courses";
                $where = "WHERE course_code = '$cCode' AND course_code = '$cCode'";
                Query::selectDataWhere($connection,$data,$table,$where);
                if (Query::$row) {
                    $cName = Query::$row['course_name'];
                    $year = Query::$row['year'];
                    $sem = Query::$row['semester'];
                }
            } 
            $table = "registered_for";
            $dbvalues = "(email,course_code,course_name,school,year,semester)";
            $values = "VALUES('$eml','$cCode','$cName','$sch','$year','$sem')";
            Course::createCourse($connection,$table,$dbvalues,$values);
                if (Query::$result) {
                    echo 'You have successfully registered for this course';
                } else {
                    echo 'course was not registered';
                }
            }
        
      } 
        
    }elseif (isset($_POST['fetchCourseSchool'])) {
        
        if (isset($_SESSION['userEmail'])) {
            
            $eml = $_SESSION['userEmail'];
      
    $data = 'school';
    $table = "courses";
    $where = "WHERE lecturer_email = '$eml'";
    Course::checkCourses($connection,$data,$table,$where);
    if (Query::$row) {
        echo Query::$qry;
    } else {
        echo 'Data not fetched' .  $eml;
    }
  } 
    }
    else{
        echo 'not set';
    }
}
?>