@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- message errors --}}
        @if (session()->has('danger'))
            <div class="alert alert-danger" role="alert">
                {{ session()->get('danger') }}
            </div>
        @endif
        
        <x-card title="Ajout d'un cours">
            <x-form route="course.store">
                <x-form.input field="name" label="Titre" />
                <x-form.label field="promotion" label="Selectionner la promotion" />
                <select name="promotion_id" id="promotion" class="form-control">
                    @foreach ($promotions as $promotion)
                        <option value="{{ $promotion->id }}">{{ $promotion->name }} de {{ $promotion->section->name }}</option>
                    @endforeach
                </select>
                <br />
                <x-form.label field="teacher" label="Selectionner l'intervenant" />
                <select name="teacher_id" id="teacher" class="form-control">
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->profile_id }}">{{ $teacher->full_name }}</option>
                    @endforeach
                </select>
                <x-form.submit label="Ajouter" />
            </x-form>
        </x-card>

    </div>
@endsection