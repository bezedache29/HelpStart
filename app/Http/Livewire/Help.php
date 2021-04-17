<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Help extends Component
{
    public $help_request = null;

    public function render()
    {
        return view('livewire.help');
    }
}
