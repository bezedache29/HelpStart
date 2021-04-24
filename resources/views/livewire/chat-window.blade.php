<div class="border m-1 p-1" wire:poll>

    <div class="d-flex flex-column align-items-start">
        @forelse ($chatMessages as $chatMessage)
            <div class="border rounded p-2 m-1 @if($chatMessage->user->id == Auth::id()) bg-primary text-light align-self-end @endif">
                <div class="small">
                    {{ $chatMessage->user->firstname }} a dit : 
                </div>
                {{ $chatMessage->content }}
            </div>
        @empty
            Soyer le premier a parler
        @endforelse
    </div>
    

    <form wire:submit.prevent="sendMessage">
        <input type="text" class="form-control" wire:model="newMessage">
    </form>

    <div class="bg-dark text-light p-2">
        {{ $users->pluck('firstname', 'id')->except(Auth::id())->join(', ') }}
    </div>
</div>
