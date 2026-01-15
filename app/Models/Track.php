<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [
        'user_id',
        'question_id',
        'track_number',
        'exercise_number',
        'listen_count',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
