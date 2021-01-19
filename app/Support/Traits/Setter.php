<?php


namespace App\Support\Traits;


trait Setter
{
    public static function make(...$params) : self
    {
        return new static(...$params);
    }

    public function set(array $options) : self
    {
        foreach ($options as $key => $value) {
            $this->$key = $value;
        }

        return $this;
    }
}
