<?php

/**
 * Function for generating random user data
 *
 * @param string $u
 */
function generate_users($u) {
	// Creates a faker object 
	$faker = Faker\Factory::create();

	$users="";

	$birthdate = Input::get('birthdate');

	$profile = Input::get('profile');

	if (((is_numeric($u)) or ($u == NULL)) and ($u < 100))  {
		// executes of user input is numeric or null 

		if (($birthdate == 0) and ($profile == 0)) {
			// Executes if neither birthdate nor profile are selected
			for ($i=0; $i<$u; $i++) {
				$users = "<strong>".$faker->name."</strong><br><br>".$users;
			}
			return $users;

		} elseif (($birthdate == 1) and ($profile == 0)) {
			// Executes if only birthdate is selected
			for ($i=0; $i<$u; $i++) {
				$users = "<strong>".$faker->name."</strong><br>".$faker->date."<br><br>".$users;
			}
			return $users;

		} elseif (($birthdate == 0) and ($profile == 1)) {
			// Executes if only profile is selected 
			for ($i=0; $i<$u; $i++) {
				$users = "<strong>".$faker->name."</strong><br>".$faker->paragraph."<br><br>".$users;
			}
			return $users;

		} elseif (($birthdate == 1) and ($profile == 1)) {
			// Executes if both profile and birthdate are selected
			for ($i=0; $i<$u; $i++) {
				$users = "<strong>".$faker->name."</strong><br>".$faker->date."<br>".$faker->paragraph."<br><br>".$users;
			}
			return $users;
		}
	} else {
		// executes if user input is a non-numeric string
		return "<div class='error'>invalid input</div>";
	}

 } 

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

// Logic for Lorem Ipsum Generator
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

// Logic for Random User generator
Route::get('/random-user', function() 
{
	// Retrieve number of users 
	$u_count = Input::get('users');

	$users = generate_users($u_count);

	return View::make('random-user')
		->with('users', $users);

});
