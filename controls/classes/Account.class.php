<?php
    class Account extends Query{
        public static $name, $email, $phone, $password, $hash_password;
        var $psd = null;
        

        
        public static function set_hashed_password($psd){
            return static::$hash_password = password_hash(static::$password, PASSWORD_ARGON2I);
        }
        
        public static function createAccount($connection,$table,$dbvalues,$values){
           return static::insertData($connection,$table,$dbvalues,$values);
        }

        public static function login($connection,$data,$table,$where){
            return static::selectDataWhere($connection,$data,$table,$where);
        }

        public static function editAccount($connection,$table,$columnvalues,$where){
            return static::editData($connection,$table,$columnvalues,$where);
        }

        public static function deleteAccount($connection,$table,$where){
            return static::deleteData($connection,$table,$where);
        }
    }
?>