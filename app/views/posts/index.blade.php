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

        @foreach ($posts as $post)
            <h2>{{{ $post->title }}}</h2>
            <h2>{{{ $post->body }}}</h2>
        @endforeach

    </div>


@stop