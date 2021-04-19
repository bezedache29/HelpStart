<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HelpRequest;
use Illuminate\Support\Facades\Auth;

class Helps extends Component
{
    public $help_request = null;
    public $create = false;

    protected $listeners = ['closeCreate' => 'reload'];

    public function render()
    {
        if ($this->help_request && !$this->create) {
            return view('livewire.helps');

        } 
        elseif ($this->create && !$this->help_request) {
            return view('livewire.helps');
        } 
        elseif (!$this->help_request && !$this->create) {
            $help_requests = $this->checkAuth();
            return view('livewire.helps', compact('help_requests'));
        }
    }

    public function reload()
    {
        $this->create = false;
        $this->render();
    }

    public function showHelp($help_id)
    {
        $this->help_request = HelpRequest::find($help_id);
    }

    public function createHelp()
    {
        $this->create = true;
    }

    public function storeHelp()
    {
        
    }

    public function checkAuth()
    {
        if (Auth::user()->isStudent()) {
            $help_requests = HelpRequest::where('visibility', 0)
            ->orWhere('visibility', 1)
            // On a besoin de faire un AND dans un orWhere
            ->orWhere(function ($query) {
                $query->where('visibility', 2)->whereHas('student.promotion', function ($query) {
                    $query->where('section_id', Auth::user()->profile->promotion->section_id);
                });
            })
            ->orWhere(function ($query) {
                $query->where('visibility', 3)->whereHas('student', function ($query) {
                    $query->where('promotion_id', Auth::user()->profile->promotion_id);
                });
            })
            ->latest()->paginate(5);
        } else {
            $help_requests = HelpRequest::where('visibility', 0)->latest()->paginate(5);
        }

        return $help_requests;
    }
}
