<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class ChatWindow extends Component
{
    public $chatRoom;

    public $newMessage = '';

    protected $rules = [
        'newMessage' => 'required'
    ];

    public function render()
    {
        // $this->chatRoom->load(['chatMessages']);

        return view('livewire.chat-window', [
            'users' => $this->chatRoom->users,

            // 'chatMessages' => $this->chatRoom->chatMessages
            // OU pour utiliser le cache on enleve le load en haut et on le met dans la closure
            // Ici permet de récupérer les messages de cache avec la clé chat-messagesLeNumeroUniqueDeLaChatRoom
            // Si cette clé n'existe pas, la closure permet de récupérer les messages de la chatRoom dans la BDD
            // Et les données seront mis en cache avec la clé créé par rememberForever
            'chatMessages' => Cache::rememberForever('chat-messages-' . $this->chatRoom->key, function () {
                $this->chatRoom->load(['chatMessages']);
                return $this->chatRoom->chatMessages;
            })
            
        ]);
    }

    public function sendMessage()
    {
        $this->validate();

        $this->chatRoom->chatMessages()->create([
            'content' => $this->newMessage,
            'user_id' => Auth::id(),
        ]);

        $this->newMessage = '';
    }
}
