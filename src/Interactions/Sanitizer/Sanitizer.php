<?php

namespace Bot\Interactions\Sanitizer;

/**
 * 
 */
 class Sanitizer
 {
    /**
     * Make sanitized name value
     * 
     * @param  string $value
     * @return string
     */
    public static function makeNameValue(string $value) : string
    {
        $value = filter_var(self::makeStripTagsValue($value), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
        $value = self::makeTrimmedValue($value);
        $value = self::makeLower($value);
        $value = self::makeUpperFirst($value);
        return $value;
    }

    /**
     * [$value description]
     * @var string
     */
    public static function makeStripTagsValue(string $value)
    {
        return strip_tags($value);
    }

    /**
     * [makeTrimmedValue description]
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public static function makeTrimmedValue(string $value)
    {
        return trim(ltrim($value, '/'));
    }

    public static function makeLower(string $value)
    {
        return strtolower($value);
    }

    public static function makeUpperFirst(string $value)
    {
        return ucfirst($value);
    }


}




