<?php

namespace App\Http\Controllers;
use App\Models\Questionnaire;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\QuestionnaireController;
class SurvayController extends Controller
{
    public function show(Questionnaire $questionnaire, $slug){
        $questionnaire->load('questions.answers');
        // dd($questionnaire->questions);
        return  view('survay.show',compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire){

        
      $data = request()->validate ([
       'responses.*.answer_id' => 'required',
       'responses.*.question_id' => 'required',
       'survay.name' => 'required',
       'survay.email' => 'required|email',


      ]); 
    //   dd(request()->all());

     $survay = $questionnaire->survays()->create($data['survay']);
    //  $survay->responses()->createMany($data['responses']);

     return 'Thank You!';

    }
}
