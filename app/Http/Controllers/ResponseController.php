<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;
use App\Models\Question;

class ResponseController extends Controller
{
    public function store(Request $request) {
        $token = uniqid();
        foreach ($request->input('responses') as $questionId => $response) {
            if($response){
                $question = Question::find($questionId);
                if ($question->question_type_id == 1) {
                    Response::create([
                        'question_id' => $questionId,
                        'option_id' => $response,
                        'token' => $token,
                        'survey_id' => $question->survey_id
                    ]);
                } else {
                    Response::create([
                        'question_id' => $questionId,
                        'open_text_response' => $response,
                        'token' => $token,
                        'survey_id' => $question->survey_id
                    ]);
                }
            }
        }

        return redirect()->back()->with('message', 'Respuestas almacenadas correctamente.');
    }
}
