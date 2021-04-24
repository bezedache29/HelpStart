<div>
    <button class="btn btn-primary" wire:click="$set('showForm', true)">+</button>

    @if ($showForm)
        <table class="table">
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->full_name }}</td>
                    <td>
                        @if (in_array($user->id, $numbers))
                            <button class="btn btn-danger" wire:click="removeUser({{ $user->id }})">-</button>
                        @else
                            <button class="btn btn-primary" wire:click="addUser({{ $user->id }})">+</button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>

        <button class="btn btn-primary" wire:click="createChatRoom">Créer une room</button>
        
    @endif

    @dump($numbers)
</div>
