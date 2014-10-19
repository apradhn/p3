<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{

	return View::make('index');

});

Route::get('/lorem-ipsum', function() 
{

	// retrieve number of paragraphs
	$paragraph_count = Input::get('paragraphs');

	// checks for invalid user input
	if (is_numeric($paragraph_count)) 
	{
		// Sets paragraph_count type to integer
		settype ($paragraph_count, "integer");

		// create Lorem Ipsum generator 
		$generator = new Badcow\LoremIpsum\Generator();

		$paragraphs = $generator->getParagraphs($paragraph_count);

		function implode_paragraphs($p) {
			return "<p>".implode('</p><p>', $p)."</p>";
		}

		$paragraphs = implode_paragraphs($paragraphs);

		return View::make('lorem-ipsum')
			// Pass $paragraphs to the view 
			->with('output', $paragraphs);

	// Checks if user entered a non-numeric string 
	} elseif (is_string($paragraph_count)) {
		return View::make('lorem-ipsum')
			->with('output', "string");

	// Checks is user input is null
	} elseif ($paragraph_count === NULL) {
		return View::make('lorem-ipsum')
			->with('output', '');
	}



});

Route::get('/random-user', function() 
{

	return View::make('random-user');

});
