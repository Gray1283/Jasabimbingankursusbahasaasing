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
        Schema::create('quiz_questions', function (Blueprint $table) {
    $table->id('id_question');
    $table->unsignedBigInteger('id_quiz');
    $table->text('pertanyaan');
    $table->string('opsi_A');
    $table->string('opsi_B');
    $table->string('opsi_C');
    $table->string('opsi_D');
    $table->string('jawaban'); // A/B/C/D
    $table->timestamps();

    $table->foreign('id_quiz')->references('id_quiz')->on('quizzes')->onDelete('cascade');
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_questions');
    }
};
