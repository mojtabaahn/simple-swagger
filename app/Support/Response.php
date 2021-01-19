<?php


namespace App\Support;


use App\Support\Traits\Setter;

class Response
{
    use Setter;

    public $code;

    public $description;

    public $example;
}
