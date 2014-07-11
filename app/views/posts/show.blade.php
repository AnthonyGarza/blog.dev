@extends('layouts.master')


@section('content')
<div class="container">
	<h2>{{{ $post->title }}}</h2>
	<h4>Author: {{{ $post->user->email }}}</h4>
	<h5>{{{ $post->created_at->format('l, F jS Y @ h:i:s A') }}}</h5>



	@if ($post->img_path)
		<img src="{{{ $post->img_path }}}" class="img-responsive">
	@endif
	
	<h3>{{ $post->renderBody() }}</h3>

	<br>

	{{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'DELETE' )) }}
	{{ Form::submit('Delete') }}
	{{ Form::close() }}
</div>
<hr>
<div class="container">
	<h4>{{ link_to_action('PostsController@index', 'Show all Posts') }}</h4>
</div>

@stop