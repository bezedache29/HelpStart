<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'phone',
        'discord',
        'messenger',
        'instagram',
        'twitter',
        'linkedin',
        'is_delegate',
        'promotion_id',
    ];

    protected $with = [
        'promotion'
    ];

    public function user()
    {
        return $this->morphOne(User::class, 'profile');
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
