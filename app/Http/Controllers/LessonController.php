<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Course;
use App\Models\Lesson;
use App\Rules\OrderRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LessonController extends Controller
{
    public function show($id, Lesson $lesson)
    {
        // $lesson = Lesson::orderBy('order', 'ASC')->find($lesson->id);
        $lesson = Lesson::where('course_id', $id)->orderBy('order', 'ASC')->findOrFail($lesson->id);

        return view('lesson.show', compact('lesson'));
    }

    public function create(int $id)
    {
        $course = Course::find($id);
        
        // Pour avoir la liste des ordres
        $lessons = Lesson::where('course_id', $id)->get();

        return view('lesson.create', compact('course', 'lessons'));
    }

    public function store(Request $request, $id)
    {
        // On cré une rule spéciale pour order afin d'éviter que plusieurs orders identique apprtiennent a un seul cours
        $data = $request->validate([
            'title' => ['required', 'max:255'],
            'order' => ['required', 'numeric', new OrderRule($id)],
            'description' => ['required', 'max:10000'],
            'files' => 'array',
        ]);

        $data['course_id'] = $id;

        $lesson = Lesson::create($data);

        // Si un fichier est uploadé
        if (isset($data['files'])) {

            foreach ($data['files'] as $uploaded_file) {
                // On cré le fichier
                $file = $lesson->files()->create([
                    'filename' => $uploaded_file->getClientOriginalName()
                ]);
    
                // On déplace le fichier et on le renomme
                $uploaded_file->storeAs('lesson/' . $id . '/' . $lesson->id, $file->id . ' - ' . $uploaded_file->getClientOriginalName());
            }

        }

        return redirect()->route('course.lesson.show', [$id, $lesson->id])->with('success', $lesson->title . ' a bien été créé');
    }

    public function downloadFile($course_id, Lesson $lesson, $file_id)
    {
        $file = File::whereHasMorph('attachement', Lesson::class, function ($query) use ($lesson) {
            $query->where('id', $lesson->id);
        })->findOrFail($file_id);

        return Storage::download('lesson/' . $course_id . '/' . $lesson->id . '/' . $file->id . ' - ' . $file->filename, $file->filename);
    }
}
