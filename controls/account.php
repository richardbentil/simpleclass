<?php
session_start();
require_once("initialize.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
    if (isset($_POST['signup'])) {
        $eml = Account::$email = test_input($_POST['email']);
        $psd = Account::$password = test_input($_POST['password']);
        $sch = test_input($_POST['school']);
        if (isset($sch)) {
                if (!filter_var($eml, FILTER_VALIDATE_EMAIL) == true) {
                    echo $msg = "Enter a valid email";  
                    }elseif (empty($psd)) {
                        echo $msg = 'Password is required';
                    } elseif (!preg_match("/^[a-zA-Z 0-9]*$/", $psd)) {
                            echo $msg = "Password should contain at least 8 characters of 1 digi";  
                        }else{
                            $data = "email";
                            $table = "account";
                            $where = "WHERE $data = '$eml'";
                            CheckEmailPassword::checkmail($connection,$data,$table,$where);
                            if (Account::$row) {
                               echo $msg = 'Email already exist';
                            } else {
                                $ps = password_hash("$psd", PASSWORD_ARGON2I);
                                $table = "account";
                                $dbvalues = "(email,psd,school)";
                                $values = "VALUES('$eml','$ps','$sch')";
                                Account::createAccount($connection,$table,$dbvalues,$values);
                                if (Account::$result) {

                                $_SESSION['userPassword'] = $psd;
                                $_SESSION['userEmail'] = $eml;
                                    echo $msg = 'user signed up';          
                                }
                            }
                        }
            }
        }elseif (isset($_POST['signupAdmin'])) {
            $eml = Account::$email = test_input($_POST['email']);
            $psd = Account::$password = test_input($_POST['password']);
            $sch = test_input($_POST['school']);
                if (!preg_match("/^[a-zA-Z ]*$/", $sch)) {
                    echo $msg = "Name should contain only text";  
                }elseif (!filter_var($eml, FILTER_VALIDATE_EMAIL) == true) {
                        echo $msg = "Enter a valid email";  
                        }elseif (empty($psd)) {
                            echo $msg = 'Password is required';
                        }
                         elseif (!preg_match("/^[a-zA-Z 0-9]*$/", $psd)) {
                                echo $msg = "Password should contain at least 8 characters of 1 digit";  
                            }else{
                                $data = "email";
                                $table = "teachers_account";
                                $where = "WHERE $data = '$eml'";
                                CheckEmailPassword::checkmail($connection,$data,$table,$where);
                                if (Account::$row) {
                                   echo $msg = 'Email already exist';
                                } else {
                                    $ps = password_hash("$psd", PASSWORD_ARGON2I);
                                    $dbvalues = "(email,psd,school,courses,materials)";
                                    $values = "VALUES('$eml','$ps','$sch',0,0)";
                                    Account::createAccount($connection,$table,$dbvalues,$values);
                                    if (Account::$result) {
                                        $_SESSION['adminPassword'] = $psd;
                                        $_SESSION['userEmail'] = $eml;
                                        echo $msg = 'admin signed up';    
                                    } else {
                                        echo $msg = 'Registration failed';
                                    }  
                                }
                            }
            }
        elseif (isset($_POST['login'])) {
            $eml = Account::$email = test_input($_POST['email']);
            $psd = Account::$password = test_input($_POST['password']);
            if (isset($psd)) {
                    if (!filter_var($eml, FILTER_VALIDATE_EMAIL) == true) {
                        echo $msg = "Enter a valid email";  
                        }elseif (empty($psd)) {
                            echo $msg = 'Password is required';
                        } else{
                                   
                                $data  = 'email,psd';
                                $table = 'account';
                                $where = "WHERE email = '$eml'";
                                
                                Account::login($connection,$data,$table,$where);
                                if (Account::$row) {
                                    $ps = Account::$row['psd'];
                                    if (password_verify($psd, $ps)) {    
                                        $_SESSION['userPassword'] = $psd;
                                        $_SESSION['userEmail'] = $eml;
                                        echo $msg = 'user loged in';    
                                    } else {
                                        echo $msg = 'Email/Password does not exist';    
                                    }  
                                }else{
                                    $table = 'teachers_account';
                                        Account::login($connection,$data,$table,$where);
                                        if (Account::$row) {
                                            $ps = Account::$row['psd'];
                                            if (password_verify($psd, $ps)) {    
                                                $_SESSION['adminPassword'] = $psd;
                                                $_SESSION['userEmail'] = $eml;
                                                echo $msg = 'admin loged in';    
                                            } else {
                                                echo $msg = 'Email/Password does not exist';    
                                            }   
                                        }else {
                                            echo $msg = 'Email/Password does not exist';    
                                        } 
                                }
                            }
                }
            }
    elseif (isset($_POST['loggedin'])) {
            if (isset($_SESSION['adminPassword'])) {
                echo $msg = 'admin already logged in';
            } elseif(isset($_SESSION['userPassword'])) {
                echo $msg = 'user already logged in';
            }
                                            
    }
    elseif (isset($_POST['logout'])) { 
        //remove all session variables
        session_unset();
        //destroy session
        session_destroy();
        echo $msg = 'logged out';
    } elseif (isset($_POST['fetchLecturer'])) {
        $data = '*';
        $table = "teachers_account";
        Lecturer::fetchLecturers($connection,$data,$table);
        if (Lecturer::$result) {
            echo Lecturer::$qry;
        } else {
            echo 'Data not fetched';
        }
    }elseif (isset($_POST['fetchStudents'])) {
        $data = '*';
        $table = "account";
        Student::fetchStudents($connection,$data,$table);
        if (Student::$result) {
            echo Student::$qry;
        } else {
            echo 'Data not fetched';
        }
    }
     else {
        echo $msg = 'not set';
    }
}
?>