<?php


namespace App\Support;


use App\Support\Traits\Setter;
use Symfony\Component\Yaml\Yaml;

class Spec
{
    use Setter;

    public $title;

    public $server;

    public $version;

    public $paths = [];

    public function addPath(Path $path)
    {
        $this->paths[] = $path;
    }

    public function toOpenApi($yaml = false)
    {
        $return = app(SpecToOpenApi::class)($this);
        if($yaml){
            $return = collect($return)->toJson(JSON_PRETTY_PRINT);
        }
        return $return;
    }
}
