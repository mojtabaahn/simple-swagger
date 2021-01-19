<?php

namespace App\Http\Livewire;

use App\Support\SpecFactory;
use Livewire\Component;
use Symfony\Component\Yaml\Exception\ParseException;

class Display extends Component
{
    protected $listeners = ['update' => 'setValue'];

    public $value = '';

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function render()
    {
        try {
            $output = SpecFactory::make($this->value);
        } catch (ParseException $exception) {
            $error = $exception->getMessage();
            $output = false;
        }

        return view('livewire.display', [
            'output' => $output,
            'error' => $error ?? false,
        ]);
    }
}
