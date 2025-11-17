<?php

namespace App\Http\Controllers;

use App\Models\QaUserAnswer;
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
            'answer_id'   => 'required|integer',
        ]);

        QaUserAnswer::create([
            'user_id'     => $req->user()->id,
            'question_id' => $req->question_id,
            'answer_id'   => $req->answer_id,
            'selected_at' => now()->toDateString(),
        ]);

        return response()->json(['status' => 'ok'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(QaUserAnswer $qaUserAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QaUserAnswer $qaUserAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QaUserAnswer $qaUserAnswer)
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
