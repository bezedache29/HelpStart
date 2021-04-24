<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ChatRoom;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{
    protected $listeners = ['chatRoomCreated' => 'render'];

    public function render()
    {
        return view('livewire.chat', [
            'chatRooms' => ChatRoom::whereHas('users', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->get()
        ]);
    }
}
