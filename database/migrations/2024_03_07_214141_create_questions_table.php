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
        Schema::create('questions', function (Blueprint $table) {
            $table->id('questionId');
            $table->unsignedBigInteger('surveyId');
            $table->foreign('surveyId')->references('surveyId')->on('surveys');
            $table->string('questionText');
            $table->unsignedBigInteger('questionTypeId');
            $table->foreign('questionTypeId')->references('questionTypeId')->on('questionTypes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
