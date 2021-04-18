<x-card title="Nouvelle demande">
    <x-form wire="storeHelp">
        <x-form.input field="title" label="Titre" wire="title" />
        <x-form.textarea field="content" label="Mon problème" rows="15" wire="content" />
        <x-form.files field="files" label="fichiers" wire="files" />
        <x-form.multi-checkbox field="tags" wire="tags" label="Tags" :values="$tags->pluck('name', 'id')->all()" />
        <x-form.textarea field="awailability" label="Mes dispos" wire="awailability" />
        <x-form.select wire="visibility" field="visibility" label="Qui peut voir ma demande ?" :values="App\Models\HelpRequest::$visibilities_values" />
        <x-form.submit />
    </x-form>
</x-card>
