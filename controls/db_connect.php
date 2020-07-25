<?php 
try {
    //connect to the database
$dsn = 'mysql:host=localhost;dbname=id10812358_simpleclass';

$connection = new PDO($dsn, 'id10812358_richard', 'bentil1000');
    $errorInfo = $connection->errorInfo();
    if(isset($errorInfo[2])){
        $error = $errorInfo[2];
    }
} catch (Exception $e) {
    $error = $e->getMessage();
}
?>