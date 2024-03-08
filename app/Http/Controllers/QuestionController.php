<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function show($surveyId, $questionId){
        $question = Question::with('responses')->find($questionId);
        return view('admin/question', ['question' => $question, 'surveyId' => $surveyId]);
    }
}
