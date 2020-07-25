<?php
session_start();
    require_once("../initialize.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['fetchCourse'])) {
        if (isset($_SESSION['userEmail'])) {
        $eml = $_SESSION['userEmail'];
        //fetch email and compare to the session email to 
        //query appropriate course for students based on school
        $data = "email,school";
        $table = "account";
        $where = "WHERE email = '$eml'";
        Query::selectDataWhere($connection,$data,$table,$where);
        $email = Query::$row['email'];
        $sch = Query::$row['school'];
        
        if ($eml === $email) {
            //when email is found to be a student
            $where = "WHERE email = '$eml' AND school = '$sch'";
            $table = "registered_for";
        }else{
            //when email is found to be a lecturer
            $where = "WHERE lecturer_email = '$eml'";
            $table = "courses";
        }

        $data = "*";
        
        
        Course::checkCourses($connection,$data,$table,$where);
        if (Query::$row) {
            echo Query::$qry;
        } else {
            echo 'Data not fetched' . $eml;
        }
    }
}
    elseif (isset($_POST['fetchCourseSchool'])) {
        
        if (isset($_SESSION['userEmail'])) {
        
        $eml = $_SESSION['userEmail'];
  
        $data = "lecturer_email,school";
        $table = "courses";
        $where = "WHERE lecturer_email = '$eml'";
        
        Course::checkCourses($connection,$data,$table,$where);
            if (Query::$row) {
                echo Query::$qry;
            } else {
                echo 'Data not fetched stu';
            }
        } 
    }
    elseif (isset($_POST['fetchC'])) {
        
        if (isset($_SESSION['userEmail'])) {
        
        $eml = $_SESSION['userEmail'];
  
        $data = 'course_name,course_code,lecturer_email';
        $table = "courses";
        $where = "WHERE lecturer_email = '$eml'";
        Course::checkCourses($connection,$data,$table,$where);
            if (Query::$row) {
                echo Query::$qry;
            } else {
                $data = 'school';
                $table = "account";
                $where = "WHERE email = '$eml'";
                Account::selectDataWhere($connection,$data,$table,$where);
                if (Query::$row) {
                    $sch = Query::$row['school'];

                    $data = 'course_code,course_name,school';
                    $table = "courses";
                    $where = "WHERE school = '$sch'";
                    Course::checkCourses($connection,$data,$table,$where);
                    if (Query::$row) {
                        echo Query::$qry;
                    } else {
                        echo 'data not fecthed';
                    }
                    
                }
            }
        } 
    }
}
?>