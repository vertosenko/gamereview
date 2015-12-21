<?php
ini_set('display_errors', 1);
require_once 'application/bootstrap.php';

//test
/*
class A {
    public static function whoAmI(){
        echo __CLASS__;
    }

    public static function identity(){
        self::whoAmI();
    }
}

class B extends A{
    public static function whoAmI(){
        echo __CLASS__;
    }
}

B::identity();*/