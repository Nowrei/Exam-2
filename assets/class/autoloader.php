<?php

class Autoloader {

    static function register() {

        spl_autoload_register(array('Autoloader', 'autoload'));
    }

    static function autoload($class_name){
        require 'assets/class/' . $class_name . '.php';
    }
    
}