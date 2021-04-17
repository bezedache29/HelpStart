<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['content', 'user_id', 'help_request_id'];

    public function HelpRequest()
    {
        return $this->belongsTo(HelpRequest::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
