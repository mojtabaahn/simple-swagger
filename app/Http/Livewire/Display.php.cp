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

        $spec = [
            'openapi' => '3.0.0',
            'info' => [
                'title' => 'IQoala',
                'version' => '1.0.0'
            ],
            'paths' => [
                '/' => [
                    'get' => [
                        'summary' => 'Home: ' . $this->value,
                        'operationId' => 'home',
                    ]
                ]
            ],
        ];
        return view('livewire.display', [
            'output' => $output,
            'error' => $error ?? false,
            'spec' => $spec
        ]);
    }
}
