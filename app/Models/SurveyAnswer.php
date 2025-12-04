<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    protected $fillable = [
        'entry_id',
        'question_id',
        'answer_id',
        'survey_question_1',
        'survey_question_2',
        'survey_question_3',
        'survey_question_4',
        'survey_question_5',
        'survey_question_6',
        'survey_question_7',
        'survey_question_8',
        'survey_question_9',
        'survey_question_10',
        'survey_question_11',
        'survey_question_12',
    ];

    public function qaEntry()
    {
        return $this->belongsTo(QaUserAnswer::class, 'entry_id');
    }

}
