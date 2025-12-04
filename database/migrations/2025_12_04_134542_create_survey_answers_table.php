<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('survey_answers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('entry_id');
            $table->unsignedBigInteger('question_id')->nullable();
            $table->unsignedBigInteger('answer_id')->nullable();

            $table->string('survey_question_1')->nullable();
            $table->string('survey_question_2')->nullable();
            $table->string('survey_question_3')->nullable();
            $table->string('survey_question_4')->nullable();
            $table->string('survey_question_5')->nullable();
            $table->string('survey_question_6')->nullable();
            $table->string('survey_question_7')->nullable();
            $table->string('survey_question_8')->nullable();
            $table->string('survey_question_9')->nullable();
            $table->string('survey_question_10')->nullable();
            $table->string('survey_question_11')->nullable();
            $table->string('survey_question_12')->nullable();
            $table->timestamps();

            $table->foreign('entry_id')
                ->references('id')
                ->on('qa_user_answers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_answers');
    }
};
