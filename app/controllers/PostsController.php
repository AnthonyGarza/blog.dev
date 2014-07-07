<?php

class PostsController extends \BaseController {

	public function __construct()
	{
	    // call base controller constructor
	    parent::__construct();

	    // run auth filter before all methods on this controller except index and show
	    $this->beforeFilter('auth.basic', array('except' => array('index', 'show')));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		// $posts = Post::with('user')->paginate(4);

		// if (Input::has('search'))
		// {
		// 	$title = Input::get('search', '');
		// 	$posts = Post::with('user')->orderBy('created_at', 'desc')->where('title', 'LIKE', '%$search%')->get();
		// 	return View::with('user')->orderBy('created_at', 'desc');
		// }
		// else
		// {
		// 	// return "Show a paginated list of all posts in descending order by the created_at field "

		// 	// $posts = Post::orderBy('created_at', 'desc')->paginate(4);

		// 	return View::make('posts.index')->with('posts', $posts);

		// 	// return View::make('posts.index')->with('posts', Post::all());
		// 	// the above can also be used to replace line 14 and 16
		// }

		$search = Input::get('search');
		$query = Post::orderBy('created_at', 'desc');

		// Added search
		if(is_null($search))
		{
			$posts = $query->paginate(5);
		}
		else
		{
			$posts = $query->where('title', 'LIKE', "%{$search}%")
						   ->orWhere('body', 'LIKE', "%{$search}%")
						   ->paginate(5);
		}
		return View::make('posts.index')->with('posts', $posts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('posts.create-edit');
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
			Session::flash('errorMessage', 'Post was not created...Please see error messages below!');
			return Redirect::back()->withInput()->withErrors($validator);
		}
		else
		{
			// validation succeeded, create and save the post
			$post = new Post();
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			$post->save();
			Session::flash('successMessage', 'Post created Successfully!');
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
	public function update($id)
	{
		// return "Update a specific post: $id";
		$post = Post::findOrFail($id);
		// create the validator
		$validator = Validator::make(Input::all(), Post::$rules);

		// attempt validation
		if ($validator->fails())
		{
			// validation failed, redirect to the post create page with validation errors and old inputs
			Session::flash('errorMessage', 'Post was not updated...Please see error messages below!');
			return Redirect::back()->withInput()->withErrors($validator);
		}
		else
		{
			// validation succeeded, edited and save the post
			$post = Post::findOrFail($id);
			$post->title = Input::get('title');
			$post->body = Input::get('body');
			$post->save();
			Session::flash('successMessage', 'Post updated Successfully!');
			return Redirect::action('PostsController@show', $post->id)->with('post', $post);
		}

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// return "Delete a specific post: $id";
		$post = Post::findOrFail($id);
		$post->delete();
		Session::flash('successMessage', 'Post deleted Successfully!');
		return Redirect::action('PostsController@index');
	}


}
