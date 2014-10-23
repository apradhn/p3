@extends ('_master')

@section('title')
	Lorem Ipsum Generator
@stop

@section('head')
  <link rel="stylesheet" href='{{ asset('css/lorem-ipsum.css') }}' />
@stop

@section('masthead')
  <div class="jumbotron">
    <div class="container">
      <h1>Lorem Ipsum Generator</h1>
      <p>How many paragraphs do you want?</p>
    </div>
  </div>
@stop

@section('content')
  <div class="container content">
    <div class="form col-sm-12">
      {{ Form::open(array('url' => '/lorem-ipsum', 'method' => 'GET', 'name' => 'lorem-ipsum')) }}
        {{ Form::label('paragraphs', 'Paragraphs') }}
        {{ Form::text('paragraphs', 3, array('size' => 5)) }}

        {{ Form::label('font-size', 'Font Size') }}
        {{ Form::select('font-size', array('8px' => '8 px', '10px' => '10 px', '12px' => '12 px', '14px' => '14 pt', '16px' => '16 px'), '16px') }}

        {{ Form::label('font-face', 'Font Face') }}
        {{ Form::select('font-face', array('roboto' => 'Roboto', 'helvetica' => 'Helvetica Neue', 'georgia' => 'Georgia', 'garamond' => 'Garamond' )) }}

        {{ Form::label('columns', 'Columns') }}
        {{ Form::select('columns', array(1 => 1, 2 => 2, 3 => 3)) }}

        {{ Form::submit('Generate!', array('class' => 'btn btn-default', 'id' => 'submit')) }}

      {{ Form::close() }}
    </div>
  </div>

  
  <div id="paragraphs" class="col-sm-10 col-sm-offset-1 {{ $fontSize }} {{ $fontFace }} {{ $columns }}"> 
    {{ $paragraphs }}
  </div>

  <script type="text/javascript" language="JavaScript">
    document.forms['lorem-ipsum'].elements['paragraphs'].focus();
  </script>
@stop

