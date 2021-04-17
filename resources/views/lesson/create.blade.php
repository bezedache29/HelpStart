@extends('layouts.app')

@section('content')
    <div class="container">
        <x-card>
            <h1 class="mb-5 mt-2 text-center">Ajout Leçon pour {{ $course->full_name }}</h1>

            <h2 class="my-4">
                Liste des numéros d'ordre déjà utilisés :
                @forelse ($lessons as $lesson)
                    <span class="h4">{{ $lesson->order }}, </span>
                @empty
                    <span class="h4">Tous les numéros sont disponible</span>
                @endforelse
            </h2>

            <x-form route="course.lesson.store" routeId="{{ $course->id }}" files="true">
                <x-form.input field="title" label="Titre" />
                <x-form.input type="number" field="order" label="Ordre" />
                <x-form.textarea field="description" label="Ma description" rows="15" />
                <x-form.files field="files" label="Fichiers à uploader" />
                <x-form.submit label="Ajouter" />
            </x-form>
        </x-card>
    </div>
@endsection