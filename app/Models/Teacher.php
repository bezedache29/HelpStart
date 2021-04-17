<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'discord',
        'messenger',
        'instagram',
        'twitter',
        'linkedin',
    ];

    protected $with = [
        'courses'
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'profile');
    }

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
