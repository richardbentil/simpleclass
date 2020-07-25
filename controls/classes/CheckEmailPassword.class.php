<?php
    class CheckEmailPassword extends Query{
        public static function checkmail($connection,$data,$table,$where){
            return static::selectDataWhere($connection,$data,$table,$where);
        }

        public static function checkpassd($connection,$data,$table,$where){
            return static::selectDataWhere($connection,$data,$table,$where);
        }

        public static function checkbothEmailandPassword($connection,$data,$table,$where){
            return static::selectDataWhere($connection,$data,$table,$where);
        }
    }
?>