<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;
use App\Models\HelpRequest;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class CreateHelp extends Component
{
    
    use WithFileUploads;

    public $allTags;

    public $title = '';
    public $content = '';
    public $files = [];
    public $tags = [];
    public $awailability = '';
    public $visibility = '';

    protected $rules = [
        'title' => 'required|max:255',
        'content' => 'required|max:10000',
        'awailability' => 'nullable|max:10000',
        // 'visibility' => ['required', Rule::in(array_keys(HelpRequest::$visibilities_values))],
        'visibility' => 'required',
        'tags' => 'array|exists:tags,id',
        'files' => 'array'
    ];

    public function render()
    {
        $this->allTags= Tag::orderBy('name')->get();
        return view('livewire.create-help');
    }

    public function updatedTitle()
    {
        $this->validateOnly('title');
    }

    public function updatedContent()
    {
        $this->validateOnly('content');
    }

    public function updatedAwaibility()
    {
        $this->validateOnly('awaibility');
    }

    public function updatedVisibility()
    {
        $this->validateOnly('visibility');
    }

    public function updatedTags()
    {
        $this->validateOnly('tags');
    }

    public function updatedFiles()
    {
        $this->validateOnly('files');
    }

    public function storeHelp()
    {
        $data = $this->validate();

        $data['student_id'] = Auth::user()->profile->id;

        $help_request = HelpRequest::create($data);
        
        $help_request->tags()->sync($data['tags']);

        if (isset($data['files'])) {
            foreach ($data['files'] as $uploaded_file) {
                // On cré le fichier
                $file = $help_request->files()->create([
                    'filename' => $uploaded_file->getClientOriginalName()
                ]);
    
                // On déplace le fichier et on le renomme
                $uploaded_file->storeAs('help_request/' . $help_request->id, $file->id . ' - ' . $uploaded_file->getClientOriginalName());
            }
        }

        // On ferme ce composant pour ouvrir le composant helps avec message success
        $this->emit('closeCreate');
    }
}
