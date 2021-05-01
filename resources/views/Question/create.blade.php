@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Question') }}</div>

              <form action="/questionnaires/{{ $questionnaire->id}}/questions" method="POST">
                  @csrf
              
                  <div class="form-group">
                     <label for="question">Question</label>
                      <input type="text" name="question[question]" class="form-control" 
                      value="{{old('question.question')}}"
                      id="question" aria-describedby="questionHelp" placeholder="Enter question">
                      <small id="questionlHelp" class="form-text text-muted"> Ask Some thing simple and to the point question for better result.</small>
                       @error('question.question') 
                      <small class="text-danger">{{$message}}</small>
                       @enderror
                  </div>
              
                       <div class="form-group">
                        <fieldset>
                        <legend>Choices</legend>
                        <small id="choicesHelp" class="form-text text-muted"> Give chocies that give you most insight into your question.</small>
                       <div>
                          <div class="form-group">
                           <label for="answer1">Choice 1</label>
                          <input type="text" name="answers[][answer]" class="form-control" 
                                value="{{old('answers.0.answer')}}"
                               id="answer1" aria-describedby="choicesHelp" placeholder=" Enter choice 1">
                               <!-- <small id="awnserHelp" class="form-text text-muted">Giving the purpose increase the resposne</small> -->
                                 @error('answers.0.answer') 
                                   <small class="text-danger">{{$message}}</small>
                                    @enderror
                         
                          </div>
                        </div> 
                        <div>
                          <div class="form-group">
                           <label for="answer2">Choice 2</label>
                           <input type="text" name="answers[][answer]" value="{{old('answers.1.answer')}}"
                           class="form-control"  value="{{old('answers.awnser')}}" id="answer2" aria-describedby="choicesHelp" placeholder=" Enter Choice 2">
                           @error('answers.1.answer') 
                           <small class="text-danger">{{$message}}</small>
                           @enderror
                         
                          </div>
                        </div> 
                        <div>
                          <div class="form-group">
                           <label for="answer3">Choice 3</label>
                           <input type="text" name="answers[][answer]" class="form-control" 
                           value="{{old('answers.2.answer')}}"
                            id="answer2" aria-describedby="choicesHelp" placeholder="Enter Choice 3">
                           @error('answers.2.answer') 
                           <small class="text-danger">{{$message}}</small>
                           @enderror
                         
                          </div>
                        </div> 
                        <div>
                          <div class="form-group">
                           <label for="answer4">Choice 4</label>
                           <input type="text" name="answers[][answer]" 
                           class="form-control"
                           value="{{old('answers.3.answer')}}"
                            id="answer2" aria-describedby="choicesHelp" placeholder="Enter Choice 4">
                           @error('answers.3.answer') 
                           <small class="text-danger">{{$message}}</small>
                           @enderror
                         
                          </div>
                        </div> 
                       </fieldset>
                     </div>


                    <button type="submit" class="btn btn-primary">Add Question</button>

              
              </form>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
