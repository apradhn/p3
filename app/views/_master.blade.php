<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title', 'p3')</title>
		
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link href="{{ asset('css/starter-template.css') }}" rel="stylesheet">
    	<link href='http://fonts.googleapis.com/css?family=Hind' rel='stylesheet' type='text/css'>
	</head>
	<body>
	    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="#">Abhijit Pradhan</a>
	        </div>
	        <div class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
	            <li><a href="#">I</a></li>
	            <li><a href="#about">II</a></li>
	            <li class="active"><a href="/">III</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>

	    <div class="container">
      		<div class="starter-template">
      			@yield('content')
	      	</div>
	    </div>	    
	</body>
</html>
