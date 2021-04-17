<div>
    @if (!$help_request)
    <x-card>
        <a href="{{ route('help.create') }}" class="btn btn-primary">Nouvelle demande</a>
    </x-card>

    <table class="table table-bordered">
        @foreach ($help_requests as $help_request)
            <tr>
                <td>{{ $help_request->title }}</td>
                <td>{{ $help_request->student->user->name }}</td>
                <td>{{ $help_request->visibility_name }}</td>
                <td>{{ $help_request->student->promotion->full_name }}</td>
                <td><button class="btn btn-primary" wire:click="showHelp({{ $help_request->id }})">Voir</button></td>
                {{-- <td><a href="{{ route('help.show', $help_request->id) }}">Voir</a></td> --}}
            </tr>
        @endforeach
    </table>
    
    <div class="d-flex justify-content-center">
        {{ $help_requests->links() }}
    </div>
    @else
        @livewire('help', compact('help_request'))
    @endif
</div>