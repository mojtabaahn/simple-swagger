<?php


namespace App\Support;


use App\Support\Traits\Setter;

class Path
{
    use Setter;

    public $method;

    public $path;

    public $group;

    public $description;

    public $summary;

    public array $parameters = [];

    public array $responses = [];
}
