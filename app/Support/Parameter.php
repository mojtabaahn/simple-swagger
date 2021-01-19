<?php


namespace App\Support;


use App\Support\Traits\Setter;

class Parameter
{
    use Setter;

    public ?bool $required;

    public $name;

    public $description;

    public $type;

    public $example;

    public $in;
}
