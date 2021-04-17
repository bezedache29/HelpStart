<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'firstname',
        'email',
        'password',
        'profile_id',
        'profile_type',
        'needs_moderation',
        'needs_edition',
    ];

    protected $with = [
        'profile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->morphTo();
    }

    public function Answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function isStudent()
    {
        return get_class($this->profile) == Student::class;
    }

    public function isTeacher()
    {
        return get_class($this->profile) == Teacher::class;
    }

    public function isAdmin()
    {
        return get_class($this->profile) == Administator::class;
    }

    public function hasCompletedProfile()
    {
        switch (true) {

            case $this->isStudent():

                return !empty($this->profile->promotion);
                break;

            case $this->isTeacher():

               return $this->profile->courses->isNotEmpty();
               break;
            
            default:

                return true;
        }
    }

    // On check si le profile user n'est pas en moderation et en edition
    public function isApproved()
    {
        return !$this->needs_moderation && !$this->needs_edition;
    }

    public function getFullNameAttribute()
    {
        return $this->firstname . ' ' . $this->name;
    }

    public function getFunctionAttribute()
    {
        switch (true) {
            case $this->isStudent():

                return 'Etudiant';

            case $this->isTeacher():

                return 'Intervenant';

            case $this->isAdmin():

                return 'Administration';

            default:
                
                return '';
        }
    }
}
