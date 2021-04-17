@extends('layouts.app')

@section('content')
    <div class="container">
        <x-card>
            <h1 class="mb-5 mt-2 text-center">Liste des leçons de {{ $course->name }} pour {{ $course->promotion->name }}</h1>

            @can('lesson-create')
                <a href="{{ route('course.lesson.create', $course->id) }}" class="btn btn-primary">Ajouter une leçon</a>
            @endcan

            <table class="table mt-5 w-100">
                <thead>
                    <tr>
                        <th scope="col" style="width: 10%">Ordre</th>
                        <th scope="col" style="width: 40%">Nom de la leçon</th>
                        <th scope="col" style="width: 15%" class="text-center">Option</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($course->lessons as $lesson)
                        <tr>
                            <td style="width: 10%">{{ $lesson->order }}</td>
                            <td style="width: 40%">{{ $lesson->title }}</td>
                            <td style="width: 15%" class="text-center"><a href="{{ route('course.lesson.show', [$course->id, $lesson->id]) }}" class="btn btn-primary">Voir la leçon</a></td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </x-card>
    </div>
@endsection