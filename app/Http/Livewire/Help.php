<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use App\Models\HelpRequest;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Notifications\HelpRequestCommented;

class Help extends Component
{
    public $help_request = null;
    public $help_id = null;

    public $content = '';

    protected $rules = [
        'content' => 'required|max:10000',
    ];

    public function render()
    {
        return view('livewire.help');
    }

    public function updatedContent()
    {
        $this->validateOnly('content');
    }

    public function answerHelp()
    {
        $data = $this->validate();

        $data['user_id'] = Auth::user()->id;

        $data['help_request_id'] = $this->help_request->id;

        $answer = Answer::create($data);

        // Ou
        // $help_request->answers()->create($data);

        // Envoie d'un mail au user qui a créé la demande d'aide
        // Mail::to($help_request->student->user->email)->send(new HelpRequestCommented($help_request, $answer));

        $this->help_request->student->user->notify(new HelpRequestCommented($this->help_request, $answer));

        $this->content = '';
        $this->help_id = $this->help_request->id;
        $this->help_request = HelpRequest::find($this->help_id);
    }
}
