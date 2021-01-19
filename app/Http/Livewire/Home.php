<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Home extends Component
{
    public $tab = 'display';

    protected $listeners = [
        'setTab' => 'setTab',
        'update' => 'saveEditorState'
    ];

    public function saveEditorState($value)
    {
        Cache::forever('editor-state', $value);
    }

    public function setTab($tab)
    {
        $this->tab = $tab;
    }

    public function render()
    {
        return view('livewire.home');
    }
}
