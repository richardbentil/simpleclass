<?php
require_once("initialize.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['fetchMaterials'])) {
        $data = "*";
        $table = "materials";
        Material::fetchMaterials($connection,$data,$table);
        if (Material::$result) {
            echo Material::$qry;
        } else {
            echo 'Data not fetched';
        }
    }else{
        echo 'Data not fetched';

    }
}
?>