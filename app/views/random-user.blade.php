@extends ('_master')

@section('title')
	Random User Generator
@stop

@section('content')
    <h1>Random User Generator</h1>
    <form method="POST">
      <label for="users">How many Users? </label>
      <input id="users" type="text" value="5" name="users" maxlength="2"></input> (Max: 99)
      <br>
      Include:
      <br>
      <input name="birthdate" type="checkbox">  <label for="birthdate">Birthdate</label><br>
      <input name="profile" type="checkbox">    <label for="profile">Profile</label><br>
      <br>
      <button type="submit" class="btn btn-default">Generate!</button>
    </form>
@stop

