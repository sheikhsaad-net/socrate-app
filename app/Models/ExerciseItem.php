<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExerciseItem extends Model
{
    protected $fillable = ['exercise_id', 'title', 'rate', 'time'];

    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
