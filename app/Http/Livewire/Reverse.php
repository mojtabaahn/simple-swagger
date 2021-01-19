<?php

namespace App\Http\Livewire;

use App\Support\OpenApiToSpec;
use Livewire\Component;
use Symfony\Component\Yaml\Yaml;

class Reverse extends Component
{
    protected $listeners = ['update' => 'setValue'];

    public $value = '';

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function render()
    {
        return view('livewire.reverse', [
            'reverse' => $this->makeReverse()
        ]);
    }

    protected function makeReverse()
    {
        $source = json_decode($this->value,true);

        $result = app(OpenApiToSpec::class)($source ?? []);

        return Yaml::dump($result,10,1);
    }
}
