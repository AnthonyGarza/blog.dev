@extends('layouts.master')

@section('content')
    <h1>My Laravel Blog</h1>
    <h2>All Posts:</h2>
    <!-- <h2>
        @foreach ($posts as $post)
            {{{ $post->title }}}<br>
            {{{ $post->body }}}<br>
        @endforeach
    </h2> -->

    <div class="container">

        <!-- @foreach ($posts as $post)
            <h2>{{{ $post->title }}}</h2>
            <h2>{{{ $post->body }}}</h2>
        @endforeach -->
        <h2>
            @foreach ($posts as $post)
                {{ link_to_action('PostsController@show', $post->title, array($post->id)) }}
                {{{ $post->created_at->setTimezone('America/Chicago')->format('l, F jS Y @ h:i:s A') }}}
                {{ link_to_action('PostsController@edit', 'Edit', array($post->id), array('class' => 'btn btn-default btn-sm')) }}
                <br>
            @endforeach
        </h2>
        {{ $posts->links() }}

    </div>
    <hr>
    <h2>{{ link_to_action('PostsController@create', 'Create New Post') }}</h2>


@stop