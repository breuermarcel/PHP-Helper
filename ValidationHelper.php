<?php

class ValidationHelper {

    public $pattern[
        'int'           => '[0-9]+',
        'float'         => '[0-9\.,]+',
        'text'          => '[\p{L}0-9\s-.,;:!"%&()?+\'°#\/@]+',
        'email'         => '[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+[.]+[a-z-A-Z]'
    ];

    static function tryParse($value, $datatype) {
        switch ($datatype) {
            case "integer":
                return intval($value);
            case "float":
                return floatval($value);
            case "string":
                return strval($value);
            default:
                throw new \Exception("Please select Datatype.");
        }
    }

    static function isEmail($value) {
        if(filter_var($value, FILTER_VALIDATE_EMAIL))
            return true;
    }

    static function isFloat($value) {
        if(filter_var($value, FILTER_VALIDATE_FLOAT)) 
            return true;
    }

    static function isInt($value) {
        if(filter_var($value, FILTER_VALIDATE_INT)) 
            return true;
    }   

}