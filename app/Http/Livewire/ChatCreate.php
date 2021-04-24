<?php

namespace App\Http\Livewire;

use App\Models\ChatRoom;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ChatCreate extends Component
{
    public $showForm = false;
    public $numbers = [];

    public function render()
    {
        $users = [];

        if ($this->showForm) {
            $users = User::where('id', '<>', Auth::id())->get();
        }

        return view('livewire.chat-create', compact('users'));
    }

    public function addUser($user_id)
    {
        // On check qu'il n'y a pas de doublon
        if (!in_array($user_id, $this->numbers)) {
            $this->numbers[] = $user_id;
        }
    }

    public function removeUser($user_id)
    {
        $this->numbers = array_filter($this->numbers, function ($item) use ($user_id) {
            return $item != $user_id;
        });
    }

    public function createChatRoom()
    {
        $this->numbers[] = Auth::id();

        sort($this->numbers, SORT_NUMERIC);

        $key = md5(implode('-', $this->numbers));
        
        $chatRoom = ChatRoom::firstOrCreate([
            'key' => $key
        ]);

        // if ($chatRoom->wasRecentlyCreated) {

        // }

        // sync prend un tableau de clées primaire
        $chatRoom->users()->sync($this->numbers);

        $this->reset();
        $this->emit('chatRoomCreated');
    }
}
