@extends('layouts.app')

@section('content')
<x-form.auth.container label="Login">

    <x-form route="login">

        <x-form.auth.group_row>

            <x-form.auth.label label="Adresse e-mail" field="email" />

            <x-form.auth.input field="email" auto="email" type="email" />

        </x-form.auth.group_row>


        <x-form.auth.group_row>

            <x-form.auth.label label="Password" field="password" />

            <x-form.auth.input field="password" auto="current-password" type="password" />

        </x-form.auth.group_row>

                       
        <x-form.auth.group_row>

            <x-form.auth.offset css="col-md-6">

                <x-form.auth.checkbox field="remeber" label="Remember me" />

            </x-form.auth.offset>

        </x-form.auth.group_row>

        
        <x-form.auth.group_row css="mb-0">

            <x-form.auth.offset css="col-md-8">

                <x-form.auth.button label="Login" />

                @if (Route::has('password.request'))
                    <x-form.auth.link label="Forgot Your Password?" route="password.request" />
                @endif

            </x-form.auth.offset>

        </x-form.auth.group_row>
                                
    </x-form.auth.offset>

</x-form.auth.container>
@endsection
