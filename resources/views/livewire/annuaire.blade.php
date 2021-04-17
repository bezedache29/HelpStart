<x-card>
    <label for="search">Recherche</label>
    <input type="text" name="search" id="search" class="form-control" wire:model.debounce.500ms="search">

    @if ($search)
        <p class="mt-3 mb-0">Résultats pour : "{{ $search }}" :</p>
    @endif

    <br>

    <table class="table table-striped">
        <thead>
            <tr>
                <th><span wire:click="orderBy('name')">Nom</span>
                    @if ($order === 'name')
                        @if ($sorting === 'ASC')
                            <i class="bi bi-caret-down-fill" wire:click="sortBy('DESC')"></i>
                        @else
                            <i class="bi bi-caret-up-fill" wire:click="sortBy('ASC')"></i>
                        @endif
                    @endif
                </th>
                <th><span wire:click="orderBy('firstname')">Prénom</span>
                    @if ($order === 'firstname')
                        @if ($sorting === 'ASC')
                            <i class="bi bi-caret-down-fill" wire:click="sortBy('DESC')"></i>
                        @else
                            <i class="bi bi-caret-up-fill" wire:click="sortBy('ASC')"></i>
                        @endif
                    @endif
                </th>
                <th><span wire:click="orderBy('email')">E-mail</span>
                    @if ($order === 'email')
                        @if ($sorting === 'ASC')
                            <i class="bi bi-caret-down-fill" wire:click="sortBy('DESC')"></i>
                        @else
                            <i class="bi bi-caret-up-fill"wire:click="sortBy('ASC')"></i>
                        @endif
                    @endif
                </th>
                <th>Fonction</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->function }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Aucun résultats pour votre recherche ...</td>
            </tr>
            @endforelse

        </tbody>
    </table>

    {{ $users->links() }}

</x-card>
