@extends ('_master')

@section('title')
	Random User Generator
@stop

@section('head')
  <link rel="stylesheet" href="css/random-user.css">
@stop

@section('content')
  <h1>Random User Generator</h1>
  <div>
    {{ Form::open(array('url' => '/random-user', 'method' => 'GET', 'name' => 'random-user')) }}
      {{ Form::label('users', 'How Many Users?') }}
      {{ Form::text('users') }} (Max: 99)
      <br>
      {{ Form::checkbox('birthdate') }}
      {{ Form::label('birthdate', 'Birthdate') }}
      <br>
      {{ Form::checkbox('profile') }}
      {{ Form::label('profile', 'Profile') }}
      <br>
      {{ Form::submit('Generate', array('class' => 'btn btn-default')) }}
    {{ Form::close() }}   
  </div>
  <div id="users" class="col-sm-8 col-sm-offset-2">
    {{ $users }}
  </div>
  <script type="text/javascript" language="JavaScript">
    document.forms['random-user'].elements['users'].focus();
  </script>  
@stop

