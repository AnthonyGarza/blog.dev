@extends('layouts.master')

@section('content')
    <h1>My Laravel Blog</h1>

    <h1>Blog Post #{{{ $post->id }}}</h1>

    <div class="container">

		<!-- display post content -->
		<h3>{{{ $post->title }}}</h3>
		<h3>{{{ $post->body }}}</h3>
		<h3>{{{ $post->user->email }}}</h3>
		<h4>{{{ $post->created_at->format('l, F jS Y @ h:i:s A') }}}</h4>

		{{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'DELETE')) }}
			{{ Form::submit('DELETE') }}
    	{{ Form::close() }}
	</div>


@stop