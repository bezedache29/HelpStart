<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'description', 'order', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function files()
    {
        return $this->morphMany(File::class, 'attachement');
    }
}
