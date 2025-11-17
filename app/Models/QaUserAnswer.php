<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QaUserAnswer extends Model
{
    protected $table = 'qa_user_answers';

    protected $fillable = [
        'user_id',
        'question_id',
        'answer_id',
    ];
}
