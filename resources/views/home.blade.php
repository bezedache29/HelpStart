@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <x-card title="Dashboard">
        
                @if (session('status'))
                    <x-alert type="success">
                        {{ session('status') }}
                    </x-alert>
                @endif

                @if (!Auth::user()->hasCompletedProfile())
                    <x-alert>
                        Vous devez renseigner votre profile <a href="{{ route('profile.edit') }}">Modifier mon profil</a>
                    </x-alert>
                @endif

                @if (Auth::user()->needs_moderation && Auth::user()->hasCompletedProfile())
                    <x-alert type="info">
                        Votre profil est en attente de validation
                    </x-alert>
                @endif

                @if (Auth::user()->needs_edition)
                    <x-alert>
                        Votre profil doit être modifié <a href="{{ route('profile.edit') }}">Modifier mon profil</a>
                    </x-alert>
                @endif

                

            </x-card>

        </div>
    </div>
</div>
@endsection
