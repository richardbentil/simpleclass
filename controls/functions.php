<?php
function databaseConnection(){
        //connect to the database
    $dsn = 'mysql:host=localhost;dbname=id10812358_simpleclass';
    
    $connection = new PDO($dsn, 'id10812358_richard', 'bentil1000');
        $errorInfo = $connection->errorInfo();
        if(isset($errorInfo[2])){
            $error = $errorInfo[2];
        }
  
}
 function test_input($data)
 {
     
     $dsn = 'mysql:host=localhost;dbname=id10812358_simpleclass';

     $connection = new PDO($dsn, 'id10812358_richard', 'bentil1000');
     // Test if connection occurred.
     $errorInfo = $connection->errorInfo();
     if(isset($errorInfo[2])){
         $error = $errorInfo[2];
     }
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     //$data = real_escape_string($connection, $data);
     return $data;
 }

 function get_header(){
     include('header.php');
 }

 
 function get_footer(){
    include_once('footer.php');
 }

 
 function get_front(){
    include('front.php');
 }

 function get_navbar(){
    include_once('navbar.php');
 }

 function checkPasswordSet(){
     if (isset($_SESSION['password'])) {
         
     } else {
         get_front();
     }
 }

 function get_page_name(){
    if (isset($_GET['page'])) {
        $GLOBALS['page'] = $_GET['page']; //getting page url
        echo '| ' . $pageName = $GLOBALS['page'];
    }else{
        echo '';
    }
}

function get_page(){
    get_navbar();
    if (isset($_GET['page'])) {
        $GLOBALS['page'] = $_GET['page']; //getting page url
        get_page_content($GLOBALS['page']);
    }else{
        include('front.php');
    }
}

function get_page_content($page){
    $pages = array('front','signup','login','myaccount','admin_signup','classes','courses','materials','students','lecturers');
    if(!empty($page)){
        if (in_array($page,$pages)) {
            $page .= '.php';
            include('components/'.$page);
        }else{
            include('404.php');
        } 
    }  
}

function get_page_dashboard(){
    if (isset($_GET['page'])) {
        $GLOBALS['page'] = $_GET['page']; //getting page url
        get_page_content($GLOBALS['page']);
    }else{
        include('components/gettingstarted.php');
    }
}
?>