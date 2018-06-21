<?php

class Tbl_types{
    public static function cast(Tbl_types &$b){
        return $b;
    }
    public static $email="email";
    public static $int="int";
    public static $string="string";
    
}

class Tbl_base{
    
    public static function cast(Tbl_base &$b){
        return $b;
    }
    
    public $name;
    public $type;
    public $error_message;
    
}