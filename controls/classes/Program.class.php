<?php
    class Program extends Query{
        public static $class;
        public static $department;
        public static $code;
        protected static $adminCode = 'j95r!p';

        private static function checkCode(){
            return static::$code == static::$adminCode;
        }

        public static function verifyCode(){
            return static::checkCode();
        }

        public static function checkClass($connection,$data,$table){
            return static::selectData($connection,$data,$table);
        }

        public static function createClass($connection,$table,$dbvalues,$values){
            return static::insertData($connection,$table,$dbvalues,$values);
        }
        
        protected function editClass(){

        }
        protected function deleteClass(){

        }
    }
?>