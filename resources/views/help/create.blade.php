@extends('layouts.app')

@section('content')
    <div class="container">
        <x-card title="Nouvelle demande">
            <x-form route="help.store" files="true">
                <x-form.input field="title" label="Titre" />
                <x-form.textarea field="content" label="Mon problème" rows="15" />
                <x-form.files field="files" label="fichiers" />
                <x-form.multi-checkbox field="tags" label="Tags" :values="$tags->pluck('name', 'id')->all()" />
                <x-form.textarea field="awailability" label="Mes dispos" />
                <x-form.select field="visibility" label="Qui peut voir ma demande ?" :values="App\Models\HelpRequest::$visibilities_values" />
                <x-form.submit />
            </x-form>
        </x-card>
    </div>
@endsection