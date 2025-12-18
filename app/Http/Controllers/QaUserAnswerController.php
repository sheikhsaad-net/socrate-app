<?php

namespace App\Http\Controllers;

use App\Models\QaUserAnswer;
use App\Models\SurveyAnswer;
use App\Models\SurveyQuestion;
use App\Models\User;
use Illuminate\Http\Request;

class QaUserAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $req->validate([
            'question_id' => 'required|integer',
        ]);

        $row = QaUserAnswer::create([
            'user_id'     => $req->user()->id,
            'question_id' => $req->question_id,
            'selected_at' => now()->toDateString(),
        ]);

        return response()->json([
            'status'    => 'stored',
            'entry_id'  => $row->id,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, $id)
    {
        $req->validate([
            'answer_id' => 'required|integer',
        ]);

        $row = QaUserAnswer::findOrFail($id);

        $row->update([
            'answer_id' => $req->answer_id,
        ]);

        return response()->json([
            'status'    => 'updated',
            'entry_id'  => $row->id,
        ], 200);
    }

    public function getQuestionSurway()
    {
        $rows = SurveyQuestion::all('id', 'title');

        return response()->json($rows, 200);
    }

    public function storeQuestionSurway(Request $req)
    {
        $req->validate([
            'entry_id' => 'required|integer',
            'survey_question_1'  => 'nullable|string',
            'survey_question_2'  => 'nullable|string',
            'survey_question_3'  => 'nullable|string',
            'survey_question_4'  => 'nullable|string',
            'survey_question_5'  => 'nullable|string',
            'survey_question_6'  => 'nullable|string',
            'survey_question_7'  => 'nullable|string',
            'survey_question_8'  => 'nullable|string',
            'survey_question_9'  => 'nullable|string',
            'survey_question_10' => 'nullable|string',
            'survey_question_11' => 'nullable|string',
            'survey_question_12' => 'nullable|string',
            'survey_question_13' => 'nullable|string',
        ]);

        $qa = QaUserAnswer::findOrFail($req->entry_id);

        SurveyAnswer::create([
            'entry_id'           => $req->entry_id,
            'question_id'        => $qa->question_id,
            'answer_id'          => null,
            'survey_question_1'  => $req->survey_question_1,
            'survey_question_2'  => $req->survey_question_2,
            'survey_question_3'  => $req->survey_question_3,
            'survey_question_4'  => $req->survey_question_4,
            'survey_question_5'  => $req->survey_question_5,
            'survey_question_6'  => $req->survey_question_6,
            'survey_question_7'  => $req->survey_question_7,
            'survey_question_8'  => $req->survey_question_8,
            'survey_question_9'  => $req->survey_question_9,
            'survey_question_10' => $req->survey_question_10,
            'survey_question_11' => $req->survey_question_11,
            'survey_question_12' => $req->survey_question_12,
            'survey_question_13' => $req->survey_question_13,
        ]);

        return response()->json(['status' => 'ok'], 200);
    }

    public function storeAnswerSurway(Request $req)
    {
        $req->validate([
            'entry_id'           => 'required|integer',
            'survey_question_1'  => 'nullable|string',
            'survey_question_2'  => 'nullable|string',
            'survey_question_3'  => 'nullable|string',
            'survey_question_4'  => 'nullable|string',
            'survey_question_5'  => 'nullable|string',
            'survey_question_6'  => 'nullable|string',
            'survey_question_7'  => 'nullable|string',
            'survey_question_8'  => 'nullable|string',
            'survey_question_9'  => 'nullable|string',
            'survey_question_10' => 'nullable|string',
            'survey_question_11' => 'nullable|string',
            'survey_question_12' => 'nullable|string',
            'survey_question_13' => 'nullable|string',
        ]);

        $qa = QaUserAnswer::findOrFail($req->entry_id);

        SurveyAnswer::create([
            'entry_id'           => $req->entry_id,
            'question_id'        => null,
            'answer_id'          => $qa->answer_id,
            'survey_question_1'  => $req->survey_question_1,
            'survey_question_2'  => $req->survey_question_2,
            'survey_question_3'  => $req->survey_question_3,
            'survey_question_4'  => $req->survey_question_4,
            'survey_question_5'  => $req->survey_question_5,
            'survey_question_6'  => $req->survey_question_6,
            'survey_question_7'  => $req->survey_question_7,
            'survey_question_8'  => $req->survey_question_8,
            'survey_question_9'  => $req->survey_question_9,
            'survey_question_10' => $req->survey_question_10,
            'survey_question_11' => $req->survey_question_11,
            'survey_question_12' => $req->survey_question_12,
            'survey_question_13' => $req->survey_question_13,
        ]);

        return response()->json(['status' => 'ok'], 200);
    }

    /**
    * Display the specified resource.
    */
    public function show(User $user)
    {
        $answers = QaUserAnswer::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('answers', compact('answers', 'user'));
    }

    public function survey($entryId)
    {
        
        $entry = QaUserAnswer::findOrFail($entryId);
        $user = User::findOrFail($entry->user_id);

        $question = SurveyQuestion::all();

        $questionSurvey = SurveyAnswer::where('entry_id', $entry->id)->where('question_id', $entry->question_id)->first();
        $answerSurvey = SurveyAnswer::where('entry_id', $entry->id)->where('answer_id', $entry->answer_id)->first();


        return view('survey', compact('entry', 'user', 'question','questionSurvey', 'answerSurvey'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QaUserAnswer $qaUserAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QaUserAnswer $qaUserAnswer)
    {
        //
    }
}
