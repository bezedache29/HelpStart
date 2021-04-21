<?php

namespace App\Http\Livewire;

use App\Models\Student;
use App\Models\Teacher;
use Livewire\Component;
use App\Models\Administator;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Component
{
    public $name = '';
    public $firstname = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $profile = '';

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'firstname' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'profile' => 'in:student,administrator,teacher'
    ];

    public function render()
    {
        return view('livewire.create-user');
    }

    public function addUser()
    {
        $data = $this->validate();

        switch ($data['profile']) {

            case 'student';

                $profile = Student::create();
                break;

            case 'teacher';

                $profile = Teacher::create();
                break;

            default;

                $profile = Administator::create();
                break;
        }

        $profile->user()->create([
            'name' => $data['name'],
            'firstname' => $data['firstname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'needs_moderation' => true
        ]);

        $this->resetInfos();

        // Emits des données
        $this->emit('userAdded');
    }

    public function resetInfos()
    {
        $this->name = '';
        $this->firstname = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->profile = '';
    }
}
