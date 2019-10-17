<?php

class ValidateHelper {

    public static function validateValue($value, $datatype) {
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

    public static function validateArray($values, $datatypes) {
        foreach ($values as $value) {
            
        }
    }
}