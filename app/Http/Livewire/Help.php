<?php

namespace App\Http\Livewire;

use App\Models\Answer;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Help extends Component
{
    public $help_request = null;

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

        $this->help_request->student->user->notify(new NotificationsHelpRequestCommented($this->help_request, $answer));

    }
}
