<?php

class Validator
{
    public static function required($value)
    {
        return trim($value) !== '';
    }

    public static function email($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function number($value)
    {
        return is_numeric($value);
    }

    public static function min($value, $min)
    {
        return strlen(trim($value)) >= $min;
    }

    public static function maxFile($size, $maxMB = 2)
    {
        return $size <= ($maxMB * 1024 * 1024);
    }

    public static function maxSize($size, $maxMB = 2)
{
    return self::maxFile($size, $maxMB);
}
    public static function image($filename)
    {
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        return in_array($ext, [
            'jpg',
            'jpeg',
            'png',
            'gif',
            'webp'
        ]);
    }
}