<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function show(){
        $surveys = Survey::withCount(['responses as token_count' => function ($query) {
                $query->select(DB::raw('COUNT(DISTINCT token)'));
            }])->get();;
        return view('admin/admin', ['surveys' => $surveys]);
    }

    public function createSurvey(){
        return view('admin/create');
    }
}
