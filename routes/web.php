<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\SurvayController;
use App\Http\Controllers\QuestionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/questionnaires/create', [QuestionnaireController::class, 'create'])->name('question');
Route::post('/questionnaires',[QuestionnaireController::class,'store'])->name('question.store');
Route::get('/questionnaires/{questionnaire}',[QuestionnaireController::class,'show'])->name('question.show');
Route::get('/questionnaires/{questionnaire}/questions/create',[QuestionController::class,'create']);
Route::POST('/questionnaires/{questionnaire}/questions',[QuestionController::class,'store']);
Route::DELETE('/questionnaires/{questionnaire}/questions/{question}',[QuestionController::class,'destroy']);
Route::get('/survays/{questionnaire}-{slug}',[SurvayController::class,'show']);
Route::POST('/survays/{questionnaire}-{slug}',[SurvayController::class,'store']);