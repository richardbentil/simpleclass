<?php
class Material extends Query{
    public static function uploadMaterial($connection,$table,$dbvalues,$values){
        return static::insertData($connection,$table,$dbvalues,$values);
    }
    public static function fetchMaterials($connection,$data,$table,$where){
        return static::selectDataWhereAll($connection,$data,$table,$where);
    }
    
}
?>