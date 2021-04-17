<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ModerationController extends Controller
{
    public function index()
    {
        // if (Gate::allows('moderation')) {
        //     return view('moderation.index');
        // } else {
        //     // RETURN UNE VUE QUI INTERDIT OU REDIRECT AILLEURS
        // }

        // On affiche tous les comptes qui necessite une modération
        $users = User::where('needs_moderation', true)->get();

        return view('moderation.index', compact('users'));
    }

    public function approve($user_id)
    {
        User::where('id', $user_id)->update(['needs_moderation' => false]);

        return redirect()->route('moderation.index');
    }

    public function deny($user_id)
    {
        User::where('id', $user_id)->update([
            'needs_moderation' => false,
            'needs_edition' => true
        ]);

        return redirect()->route('moderation.index');
    }
}
