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

// Route::get('/', 'HomeController@showWelcome');

Route::get('/login', 'HomeController@showLogin');

Route::post('/login', 'HomeController@doLogin');

Route::get('/logout', 'HomeController@logout');

Route::get('resume', 'HomeController@showResume');

Route::get('portfolio', 'HomeController@showPortfolio');

Route::resource('posts', 'PostsController');

Route::get('orm-test', function () {
    // $post = new Post();
    // $post->title = "New Blog Post";
    // $post->body = "Holy crap writing code using eloquent ORM is easy!";
    // $post->save();


    // $post1 = new Post();
	// $post1->title = "Eloquent is awesome!";
	// $post1->body = "It is super easy to create a new post.";
	// $post1->save();

	// $post2 = new Post();
	// $post2->title = "Post number two";
	// $post2->body = "The body for post number two.";
	// $post2->save();


    // $posts = Post::all();

    // foreach ($posts as $post) {
    // 	echo $post->title . "<br>";
    // 	echo $post->body . "<br>";
    // }

    // $post = Post::find(1);

    // echo $post->title . "<br>";
    // echo $post->body . "<br>";

    // $post = Post::find(1);

    // echo $post->title . "<br>";
    // echo $post->body . "<br>";

    // $post->title = "This is a NEW Title";

    // $post->save();


    // return "Eloquent ORM is Eloquent";


    // $post = Post::find(1);

   	// $post->delete();


    // return "Eloquent ORM is Eloquent";

});









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