<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\QuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'show']);
Route::post('/', [LoginController::class, 'login']);
Route::get('/user', [UserController::class, 'show']);
Route::get('/user/survey/{surveyId}', [SurveyController::class, 'show']);
Route::get('/admin', [AdminController::class, 'show']);
Route::get('/admin/survey/create', [AdminController::class, 'createSurvey']);
Route::get('/admin/survey/{surveyId}/question/{questionId}', [QuestionController::class, 'show']);
Route::get('/admin/survey/{surveyId}', [SurveyController::class, 'details']);
Route::post('/response', [ResponseController::class, 'store']);
Route::post('/survey/create', [SurveyController::class, 'store']);
Route::get('/survey/{surveyId}/state/{surveyState}', [SurveyController::class, 'state']);