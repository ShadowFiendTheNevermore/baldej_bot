<?php 

namespace Bot\Traits;

trait SessionStringSaver {


    /**
     * [makeRememberValue description]
     * @param  string $string [description]
     * @return [type]         [description]
     */
    public function makeRememberValue(string $value)
    {
        $value = $this->makeStripTagsValue($value);
        $value = $this->makeTrimmedValue($value);
        $value = $this->makeLower($value);
        $value = $this->makeUpperFirst($value);
        return $value;
    }

    /**
     * [$value description]
     * @var string
     */
    public function makeStripTagsValue(string $value)
    {
        return strip_tags($value);
    }

    /**
     * [makeTrimmedValue description]
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function makeTrimmedValue(string $value)
    {
        return trim($value);
    }

    public function makeLower(string $value)
    {
        return strtolower($value);
    }

    public function makeUpperFirst(string $value)
    {
        return ucfirst($value);
    }


}




