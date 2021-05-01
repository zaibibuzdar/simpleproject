@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Qusestionnaire') }}</div>

              <form action="{{route('question.store') }}" method="POST">
              @csrf
              
              <div class="form-group">
                <label for="title">Title</label>
                 <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter title">
                  <small id="titlelHelp" class="form-text text-muted">Give your questionnaire a title that attracts attention.</small>
                   @error('title') 
                 <small class="text-danger">{{$message}}</small>
                 @enderror
                 </div>
              
                  <div class="form-group">
                  <label for="purpose">Purpose</label>
                       <input type="text" name="purpose" class="form-control" id="purpose" aria-describedby="titleHelp" placeholder="Enter purpose">
                    <small id="purposeHelp" class="form-text text-muted">Giving the purpose increase the resposne</small>
                       @error('purpose') 
                      <small class="text-danger">{{$message}}</small>
                        @enderror
                       <button type="submit" class="btn btn-primary">Save Qusestionnaire</button>
      </div>
              
              
              </form>       
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
