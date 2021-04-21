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
    public $showModal = false;
    public $showModalDel = false;

    public $user_del;
    
    public $name = '';
    public $firstname = '';
    public $email = '';
    public $user_id = null;

    public $addUserForm = false;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'resetPage',
        'userAdded' => 'closeAddUser'
    ];

    protected $rules = [
        'name' => 'required',
        'firstname' => 'required',
        'email' => 'required|email'
    ];

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

    public function showModal($user_id)
    {
        // Permet de reset les messages d'erreur a l'ouverture de la modal
        $this->resetValidation();

        $user = User::find($user_id);
        $this->name = $user->name;
        $this->firstname = $user->firstname;
        $this->email = $user->email;
        $this->user_id = $user->id;

        $this->showModal = true;
    }

    public function updatedName()
    {
        $this->validateOnly('name');
    }

    public function updatedFirstname()
    {
        $this->validateOnly('firstname');
    }

    public function updatedEmail()
    {
        $this->validateOnly('email');
    }

    public function updateUser()
    {
        $this->validate();

        User::where('id', $this->user_id)->update([
            'name' => $this->name,
            'firstname' => $this->firstname,
            'email' => $this->email,
        ]);

        $this->showModal = false;
        $this->user_id = null;
        $this->name = '';
        $this->firstname = '';
        $this->email = '';

        session()->flash('message', 'Le user a bien été mis à jour.');
    }

    public function addUser()
    {
        $this->addUserForm = true;
    }

    public function closeAddUser()
    {
        $this->addUserForm = false;
        session()->flash('message', 'L\'utilisteur a bien été créé');
    }

    public function showModalDel($user_id)
    {
        $this->user_del = User::find($user_id);
        $this->showModalDel = true;
    }

    public function delUser()
    {
        $this->user_del->delete();
        $this->showModalDel = false;
        session()->flash('message', 'L\'utilisteur a bien été supprimé');
    }
}