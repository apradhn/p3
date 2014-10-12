@extends ('_master')

@section('title')
	Lorem Ipsum Generator
@stop

@section('content')
  	<h1>Lorem Ipsum Generator</h1>
	    <p>How many paragraphs do you want?</p>
    <form method="POST">
      <label for="paragraphs">Paragraphs</label>
      <input id="paragraphs" type="text" value="5" name="paragraphs" maxlength="2"></input> (Max: 99)
      <br>
      <br>
      <button type="submit" class="btn btn-default">Generate!</button>
    </form>
@stop

