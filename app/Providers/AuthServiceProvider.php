<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\HelpRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Donne acces aux etudiants qui sont delégué
        Gate::define('moderation', function (User $user) {
            return ($user->isStudent() && $user->profile->is_delegate && $user->isApproved()) || $user->isAdmin();
        });

        Gate::define('help', function (User $user) {
            return $user->isApproved();
        });

        Gate::define('create-help-request', function (User $user) {
            return $user->isStudent() && Gate::forUser($user)->allows('help');
        });

        Gate::define('show-help-request', function (User $user, HelpRequest $help_request) {
            return $help_request->visibility == 0 || 
                ($help_request->visibility == 1 && $user->isStudent()) ||
                ($help_request->visibility == 2 && $user->isStudent() && $user->profile->promotion->section_id == $help_request->student->promotion->section_id) ||
                ($help_request->visibility == 3 && $user->isStudent() && $user->profile->promotion_id == $help_request->student->promotion_id);
        });

        Gate::define('course-create', function (User $user) {
            return $user->isAdmin() && Gate::forUser($user)->allows('help');
        });

        Gate::define('show-course', function (User $user, Course $course) {
            return (($user->isStudent() && $user->profile->promotion_id == $course->promotion_id) ||
                ($user->isTeacher() && $user->profile->courses->contains('id', $course->id)) ||
                ($user->isAdmin())) 
                && Gate::forUser($user)->allows('help');
        });

        Gate::define('lesson-create', function (User $user) {
            return $user->isTeacher() && Gate::forUser($user)->allows('help');
        });

        Gate::define('show-lesson', function (User $user, Lesson $lesson) {
            return (($user->isStudent() && $user->profile->promotion_id == $lesson->course->promotion_id) ||
                ($user->isTeacher() && $user->profile->courses->contains('id', $lesson->course_id)) ||
                ($user->isAdmin())) 
                && Gate::forUser($user)->allows('help');
        });
    }
}
