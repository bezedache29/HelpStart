<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    protected $with = [
        'section'
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' / ' . $this->section->name;
    }
}
