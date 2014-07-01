<?php

class PostsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// return "Show a list of all posts";

		$posts = Post::all();

		return View::make('posts.index')->with('posts', $posts);

		// return View::make('posts.index')->with('posts', Post::all());
		// the above can also be used to replace line 14 and 16
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Log::info(Input::all()); //  logs all of the inputs that are passed before redirecting
		// 						 //  back to the post create form
		// return Redirect::back()->withInput();


		// create the validator
		$validator = Validator::make(Input::all(), Post::$rules);

		// attempt validation
		if ($validator->fails())
		{
			// validation failed, redirect to the post create page with validation errors and old inputs
			return Redirect::back()->withInput()->withErrors($validator);
		}
		else
		{
			// validation succeeded, create and save the post
			$post = new Post();
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			$post->save();
			return Redirect::action('PostsController@index');
		}

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// return "Show a specific post: $id";
		$post = Post::find($id);
		return View::make('posts.show')->with('post', $post);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return "Show form for editing post: $id";
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		return "Update a specific post: $id";
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		return "Delete a specific post: $id";
	}


}
