@extends('layouts.app')

@section('content')
<div class="container">
   <x-card>
       <x-form route="profile.update">
           {{-- @foreach($courses as $course)
                <x-form.checkbox field="$courses[]" :value="$course->id" :label="$course->name" :checked="$profile->courses->contains($course->id)" />
           @endforeach --}}
           <x-form.multi-checkbox label="Matières" :value="$profile->courses->pluck('id')->all()" field="courses" :values="$courses->pluck('full_name', 'id')->all()" />

           <x-form.submit label="Valider" />
       </x-form>
   </x-card>
</div>
@endsection