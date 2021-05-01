<?php

namespace App\Http\Controllers;
use App\Models;
use App\Models\Questionnaire;
use App\Models\Question;


use Illuminate\Http\Request;


class QuestionnaireController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }
    public function create(){
        return view('Questionnaire.create');
    }
    public function store(Request $request){
        //dd($request->all());
        $data = $request->validate([
             'title' =>'required',
             'purpose'=>'required',
         ]);
        //  return redirect()->back();
        //$data['user_id']=auth()->user()->id;
        // dd($data);
    //    $qusetionnaire=\App\Models\Questionnaire::create($data);


          $questionnaire =auth()->user()->questionnaires()->create($data);

         //return redirect('/questionnaries'.$questionnaire->id);
        
         return redirect()->route('question.show',$questionnaire->id);

    }
    public function show(Questionnaire $questionnaire)
    { 
        $questionnaire->load('questions.answers.responses');
        // dd($questionnaire);

        return view('Questionnaire.show',compact('questionnaire'));
    }
     
   

}
