<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HelpRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'student_id', 'content', 'awailability', 'status', 'visibility'];

    protected $width = ['tags', 'student.user', 'anwers'];

    static public $visibilities_values = [
        0 => 'Tout le monde',
        1 => 'Seulement les étudiants',
        2 => 'Seulement les étudiants de ma section',
        3 => 'Seulement les étudiants de ma classe',
    ];

    static public $status_values = [
        0 => 'en cours',
        1 => 'résolue'
    ];

    public function tags()
    {
        return $this->belongsToMany((Tag::class));
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'attachement');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function getVisibilityNameAttribute()
    {
        return static::$visibilities_values[$this->visibility] ?? $this->visibility;
    }

    public function getStatusNameAttribute()
    {
        return static::$status_values[$this->status];
    }
}
