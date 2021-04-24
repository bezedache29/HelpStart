<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'key'
    ];

    protected $with = [
        'users'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function chatMessages()
    {
        return $this->hasMany(ChatMessage::class);
    }
}
