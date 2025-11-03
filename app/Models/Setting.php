<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'gender',
        'age',
        'external_user_id',
        'image',
        'role',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
