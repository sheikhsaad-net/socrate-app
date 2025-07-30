<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'age',
        'height_cm',
        'weight_kg',
        'profession',
        'education_level',
        'city',
    ];
}
