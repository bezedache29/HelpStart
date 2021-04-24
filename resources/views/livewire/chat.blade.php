<div class="fixed-bottom d-flex align-items-end justify-content-end mr-1" wire:poll.10s>
    {{-- @dump($chatRooms) --}}

    @foreach ($chatRooms as $chatRoom)
        <div wire:key="{{ $chatRoom->id }}">
            @livewire('chat-window', compact('chatRoom'), key($chatRoom->id))
        </div>
    @endforeach

    @livewire('chat-create')
</div>
