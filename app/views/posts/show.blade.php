@extends('layouts.master')

@section('content')
    <h1>My Laravel Blog</h1>
    <!-- <h2>
    	<p>{{{ $post->title }}}</p>
		<p>{{{ $post->body }}}</p>
    </h2> -->

    <div class="container">
		<h1>Blog Post {{{ $post->id }}}</h1>
		<!-- display post content -->
		<h2>{{{ $post->title }}}</h2>
		<h2>{{{ $post->body }}}</h2>
	</div>


@stop