<div>
    <x-card>

        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif

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
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
    
                @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->firstname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->function }}</td>
                    <td><button class="btn btn-primary" wire:click="showModal({{ $user->id }})">Modifier</button></td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">Aucun résultats pour votre recherche ...</td>
                </tr>
                @endforelse
    
            </tbody>
        </table>
    
        {{ $users->links() }}

        <div wire:loading wire:target="search">
            Recherche en cours ....
        </div>
    
    </x-card>

    @if ($showModal)
        <div class="modal show" tabindex="-1" style="display: block;">
            <div class="modal-dialog">
                <form class="modal-content" wire:submit.prevent="updateUser">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" aria-label="Close" wire:click="$set('showModal', false)">X</button>
                    </div>
                    <div class="modal-body">
                        <div>

                            <input type="text" name="name" class="form-control" wire:model.debounce.500ms="name" />
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror

                            <input type="text" name="firstname" class="form-control" wire:model.debounce.500ms="firstname" />
                            @error('firstname') <span class="text-danger">{{ $message }}</span> @enderror

                            <input type="text" name="email" class="form-control" wire:model.debounce.500ms="email" />
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" wire:click="$set('showModal', false)">Annuler</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>



