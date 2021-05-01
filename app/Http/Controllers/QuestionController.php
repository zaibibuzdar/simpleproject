<?php

namespace App\Http\Controllers;
use App\Models\Questionnaire;
use App\Models\Question;
use Illuminate\Http\Request;
//use App\Http\Controllers\QuestionnaireController;

class QuestionController extends Controller
{

    public function create(Questionnaire $questionnaire){
        //return "hello";
        // $questionnaire = Questionnaire::all();
        // dd($questionnaire);
        return view('Question.create',compact('questionnaire'));
    }

    public function store(Questionnaire $questionnaire){

        // dd(request()->all());
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required',

        ]);
        //  dd($data);
        $question = $questionnaire->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);

        return redirect('/questionnaires/'.$questionnaire->id);
        
    }
    public function destroy(Questionnaire $questionnaire, Question $question){


        // dd($question->answers);
        $question->answers()->delete();
          $question->delete();
          return redirect($questionnaire->path());
        
    }
    
}
