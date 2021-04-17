<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        // On check les users pour envoyer la liste des cours qui leur correspond

        if (Auth::user()->isTeacher()) {

            $courses = Course::with('teacher')->where('teacher_id', Auth::user()->profile->id)->get();
            
        } elseif (Auth::user()->isStudent()) {
            
            $courses = Course::with('teacher')->where('promotion_id', Auth::user()->profile->promotion->id)->get();

        } else {

            $courses = Course::with('teacher')->orderBy('promotion_id')->get();

        }

        return view('course.index', compact('courses'));
    }

    public function create()
    {
        // Uniquement les admins peuvent créer les cours
        // Le reste on liste leurs cours

        $promotions = Promotion::get();

        // Besoins de tous les profs pour les mettres dans une liste déroulante
        $teachers = User::where('profile_type', 'App\Models\Teacher')->get();

        return view('course.create', compact('promotions', 'teachers'));
    }

    public function show(Course $course)
    {
        $course = Course::with('lessons')->find($course->id);

        return view('course.show', compact('course'));
    }

    public function store(Request $request) {

        $data = $request->validate([
            'name' => 'required|max:255',
            'promotion_id' => 'required|exists:promotions,id',
            'teacher_id' => 'required|exists:users,profile_id'
        ]);

        // On check que le nom du cours n'existe pas deja
        $isCourseExist = Course::where('name', $data['name'])->where('promotion_id', $data['promotion_id'])->first();

        if ($isCourseExist == null) {

            $course = Course::create($data);

            return redirect()->route('course.index')->with('success', $course->name . ' a bien été créé');

        } else {

            // Retour avec erreur
            return redirect()->route('course.create')->with('danger', 'Ce nom de cours existe déjà pour cet intervenant dans cette promotion');

        }

    }
}
