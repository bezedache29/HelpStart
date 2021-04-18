<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class CreateHelp extends Component
{
    public $tags;

    public function render()
    {
        $this->tags= Tag::orderBy('name')->get();
        return view('livewire.create-help');
    }

    public function storeHelp()
    {
        
    }
}
