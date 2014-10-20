@extends ('_master')

@section('title')
	Lorem Ipsum Generator
@stop

@section('head')
  <link rel="stylesheet" href='css/lorem-ipsum.css' />
@stop

@section('content')

  <h1>Lorem Ipsum Generator</h1>

	<p>How many paragraphs do you want?</p>

  {{ Form::open(array('url' => '/lorem-ipsum', 'method' => 'GET')) }}
    {{ Form::label('paragraphs', 'Paragraphs') }}
    {{ Form::text('paragraphs') }}
    {{ Form::submit('Generate!', array('class' => 'btn btn-default')) }}
  {{ Form::close() }}

  <div id="output" class="col-sm-8 col-sm-offset-2"> 
    {{ $output }}
  </div>
@stop

