@extends('layouts.app')

@section('content')
    <div class="container">

        {{-- message success --}}
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif

        <x-card>
            <h1 class="mb-5 mt-2 text-center">Leçon {{ $lesson->order }} - {{ $lesson->title }}</h1>

            <blockquote class="blockquote">{{ $lesson->description }}</blockquote>
        </x-card>

        <br />

        <x-card title="Fichiers inclus à la leçon">
            @foreach($lesson->files as $file)
                <i class="bi bi-paperclip"></i><a href="{{ route('course.lesson.file', [$lesson->course_id, $lesson->id, $file->id]) }}">{{ $file->filename }}</a>
                <br>
            @endforeach
        </x-card>
    </div>
@endsection