<?php

namespace App\Http\Controllers;

use App\Mail\HelpRequestCommented;
use App\Models\Tag;
use App\Models\File;
use App\Models\Answer;
use App\Models\HelpRequest;
use App\Notifications\HelpRequestCommented as NotificationsHelpRequestCommented;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class HelpController extends Controller
{
    public function index()
    {
        // if (Auth::user()->isStudent()) {
        //     $help_requests = HelpRequest::where('visibility', 0)
        //     ->orWhere('visibility', 1)
        //     // On a besoin de faire un AND dans un orWhere
        //     ->orWhere(function ($query) {
        //         $query->where('visibility', 2)->whereHas('student.promotion', function ($query) {
        //             $query->where('section_id', Auth::user()->profile->promotion->section_id);
        //         });
        //     })
        //     ->orWhere(function ($query) {
        //         $query->where('visibility', 3)->whereHas('student', function ($query) {
        //             $query->where('promotion_id', Auth::user()->profile->promotion_id);
        //         });
        //     })
        //     ->latest()->paginate(5);
        // } else {
        //     $help_requests = HelpRequest::where('visibility', 0)->latest()->paginate(5);
        // }

        // return view('help.index', compact('help_requests'));
        return view('help.index');
    }

    public function show(HelpRequest $help_request)
    {
        // charge des relations entre helprequest et Files
        $help_request->load('files');

        // dd($help_request->answers);

        return view('help.show', compact('help_request'));
    }

    public function downloadFile(HelpRequest $help_request, $id)
    {
        $file = File::whereHasMorph('attachement', HelpRequest::class, function ($query) use ($help_request) {
            $query->where('id', $help_request->id);
        })->findOrFail($id);

        return Storage::download('help_request/' . $help_request->id . '/' . $file->id . ' - ' . $file->filename, $file->filename);
    }

    public function storeAnswer(Request $request, HelpRequest $help_request)
    {
        $data = $request->validate([
            'content' => 'required|max:10000',
        ]);

        $data['user_id'] = Auth::user()->id;

        $data['help_request_id'] = $help_request->id;

        $answer = Answer::create($data);

        // Ou
        // $help_request->answers()->create($data);

        // Envoie d'un mail au user qui a créé la demande d'aide
        // Mail::to($help_request->student->user->email)->send(new HelpRequestCommented($help_request, $answer));

        $help_request->student->user->notify(new NotificationsHelpRequestCommented($help_request, $answer));

        return redirect()->route('help.show', $help_request->id);
    }

    public function create()
    {
        $tags= Tag::orderBy('name')->get();
        return view('help.create', compact('tags'));
    }

    public function store(Request $request)
    {
        

        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:10000',
            'awailability' => 'nullable|max:10000',
            'visibility' => ['required', Rule::in(array_keys(HelpRequest::$visibilities_values))],
            'tags' => 'array|exists:tags,id',
            'files' => 'array',
        ]);

        // dd($request->file('files'));

        $data['student_id'] = Auth::user()->profile->id;

        $help_request = HelpRequest::create($data);
        
        $help_request->tags()->sync($data['tags']);

        // Si un fichier est uploadé
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

        return redirect()->route('help.index');
    }
}
