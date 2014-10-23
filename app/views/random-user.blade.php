@extends ('_master')

@section('title')
	Random User Generator
@stop

@section('head')
  <link rel="stylesheet" href="css/random-user.css">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
@stop

@section('masthead')
  <div class="jumbotron">
    <div class="container">
      <h1>Random User Generator</h1>
      <p>Generate random user data for your applications</p>
    </div>
  </div>
@stop

@section('content')
  <div class="container content">
    <div class="col-sm-2">
    <a href="/"><i class="fa fa-angle-double-left fa-lg"></i> Back to p3</a>
    </div>
    <div class="form col-sm-12">
      {{ Form::open(array('url' => '/random-user', 'method' => 'GET', 'name' => 'random-user')) }}
        <div class="col-sm-3">
        {{ Form::label('users', 'How Many Users? (Max: 99)') }}
        {{ Form::text('users') }} 
       </div>
         <div class="col-sm-3">
            {{ Form::label('MorF', 'Male or Female?') }}
          <br>
          <div class="col-xs-4">
            {{ Form::label('both', 'Both') }}
            <br>
            {{ Form::radio('gender', 'maleAndFemale', true ) }}
        
          </div>
          <div class="col-xs-4">
            {{ Form::label('female', 'Female') }}
            {{ Form::radio('gender', 'female') }}            
          </div>
          <div class="col-xs-4">
            {{ Form::label('male', 'Male') }}           
            <br>
            {{ Form::radio('gender', 'male') }}
        </div>
        </div>
        <div class="col-sm-2">
        {{ Form::label('birthdate', 'Birthdate') }}
        <br>
        {{ Form::checkbox('birthdate') }}    
        </div>
        <div class="col-sm-2">
        {{ Form::label('profile', 'Profile') }}
        <br>
        {{ Form::checkbox('profile') }}       
        </div>
        <div class="col-sm-2">
        {{ Form::submit('Generate', array('class' => 'btn btn-default')) }}
        </div>
      {{ Form::close() }}   
    </div>
  </div>
  <div id="users" class="col-sm-8 col-sm-offset-2">
    {{ $users }}
  </div>
  <script type="text/javascript" language="JavaScript">
    document.forms['random-user'].elements['users'].focus();
  </script>  
@stop

