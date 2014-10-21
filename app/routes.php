<?php
/**
 * Returns random Lorem Ipsum text
 * 
 * @param string | int $p 
 */
function generate_loremipsum($p) {
	// checks for invalid user input
	if ( (is_numeric($p)) or ($p == NULL) ) 
	{ 
		// create Lorem Ipsum generator 
		$generator = new Badcow\LoremIpsum\Generator();

		$paragraphs = $generator->getParagraphs($p);

		return "<p>".implode('</p><p>', $paragraphs)."</p>";
	}
	// Checks if user entered a non-numeric string 
	elseif (is_string($p)) {
		return "<div class='error'>Invalid Input</div>";
	} 
}

/**
 * Returns a font-size
 * 
 * @param string $fs
 */ 
function font_size($fs) {
	if ($fs == 8) {
		return "font-size-8";
	}
	elseif ($fs == 10) {
		return "font-size-10";
	}
	elseif ($fs == 12) {
		return "font-size-12";
	} 
	elseif ($fs == 14) {
		return "font-size-14";
	}
	elseif ($fs == 16) {
		return "font-size-16";
	}
}

/**
 * Returns a column #
 * 
 * c 
 */
function columns($c) {
	if ($c == 2) {
		return "two-columns";
	}
	elseif ($c == 3) {
		return "three-columns";
	}
}

/** 
 * Returns a font face
 * 
 * @param string $ff
 */
function font_face($ff) {
	if ($ff == 'roboto') {
		return 'roboto';
	}
	elseif ($ff == 'helvetica') {
		return 'helvetica';
	}
	elseif ($ff == 'georgia') {
		return 'georgia';
	}
	elseif ($ff == 'garamond') {
		return 'garamond';
	}
}
/**
 * Returns random user data
 *
 * @param string | int $u
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


Route::get('/lorem-ipsum', function() 
{
	// Generate random lorem ipsum text 
	$paragraphs = generate_loremipsum(Input::get('paragraphs'));

	// Changes the font size of the paragraphs
	$fontSize = font_size(Input::get('font-size'));

	// Changes the font face of the paragarphs
	$fontFace = font_face(Input::get('font-face'));

	// Changes the number of columns of paragraphs
	$columns = columns(Input::get('columns'));
	
	return View::make('lorem-ipsum')
		->with('paragraphs', $paragraphs)
		->with('fontSize', $fontSize)
		->with('fontFace', $fontFace)
		->with('columns', $columns);
});


Route::get('/random-user', function() 
{
	// Retrieve number of users 
	$u_count = Input::get('users');

	// Generate random user data
	$users = generate_users($u_count);

	return View::make('random-user')
		->with('users', $users);
});
