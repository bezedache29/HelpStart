<div>
    <x-card>
        <x-form route="directory.index" method="get">
            <x-form.input label="Nom" field="search" value="{{ $search }}"></x-form.input>
            <x-form.submit />
        </x-form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Fonction</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->full_name }}</td>
                    <td>{{ $user->function }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </x-card>

    {{-- <form class="mb-3" action="{{ route('directory.index') }}" method="get">
        <label for="exampleFormControlInput1" class="form-label">Nom</label>
        <input type="text" class="form-control" name="search" value="{{ $search }}">
        <button class="btn btn-primary">Valider</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Fonction</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->full_name }}</td>
                <td>{{ $user->function }}</td>
            </tr>
            @endforeach
        </tbody>
    </table> --}}
</div>
