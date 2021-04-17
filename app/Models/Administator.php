<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administator extends Model
{
    use HasFactory, SoftDeletes;

    public function user()
    {
        return $this->morphOne(User::class, 'profile');
    }
}
