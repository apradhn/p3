@extends ('_master')

@section('title')
	Project 3
@stop

@section('head')
  <link rel="stylesheet" href="css/index.css">
@stop

@section('content')
  	<h1>Developer's Best Friend</h1>
  	<p class="lead">Generate random placeholder data to help build your web applications.</p>
  	<div class="row">
  		<div class="col-sm-6">
	      <a href="lorem-ipsum" class="lead btn btn-default btn-lg">Lorem Ipsum Generator</a>
	      <p>Lorem Ipsum is dummy text used by typesetters to visualize text on the page and concentrate on the design elements of a page.</p>
	     </div>
	    <div class="col-sm-6">
	        <a href="random-user" class="lead btn btn-default btn-lg">Random User Generator</a>
	        <p>Like Lorem Ipsum, but for people. Fill your database with random user data before you launch your social media empire.</p>
	    </div>   
    </div>	
@stop

@section('footer')
@stop