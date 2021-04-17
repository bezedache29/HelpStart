<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = Auth::user()->profile;

        switch (true) {

            case Auth::user()->isStudent();

                $promotions = Promotion::get();

                $view = 'student.edit';

                // On indique que l'on veut passer promotions a notre vue
                View::share('promotions', $promotions);
                break;
            
            case Auth::user()->isTeacher();

                $courses = Course::whereNull('teacher_id')->orWhere('teacher_id', $profile->id)->get();

                $view = 'teacher.edit';

                View::share('courses', $courses);

                break;

        }

        return view($view, compact('profile'));

        
    }

    public function update(Request $request)
    {

        switch (true) {

            case Auth::user()->isStudent():

                $data = $request->validate([
                    'promotion_id' => 'required|exists:promotions,id',
                    'phone' => 'nullable|digits:10',
                    'discord' => 'nullable|string',
                    'messenger' => 'nullable|url',
                    'instagram' => 'nullable|url',
                    'twitter' => 'nullable|url',
                    'linkedin' => 'nullable|url',
                ]);
        
                Auth::user()->profile->update($data);

                if (Auth::user()->profile->wasChanged('promotion_id') || Auth::user()->needs_edition) {
                    Auth::user()->update(['needs_moderation' => true]);
                }

                Auth::user()->update(['needs_edition' => false]);
        
                break;
            
            case Auth::user()->isTeacher():

                // Teacher Update

                $profile = Auth::user()->profile->id;

                $data = $request->validate([
                    'courses' => 'nullable|array|exists:courses,id',
                ]);

                // Where n'accepte pas de tableau en 2 eme parametre, mais whereIn oui
                Course::whereIn('id', $data['courses'] ?? [])->update(['teacher_id' => $profile]);

                // Autre solution moins perfomante car plus de requetes
                // foreach($data['courses'] as $course_id) {
                //     $course = Course::find($course_id);
                //     $course->teacher_id = Auth::user()->profile->id;
                //     $course->save();
                // }

                Course::whereNotIn('id', $data['courses'] ?? [])->where('teacher_id', $profile)->update(['teacher_id' => null]);

                Auth::user()->update(['needs_moderation' => true]);

                break;
        }
        
        return redirect()->route('home');
    }
}
