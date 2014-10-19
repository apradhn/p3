@extends ('_master')

@section('title')
	Random User Generator
@stop

@section('content')
  <h1>Random User Generator</h1>

  {{ Form::open(array('url' => '/random-user', 'method' => 'GET')) }}
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

  <div id="users">
    {{ $users }}
  </div>
@stop

