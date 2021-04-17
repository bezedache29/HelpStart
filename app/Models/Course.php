<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'promotion_id', 'teacher_id'];

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function getFullNameAttribute()
    {
        return $this->name . ' / ' . $this->promotion->full_name;
    }
}
