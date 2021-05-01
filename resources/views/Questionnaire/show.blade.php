@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              {{-- @foreach($questionnaire as $question) --}}
             <div class="card-header">{{ ($questionnaire->title) }}</div>
                {{--   @endforeach --}} 
            
              
                <div class="card-body">
                  <a  class="btn btn-dark "href="/questionnaires/{{$questionnaire->id}}/questions/create">add new question</a>
                  <a  class="btn btn-dark "href="/survays/{{$questionnaire->id}}-{{\Illuminate\Support\Str::slug ($questionnaire->title)}}">Take sarvey</a>

                   
                </div>
            </div>
            @foreach($questionnaire->questions as $question)
            <div class="card mt-4">
             <div class="card-header">{{ ($question->question) }}</div>

             <div class="card-body">
                 <ul class="list-group">
                 @foreach($question->answers as $answer)
                 <li class="list-group-item d-flex justify-content-between">
                 
                     <div>{{ $answer->answer }}</div>
                     @if($question->responses->count() > 0)
                     <div>{{intval(($answer->responses->count()*100)/$question->responses->count())}}% </div>
                    @else
                     <div>0% </div>
                     @endif
                
                 </li>
                 @endforeach
                 </ul>
                   
                </div>
                           <div class="card-footer">
                           <form action="/questionnaires/{{$questionnaire->id}}/questions/{{$question->id}}" method="post">
                           @method ('Delete')
                           @csrf
                           <button type="submit" class="btn btn-sm btn btn-outline-danger"> Delet Question </button>
                           
                           </form >
                        
                           </div>

            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
