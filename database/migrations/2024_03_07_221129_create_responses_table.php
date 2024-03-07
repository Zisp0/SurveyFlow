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
        Schema::create('responses', function (Blueprint $table) {
            $table->id('responseId');
            $table->unsignedBigInteger('surveyId');
            $table->foreign('surveyId')->references('surveyId')->on('surveys');
            $table->unsignedBigInteger('questionId');
            $table->foreign('questionId')->references('questionId')->on('questions');
            $table->unsignedBigInteger('optionId')->nullable();
            $table->foreign('optionId')->references('optionId')->on('options');
            $table->string('openTextResponse')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
