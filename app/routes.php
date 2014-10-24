<?php
/*
|--------------------------------------------------------------------------
| Application Functions
|--------------------------------------------------------------------------
|
| Functions used to power the Lorem Ipsum and 
| Random User generators.
|
*/

/**
 * Returns random Lorem Ipsum text
 * 
 * @param string|int $p 
 * @return Lorem Ipsum text
 */
function generate_loremipsum($p) {
	// checks for invalid user input
	if ( ((is_numeric($p)) or ($p == NULL)) and ($p < 100) ) 
	{ 
		// create Lorem Ipsum generator 
		$generator = new Badcow\LoremIpsum\Generator();

		// generate $p number of lorem ipsum paragraphs
		$paragraphs = $generator->getParagraphs($p);

		// return lorem ipsum text 
		return "<p>".implode('</p><p>', $paragraphs)."</p>";
	}
	// Checks if user entered a non-numeric string 
	elseif (is_string($p)) {
		return "<div class='error'>Invalid Input!</div>";
	} 
}

/**
 * Returns a font-size as a css class
 * 
 * @param string $fs
 * @return font-size class
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
 * Returns a column # in as a css class
 * 
 * @param int $c 
 * @return columns class 
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
 * Returns a font face as a css class
 * 
 * @param string $ff
 * @return font face
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
 * @return users 
 */
function generate_users($u) {

	// Determines the selected locale
	if (Input::get('locale') == NULL) {
		$locale = 'en_EN';
	}
	else $locale = Input::get('locale');
	
	// Creates a faker object 
	$faker = Faker\Factory::create($locale);

	// Collects user inputs
	$users="";
	$birthdate = Input::get('birthdate');
	$profile = Input::get('profile');
	$gender = Input::get('gender');

	// Condition table for gender
	if($gender == 'both') {
		$both= true;
	} else $both = false;

	if($gender == 'female') {
		$female = true;
	} else $female = false;

	if($gender == 'male') {
		$male = true;
	} else $male = false;

	// Condtion table for birthdate & profile
	if (((is_numeric($u)) or ($u == NULL)) and ($u < 100)) { // Executes of user input is valid 
		$valid = true;
	} else $valid = false;

	if (($birthdate == 0) and ($profile == 0)) { // Executes if neither birthdate or profile are selected 
		$a = true;
	} else $a = false;

	if (($birthdate == 1) and ($profile == 0)) { // Executes if only birthdate is selected 
		$b = true;
	} else $b = false;

	if (($birthdate == 0) and ($profile == 1)) { // Executes if only profile is selected 
		$c = true;
	} else $c = false;

	if (($birthdate == 1) and ($profile == 1)) {// Executes if both birthdate and profile are selected 
		$d = true;
	} else $d = false;

	if ($valid)  {
		// executes of user input is numeric or null 
		if ($both) { // Executes if both genders selected 
			if ($a) {
				// Executes if neither birthdate nor profile are selected
				for ($i=0; $i<$u; $i++) {
					$users = "<div class='col-sm-4 cell'><img alt='cat' class='img-circle' src='http://www.lorempixel.com/200/200/cats/".$faker->randomDigit."'><p><strong>".$faker->name."</strong></p></div>".$users;
				}
				return $users;
			} 
			elseif ($b) {
				// Executes if only birthdate is selected
				for ($i=0; $i<$u; $i++) {
					$users = "<div class='col-sm-4 cell'><img alt='cat' class='img-circle' src='http://www.lorempixel.com/200/200/cats/".$faker->randomDigit."'><p><strong>".$faker->name."</strong><br>".$faker->date."</p></div>".$users;
				}
				return $users;
			} 
			elseif ($c) {
				// Executes if only profile is selected 
				for ($i=0; $i<$u; $i++) {
					$users = "<div class='col-sm-4 cell'><img alt='cat' class='img-circle' src='http://www.lorempixel.com/200/200/cats/".$faker->randomDigit."'><p><strong>".$faker->name."</strong><br>".$faker->text(130)."</p></div>".$users;
				}
				return $users;
			} 
			elseif ($d) {
				// Executes if both profile and birthdate are selected
				for ($i=0; $i<$u; $i++) {
					$users = "<div class='col-sm-4 cell'><img alt='cat' class='img-circle' src='http://www.lorempixel.com/200/200/cats/".$faker->randomDigit."'><p><strong>".$faker->name."</strong><br>".$faker->date."<br>".$faker->text(130)."</p></div>".$users;
				}
				return $users;
			}
		}
		elseif ($female) { // Executes if female gender selected 
			if ($a) {
				// Executes if neither birthdate nor profile are selected
				for ($i=0; $i<$u; $i++) {
					$users = "<div class='col-sm-4 cell'><img alt='cat' class='img-circle' src='http://www.lorempixel.com/200/200/cats/".$faker->randomDigit."'><p><strong>".$faker->name('female')."</strong></p></div>".$users;
				}
				return $users;
			} 
			elseif ($b) {
				// Executes if only birthdate is selected
				for ($i=0; $i<$u; $i++) {
					$users = "<div class='col-sm-4 cell'><img alt='cat' class='img-circle' src='http://www.lorempixel.com/200/200/cats/".$faker->randomDigit."'><p><strong>".$faker->name('female')."</strong><br>".$faker->date."</p></div>".$users;
				}
				return $users;
			} 
			elseif ($c) {
				// Executes if only profile is selected 
				for ($i=0; $i<$u; $i++) {
					$users = "<div class='col-sm-4 cell'><img alt='cat' class='img-circle' src='http://www.lorempixel.com/200/200/cats/".$faker->randomDigit."'><p><strong>".$faker->name('female')."</strong><br>".$faker->paragraph."</p></div>".$users;
				}
				return $users;
			} 
			elseif ($d) {
				// Executes if both profile and birthdate are selected
				for ($i=0; $i<$u; $i++) {
					$users = "<div class='col-sm-4 cell'><img alt='cat' class='img-circle' src='http://www.lorempixel.com/200/200/cats/".$faker->randomDigit."'><p><strong>".$faker->name('female')."</strong><br>".$faker->date."<br>".$faker->paragraph."</p></div>".$users;
				}
				return $users;
			}
		}
		elseif ($male) { // Executes if male gender selected 
			if ($a) {
				// Executes if neither birthdate nor profile are selected
				for ($i=0; $i<$u; $i++) {
					$users = "<div class='col-sm-4 cell'><img alt='cat' class='img-circle' src='http://www.lorempixel.com/200/200/cats/".$faker->randomDigit."'><p><strong>".$faker->name('male')."</strong></p></div>".$users;
				}
				return $users;
			} 
			elseif ($b) {
				// Executes if only birthdate is selected
				for ($i=0; $i<$u; $i++) {
					$users = "<div class='col-sm-4 cell'><img alt='cat' class='img-circle' src='http://www.lorempixel.com/200/200/cats/".$faker->randomDigit."'><p><strong>".$faker->name('male')."</strong><br>".$faker->date."</p></div>".$users;
				}
				return $users;
			} 
			elseif ($c) {
				// Executes if only profile is selected 
				for ($i=0; $i<$u; $i++) {
					$users = "<div class='col-sm-4 cell'><img alt='cat' class='img-circle' src='http://www.lorempixel.com/200/200/cats/".$faker->randomDigit."'><p><strong>".$faker->name('male')."</strong><br>".$faker->paragraph."</p></div>".$users;
				}
				return $users;
			} 
			elseif ($d) {
				// Executes if both profile and birthdate are selected
				for ($i=0; $i<$u; $i++) {
					$users = "<div class='col-sm-4 cell'><img alt='cat' class='img-circle' src='http://www.lorempixel.com/200/200/cats/".$faker->randomDigit."'><p><strong>".$faker->name('male')."</strong><br>".$faker->date."<br>".$faker->paragraph."</p></div>".$users;
				}
				return $users;
			}
		} 
	} else return "<div class='error'>Invalid input!</div>";  // executes if user input is a non-numeric string
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

	// Return lorem ipsum text to the browser 
	return View::make('lorem-ipsum')
		->with('paragraphs', $paragraphs)
		->with('fontSize', $fontSize)
		->with('fontFace', $fontFace)
		->with('columns', $columns);
});


Route::get('/random-user', function() 
{

	// Generate random user data
	$users = generate_users(Input::get('users'));

	// Return random users data to the browser
	return View::make('random-user')
		->with('users', $users);
});
 