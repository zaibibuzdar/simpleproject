@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <h1> {{$questionnaire->title}}</h1>

                    <form action="/survays/{{$questionnaire->id}}-{{\Illuminate\Support\Str::slug ($questionnaire->title)}}" method="POST">
                       @csrf
                       

                       @foreach($questionnaire->questions as   $key=>$question)
                       <div class="card mt-4">
                        <div class="card-header"><strong>{{$key +1}}</strong> {{ ($question->question) }}</div>

                       <div class="card-body">
                       @error('responses.' . $key . '.answer_id')
                       <small class="text-danger">{{$message}}</small>
                       
                       @enderror
                         <ul class="list-group">
                            @foreach($question->answers as $answer)
                            <label for="answer{{$answer->id}}">
                            <li class="list-group-item">
                           <input type="radio" name="responses[{{$key}}][answer_id]" id="answer{{$answer->id}}"
                             {{(old('responses.' . $key . '.answer_id') == $answer->id) ? 'checked' : ''}}
                            class="mr-2" value="{{$answer->id}}">
                           {{ $answer->answer }}

                            <input type="hidden" name="responses[{{$key}}][question_id]" id="question{{$question->id}}"
                             class="mr-2" value="{{$question->id}}">

                           </li>
                           </label>
                          
                         @endforeach
                       </ul>
                   
                         </div>
                       </div>

                     @endforeach
                    
                    
                    
                  

            <div class="card mt-4">
                <div class="card-header">your information</div>
                <div class="card-body">
              
                   <div class="form-group">
                  <label for="name">Your Name</label>
                 <input type="text" name="survay[name]" class="form-control" id="name" aria-describedby="titleHelp" placeholder="Enter name">
                  <small id="nameHelp" class="form-text text-muted">Hello!.Whats your Name</small>
                   @error('name') 
                 <small class="text-danger">{{$message}}</small>
                 @enderror
                 </div>
              
                  <div class="form-group">
                  <label for="email">Your Email</label>
                       <input type="email" name="survay[email]" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your Email">
                    <small id="emailHelp" class="form-text text-muted">Your email please</small>
                       @error('email') 
                      <small class="text-danger">{{$message}}</small>
                        @enderror
                     
                </div>
              
                <div>
                
                <button class="btn btn-dark" type="submit">complete survay</button>
                </div>
                  
                </div>

                
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
