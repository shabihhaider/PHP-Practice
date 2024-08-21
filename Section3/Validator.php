<?php

class Validator {

    public static function string($value, $min = 1, $max = INF) { // INF is a constant in PHP that represents infinity and static means we can call this method without creating an instance of the class. It's like a pure function.
        
        $value = trim($value);
        
        return strlen($value) >= 1 && strlen($value) <= $max;
    }

    public static function email($value) {
        // Validator::email(shabih@example.com) => Accept
        // Validator::email(shabihsadasdscbsa) => Not Accept

        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}       