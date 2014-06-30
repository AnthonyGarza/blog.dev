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
// Route::get('/', function() {
// 	return View::make('temp.my-first-view');
// });

// Route::get('/sayhello/{name}', function($name)
// {
// 	if ($name == "Anthony")
//     {
//         return Redirect::to('/');
//     }
//     else
//     {
//         return "Hello, $name!";
//     }
// });

// Route::get('/resume', function() {
// 	return 'This is my resume';
// });
// Route::get('/portfolio', function() {
// 	return 'This is my portfolio';
// });

// Create a route for your resume page at the path '/resume' that returns 'This is my resume'.
// Create a route for your portfolio page at the path '/portfolio' that returns 'This is my portfolio'.
// Route::get('/resume', function(){
// 	//return 'This is my resume';
//     return View::make('pages.resume');
// });

// Route::get('/portfolio', function(){
// 	//return 'This is my portfolio';
//     return View::make('pages.portfolio');
// });

Route::get('/', 'HomeController@showWelcome');

Route::get('resume', 'HomeController@showResume');

Route::get('portfolio', 'HomeController@showPortfolio');

Route::resource('posts', 'PostsController');







// Route::get('/sayhello/{name}', function($name)
// {
//     if ($name == "Chris")
//     {
//         return Redirect::to('/');
//     }
//     else
//     {
//         return View::make('temp.my-first-view')->with('name', $name);
//     }
// });



Route::get('/sayhello/{name}', 'HomeController@sayHello');


// Route::get('/sayhello/{name}', function($name)
// {
//     if ($name == "Chris")
//     {
//         return Redirect::to('/');
//     }
//     else
//     {
//         $data = array('name' => $name);
//         return View::make('temp.my-first-view')->with($data);
//     }
// });

// Route::get('/rolldice', function() {
// 	return $rand = rand(1,6);
// });

// Route::get('/rolldice/{guess}', function($guess) {

// 	if (!is_numeric($guess)) {
// 		return Redirect::to('/rolldice');
// 	}

// 	$min = 1;
// 	$max = 6;
// 	$rand = rand($min,$max);
// 	$data = array(
// 		'rand' => $rand,
// 		'guess' => $guess);
// 	return View::make('temp.roll-dice')->with($data);


// });