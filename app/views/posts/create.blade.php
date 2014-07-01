@extends('layouts.master')

@section('content')
    <h1>My Laravel Blog</h1>
    <h2>Create a new post</h2>
        <!-- get an error by field name formatted within html -->
        {{ $errors->first('title', '<span class="help-block">:message</span><br>') }}
        {{ $errors->first('body', '<span class="help-block">:message</span><br>') }}

    <form  action="{{{ action('PostsController@store') }}}" method="POST">
        <label for="title">Title</label>
        <input id="title" name="title" type="text" placeholder="title" value="{{{ Input::old('title') }}}">

        <br>
        <br>


        <label for="body"> Post Body</label>
        <textarea  rows="4" cols="50" id="body" name="body">{{{ Input::old('body') }}}</textarea>
        <br>
        <br>

        <button type="submit">Add Post</button>

    </form>

@stop