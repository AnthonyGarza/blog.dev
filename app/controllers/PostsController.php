<?php

class PostsController extends \BaseController {

	public function __construct()
	{
	    // call base controller constructor
	    parent::__construct();

	    // run auth filter before all methods on this controller except index and show
	    $this->beforeFilter('auth', array('except' => array('index', 'show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	// Displays all posts
	public function index()
	{
		$posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(4);

		if (Input::has('search'))
		{
		$search = Input::get('search');
		$posts = Post::where('title', 'LIKE', '%' . $search . '%')->paginate(50);

	    }
			return View::make('posts.index')->with('posts', $posts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	// Creates new blog post
	public function create()
	{
		return View::make('posts.create-edit');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	// Saves blog post to dB
	public function store()
	{
		return $this->update(null);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// Shows individual blog post
	public function show($id)
	{
		// return "Show a specific post: $id";
		$post = Post::findorFail($id);
		// $post->body = Parsedown::instance()->parse($post->body);
		return View::make('posts.show')->with('post', $post);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// Edit existing blog post
	public function edit($id)
	{
		// return "Show form for editing post: $id";
		$post = Post::findOrFail($id);
		return View::make('posts.create-edit')->with('post', $post);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// Updates blog posts to dB
	public function update($id)
	{
		Session::flash('successMessage', 'Post created successfully');
		$post = new Post();
		$post->user()->associate(Auth::user());

		if ($id != null)
		{
			Session::flash('successMessage', 'Post edited successfully');
			$value = Session::get('successMessage');
			$post = Post::findOrFail($id);
		}

		$validator = Validator::make(Input::all(), Post::$rules);

		if ($validator->fails())
		{
			Session::forget('successMessage');
			Session::flash('errorMessage', 'Please fill out all required fields');
			return Redirect::back()->withInput()->withErrors($validator);
		}
		else
		{
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			$post->save();

			if (Input::hasFile('image') && Input::file('image')->isValid())
			{
				$post->addUploadedImage(Input::file('image'));
				$post->save();
			}

			return Redirect::action('PostsController@index');
			// return Redirect::action('PostsController@show', $post->id)->with($value);
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	// Deletes post
	public function destroy($id)
	{
		// return "Delete a specific post: $id";
		$post = Post::findOrFail($id);
		$post->delete();
		Session::flash('successMessage', 'Post deleted Successfully!');
		return Redirect::action('PostsController@index');
	}


}
