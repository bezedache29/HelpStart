@extends('layouts.app')

@section('content')
    <div class="container">
        <x-card>

            @forelse ($users as $user)

                @switch(true)
                    @case($user->isStudent() && $user->profile->promotion != null)
                        <div class="card" style="width: 18rem; margin-bottom: 10px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $user->name }} {{ $user->firstname }}</h5>
                                <br>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $user->email }}</h6>
                                <br>
                                <p class="card-text">{{ $user->profile->promotion->name }} {{ $user->profile->promotion->section->name }}</p>
                                <br>
                                <div class="d-flex">
                                    <a href="{{ route('moderation.approve', $user->id) }}" class="btn btn-success mr-1">Valider la modification</a>
                                    <a href="{{ route('moderation.deny', $user->id) }}" class="btn btn-danger ml-1">Refuser la modification</a>
                                </div>
                            </div>
                        </div>
                    @break;

                    @case((Auth::user()->isAdmin() && $user->isTeacher()) || ($user->isStudent() && $user->profile->promotion != null))
                    <div class="card" style="width: 18rem; margin-bottom: 10px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }} {{ $user->firstname }}</h5>
                            <br>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $user->email }}</h6>
                            <br>
                            <div class="d-flex">
                                <a href="{{ route('moderation.approve', $user->id) }}" class="btn btn-success mr-1">Valider la modification</a>
                                <a href="{{ route('moderation.deny', $user->id) }}" class="btn btn-danger ml-1">Refuser la modification</a>
                            </div>
                        </div>
                    </div>
                    @break;

                @endswitch

            @empty
                <p>Pas de profil à modérer</p>
            @endforelse
            
        </x-card>
    </div>
@endsection