<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Question;
use App\Models\Option;

class SurveyController extends Controller
{
    public function show($surveyId){
        $survey = Survey::with('questions.options')->find($surveyId);
        return view('user/survey', ['survey' => $survey]);
    }

    public function details($surveyId){
        $survey = Survey::with('questions.options.responses')->find($surveyId);
        return view('admin/survey', ['survey' => $survey]);
    }

    public function state($surveyId, $surveyState){
        $survey = Survey::find($surveyId);
        if($surveyState == 1){
            $survey->survey_state_id = 2;
        }else{
            $survey->survey_state_id = 1;
        }
        $survey->save();
        return redirect('/admin/survey/'.$surveyId);
    }

    
    public function store(Request $request){
        // Crear una nueva encuesta
        $survey = new Survey();
        $survey->title = $request->input('title');
        $survey->description = $request->input('description');
        $survey->survey_state_id = 1;
        $survey->save();

        // Crear preguntas y opciones
        foreach ($request->input('questions', []) as $q) {
            $question = new Question();
            $question->survey_id = $survey->id;
            $question->question_text = $q['text'];
            $question->question_type_id = $q['type'];
            $question->save();

            if($q['type'] == 1){
                foreach ($q['options'] as $o) {
                    $option = new Option();
                    $option->question_id = $question->id;
                    $option->option_text = $o['text'];
                    $option->save();
                }
            }
        }

        return redirect('/admin')->with('success', 'Encuesta creada exitosamente.');
    }
}
