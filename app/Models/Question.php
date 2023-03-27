<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    protected $fillable=[
        'content',
        'answer',
        'user_id',
        'asked_at',
        'answered_at',
        'is_answered'

    ];

}
