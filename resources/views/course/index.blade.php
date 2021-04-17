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
            <h1 class="mb-5 mt-2 text-center">Liste de mes cours</h1>

            @can('course-create')
                <a href="{{ route('course.create') }}" class="btn btn-primary">Ajouter un cours</a>
            @endcan

            <table class="table mt-5 w-100">
                <thead>
                    <tr>
                        <th scope="col" style="width: 20%">Nom du cours</th>
                        <th scope="col" style="width: 20%">Promotion</th>
                        <th scope="col" style="width: 20%">Intervenant</th>
                        <th scope="col" style="width: 15%">Option</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($courses as $course)
                        <tr>
                            <td style="width: 20%">{{ $course->name }}</td>
                            <td style="width: 20%">{{ $course->promotion->name }}</td>
                            <td style="width: 20%">{{ $course->teacher->user->full_name }}</td>
                            <td style="width: 15%"><a href="{{ route('course.show', $course->id) }}" class="btn btn-primary">Voir les leçons</a></td>
                        </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </x-card>

    </div>
@endsection