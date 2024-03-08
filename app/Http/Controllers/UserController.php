<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class UserController extends Controller
{
    public function show(){
        $surveys = Survey::all()->where('survey_state_id', 1);
        return view('user/user', ['surveys' => $surveys]);
    }
}
