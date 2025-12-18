<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = ['user_id'];

    public function items()
    {
        return $this->hasMany(ExerciseItem::class);
    }
}
