<x-card>
    <h1>Création d'un utilisateur</h1>

    <x-form wire="addUser">
        {{-- Nom --}}
        <x-form.input field="name" label="Nom" wire="name" />
        {{-- Prénom --}}
        <x-form.input field="firstname" label="Prénom" wire="firstname" />
        {{-- E-mail --}}
        <x-form.input type="email" field="email" label="E-mail" wire="email" />
        {{-- Password --}}
        <x-form.input type="password" field="password" label="Mot de passe" wire="password" />
        {{-- Password confirm --}}
        <x-form.input type="password" field="password_confirmation" label="Confirmer mot de passe" wire="password_confirmation" />
        {{-- profile --}}
        <x-form.select wire="profile" field="profile" label="Profile de l'utilisateur ?" :values="App\Models\User::$profile_values" />

        <x-form.submit label="Ajouter" />
    </x-form>
</x-card>
