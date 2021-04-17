@extends('layouts.app')

@section('content')
<x-form.auth.container label="Register">

    <x-form route="register">

        <x-form.auth.group_row>

            <x-form.auth.label label="Nom" field="name" />

            <x-form.auth.input field="name" auto="name" />

        </x-form.auth.group_row>


        <x-form.auth.group_row>

            <x-form.auth.label label="Prénom" field="firstname" />

            <x-form.auth.input field="firstname" auto="firstname" />

        </x-form.auth.group_row>


        <x-form.auth.group_row>

            <x-form.auth.label label="Adresse e-mail" field="email" />

            <x-form.auth.input field="email" auto="email" type="email" />

        </x-form.auth.group_row>


        <x-form.auth.group_row>
            
            <x-form.auth.label label="Selectionnez votre profile" field="profile" />

            <div class="col-md-6">
                <select class="form-control" aria-label="Default select example" id="profile" name="profile">
                    <option value="student">Etudiant</option>
                    <option value="teacher">Enseignant</option>
                    <option value="administrator">Administration</option>
                </select>
            </div>

        </x-form.auth.group_row>


        <x-form.auth.group_row>

            <x-form.auth.label label="Mot de passe" field="password" />

            <x-form.auth.input field="password" auto="new-password" type="password" />

        </x-form.auth.group_row>


        <x-form.auth.group_row>

            <x-form.auth.label label="Confirmer mot de passe" field="password_confirmation" />

            <x-form.auth.input field="password_confirmation" auto="new-password" type="password" />

        </x-form.auth.group_row>

        <x-form.auth.group_row css="mb-0">

            <x-form.auth.offset>

                <x-form.auth.button />

            </x-form.auth.offset>

        </x-form.auth.group_row>

    </x-form>

</x-form.auth.container>
@endsection
