<?php
    class Query{
        public static $result,$num,$output,$qry,$row;

        public static function selectData($connection,$data,$table){
            $action = $connection->prepare("SELECT $data FROM $table");
            $action->execute();
            static::$result = $action->setFetchMode(PDO::FETCH_ASSOC);
            static::$row = $action->fetchAll();
            static::$qry = json_encode(static::$row);
        }

        public static function selectDataWhere($connection,$data,$table,$where){
            $action = $connection->prepare("SELECT $data FROM $table $where");
            $action->execute();
            static::$result = $action->setFetchMode(PDO::FETCH_ASSOC);
            static::$row = $action->fetch();
            static::$qry = json_encode(static::$row);
        }

        
        public static function selectDataWhereAll($connection,$data,$table,$where){
            $action = $connection->prepare("SELECT $data FROM $table $where");
            $action->execute();
            static::$result = $action->setFetchMode(PDO::FETCH_ASSOC);
            static::$row = $action->fetchAll();
            static::$qry = json_encode(static::$row);
        }
        protected static function insertData($connection,$table,$dbvalues,$values){
            $action = "INSERT INTO $table $dbvalues $values";
            static::$result = $connection->exec($action);
        }

        protected static function updateData($connection,$table,$columnvalues){
            $action = "UPDATE $table SET $columnvalues";
            $result = $connection->prepare($action);
            $result->execute();
            static::$num = $result->rowCount();
        }

        protected static function editData($connection,$table,$columnvalues,$where){
            $action = "UPDATE $table SET $columnvalues $where";
            $result = $connection->prepare($action);
            $result->execute();
            static::$num = $result->rowCount();
        }
        protected static function deleteData($connection,$table,$where){
            $action = "DELETE FROM $table $where";
            $connection->exec($action);
        }

        public static function fetchData($connection,$data,$table){
            static::selectData($connection,$data,$table);
        }

        public static function fetchDataWhere($connection,$data,$table,$where){
            static::selectData($connection,$data,$table,$where);
        }
    }

    
?>
