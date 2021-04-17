<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Annuaire extends Component
{
    use WithPagination;

    public $search = '';
    public $order = 'name';
    public $sorting = 'ASC';

    protected $paginationTheme = 'bootstrap';

    protected $listenners = ['resetPage'];

    public function render()
    {
        return view('livewire.annuaire', [
            'users' => User::where('name', 'like', "%{$this->search}%")
                ->orWhere('firstname', 'like', "%{$this->search}%")
                ->orderBy($this->order, $this->sorting)
                ->paginate(2),
        ]);
    }

    // Permet de mettre à jour la pagination lors d'une recherche dans input search
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function orderBy($order)
    {
        $this->order = $order;
        $this->resetPage();
    }

    public function sortBy($sorting)
    {
        $this->sorting = $sorting;
        $this->resetPage();
    }


}
