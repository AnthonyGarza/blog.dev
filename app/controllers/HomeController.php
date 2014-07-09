<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/


	public function showLogin()
	{
		return View::make('login');
	}

	public function doLogin()
	{
		$email = Input::get('email');
		$password = Input::get('password');

		if (Auth::attempt(array('email' => $email, 'password' => $password)))
		{
			Session::flash('successMessage', 'Successfully logged in.');
			return Redirect::intended(action('PostsController@index'));
		}
		else
		{
			Session::flash('errorMessage', 'Email or password not found.');
			return Redirect::action('HomeController@showLogin')->withInput();
		}
	}

	public function logout()
	{
		Auth::logout();
		Session::flash('successMessage', 'Successfully logged out.');
		return Redirect::action('PostsController@index');
	}

	public function showWelcome()
	{
		return Redirect::action('HomeController@sayHello', ['Codeup']);
	}

	public function sayHello($name)
	{
	    $data = array('name' => $name);
	    return View::make('temp.my-first-view')->with($data);
    }

	public function showResume()
	{
		return View::make('pages.resume');
	}

	public function showPortfolio()
	{
		return View::make('pages.portfolio');

	}


}
