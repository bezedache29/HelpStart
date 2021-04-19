<x-card title="Nouvelle demande">
    <x-form wire="storeHelp">
        <x-form.input field="title" label="Titre" wire="title" />
        <x-form.textarea field="content" label="Mon problème" rows="15" wire="content" />
        <x-form.files field="files" label="fichiers" wire="files" />
        <x-form.multi-checkbox field="tags" wire="tags" label="Tags" :values="$allTags->pluck('name', 'id')->all()" />
        <x-form.textarea field="awailability" label="Mes dispos" wire="awailability" />
        <x-form.select wire="visibility" field="visibility" label="Qui peut voir ma demande ?" :values="App\Models\HelpRequest::$visibilities_values" />
        <x-form.submit />
    </x-form>

    {{-- <p>{{ $title }}</p>
    <p>{{ $content }}</p>
    @if($files)
        @foreach ($files as $file)
            <p>{{ $file->getClientOriginalName() }}</p>
        @endforeach
    @endif
    @if($tags_selected)
        @foreach ($tags_selected as $tag_selected)
            <p>{{ $tag_selected }}</p>
        @endforeach
    @endif
    @dump($tags_selected)
    <p>{{ $awailability }}</p>
    <p>{{ $visibility }}</p> --}}
</x-card>