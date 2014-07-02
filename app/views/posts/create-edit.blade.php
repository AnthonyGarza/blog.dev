@extends('layouts.master')

@section('content')

    <h1>My Laravel Blog</h1>

    @if (isset($post))
        <h2>Edit post</h2>
        {{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'method' => 'PUT')) }}
    @else
        <h2>Create a new Post post</h2>
        {{ Form::open(array('action'=>'PostsController@store')) }}
    @endif


        {{ Form::label('title', 'Title') }}
        {{ Form::text('title') }}
        <!-- get an error by field name formatted within html -->
        {{ $errors->first('title', '<span class="help-block">:message</span><br>') }}

        <br>
        <br>

        {{ Form::label('body', 'Post Body') }}
        {{ Form::textarea('body') }}
        <!-- get an error by field name formatted within html -->
        {{ $errors->first('body', '<span class="help-block">:message</span><br>') }}

        <br>
        <br>

    {{ Form::submit('Save Post') }}

    {{ Form::close() }}

@stop